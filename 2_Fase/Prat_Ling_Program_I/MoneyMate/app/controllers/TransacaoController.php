<?php
require_once __DIR__ . '/../models/Transacao.php';
require_once __DIR__ . '/../models/Conta.php';
require_once __DIR__ . '/../models/Categoria.php';
require_once __DIR__ . '/../models/Orcamento.php';
require_once __DIR__ . '/../models/Meta.php';

class TransacaoController {
    public function dashboard() {
        if (!isset($_SESSION['uid'])) {
            header('Location: index.php');
            exit;
        }

        $uid = $_SESSION['uid'];
        $mes = $_GET['mes'] ?? date('m');
        $ano = $_GET['ano'] ?? date('Y');

        $transacaoModel = new Transacao();
        $contaModel     = new Conta();
        $categoriaModel = new Categoria();
        $orcamentoModel = new Orcamento();
        $metaModel      = new Meta();

        $transacoes = $transacaoModel->listarPorMes($uid, $mes, $ano);
        $resumoData = $transacaoModel->resumoFinanceiro($uid, $mes, $ano);
        $graficoData = $transacaoModel->gastosPorCategoria($uid, $mes, $ano);
        $contas     = $contaModel->listarPorUsuario($uid);
        $categorias = $categoriaModel->listarPorUsuario($uid);
        $orcamentos = $orcamentoModel->listarPorMes($uid, $mes, $ano);
        $metas      = $metaModel->listarPorUsuario($uid);

        $resumo = ['receita' => 0, 'despesa' => 0];
        foreach ($resumoData as $r) {
            $resumo[$r['tipo']] = $r['total'];
        }
        $resumo['saldo'] = $resumo['receita'] - $resumo['despesa'];

        $chartLabels = [];
        $chartValues = [];
        foreach ($graficoData as $g) {
            $chartLabels[] = $g['nome'];
            $chartValues[] = $g['total'];
        }
        
        include __DIR__ . '/../views/dashboard/index.php';
    }


    public function index() {
        if (!isset($_SESSION['uid'])) header('Location: index.php');
        
        $transacaoModel = new Transacao();
        $contaModel = new Conta();
        $categoriaModel = new Categoria();
        $transacoes = $transacaoModel->listarTodas($_SESSION['uid']);
        $contas = $contaModel->listarPorUsuario($_SESSION['uid']);
        $categorias = $categoriaModel->listarPorUsuario($_SESSION['uid']);
        
        include __DIR__ . '/../views/transacoes/index.php';
    }

    public function salvar() {
        if (!isset($_SESSION['uid'])) header('Location: index.php');
        $uploadPath = null;
        if (isset($_FILES['comprovante']) && $_FILES['comprovante']['error'] == 0) {
            $ext = pathinfo($_FILES['comprovante']['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid() . "." . $ext;
            $destino = __DIR__ . '/../../uploads/' . $novoNome; 

            if (move_uploaded_file($_FILES['comprovante']['tmp_name'], $destino)) {
                $uploadPath = $novoNome;
            }
        }

        $model = new Transacao();
        $usuario_id = $_SESSION['uid'];
        $id_transacao = $_POST['id'] ?? null; 
        $conta_id = $_POST['conta_id'];
        $categoria_id = empty($_POST['categoria_id']) ? null : $_POST['categoria_id'];
        $tipo = $_POST['tipo'];
        $descricaoBase = $_POST['descricao'];
        $valorTotal = $_POST['valor'];
        $dataInicial = $_POST['data'];

        // 3. Verifica se é EDIÇÃO ou CRIAÇÃO
        if (!empty($id_transacao)) {
            // É EDIÇÃO
            $dados = [
                'conta_id'     => $conta_id,
                'categoria_id' => $categoria_id,
                'tipo'         => $tipo,
                'descricao'    => $descricaoBase, 
                'valor'        => $valorTotal,
                'data'         => $dataInicial,
                'comprovante'  => $uploadPath
            ];
            $model->atualizar($id_transacao, $usuario_id, $dados);

        } else {
            // É CRIAÇÃO (com lógica de parcelas)
            $qtdParcelas = (int) ($_POST['parcelas'] ?? 1);
            if ($qtdParcelas < 1) $qtdParcelas = 1;
            $valorParcela = $valorTotal / $qtdParcelas;

            for ($i = 0; $i < $qtdParcelas; $i++) {
                $novaData = date('Y-m-d', strtotime("+$i month", strtotime($dataInicial)));
                $descricaoFinal = $qtdParcelas > 1 ? "$descricaoBase (" . ($i + 1) . "/$qtdParcelas)" : $descricaoBase;

                $dados = [
                    'usuario_id'   => $usuario_id,
                    'conta_id'     => $conta_id,
                    'categoria_id' => $categoria_id,
                    'tipo'         => $tipo,
                    'descricao'    => $descricaoFinal,
                    'valor'        => $valorParcela,
                    'data'         => $novaData,
                    'comprovante'  => $uploadPath
                ];
                $model->criar($dados);
            }
        }

        // Redireciona para a página de onde veio
        $origem = $_POST['origem'] ?? 'dashboard';
        $rota = ($origem == 'transacoes') ? 'transacoes' : 'dashboard';
        header("Location: index.php?rota=$rota");
    }

    /**
     * Exclui uma transação e estorna o saldo.
     */
    public function excluir() {
        if (isset($_GET['id']) && isset($_SESSION['uid'])) {
            $model = new Transacao();
            $model->excluir($_GET['id'], $_SESSION['uid']);
        }
        
        $mes = $_GET['mes'] ?? date('m');
        $ano = $_GET['ano'] ?? date('Y');
        
        if (isset($_GET['origem']) && $_GET['origem'] == 'lista') {
            header("Location: index.php?rota=transacoes");
        } else {
            header("Location: index.php?rota=dashboard&mes=$mes&ano=$ano");
        }
    }


    public function salvarConta() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['uid'])) {
            $contaModel = new Conta();
            $contaModel->criar($_SESSION['uid'], $_POST['nome'], $_POST['saldo_inicial']);
            header('Location: index.php?rota=dashboard');
        }
    }

    public function salvarCategoria() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['uid'])) {
            $catModel = new Categoria();
            $catModel->criar($_SESSION['uid'], $_POST['nome'], $_POST['tipo']);
            header('Location: index.php?rota=dashboard');
        }
    }

    public function salvarOrcamento() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['uid'])) {
            $mesAno = explode('-', $_POST['mes_ano']);
            $ano = $mesAno[0];
            $mes = $mesAno[1];
            
            $model = new Orcamento();
            $model->criar($_SESSION['uid'], $_POST['categoria_id'], $_POST['valor'], $mes, $ano);
            header("Location: index.php?rota=dashboard&mes=$mes&ano=$ano");
        }
    }

    public function salvarMeta() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['uid'])) {
            $model = new Meta();
            $model->criar($_SESSION['uid'], $_POST['nome'], $_POST['valor_alvo']);
            header('Location: index.php?rota=dashboard');
        }
    }

    public function adicionarValorMeta() {
         if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['uid'])) {
            $modelMeta = new Meta();
            $modelMeta->atualizarValor($_POST['meta_id'], $_POST['valor']);
            header('Location: index.php?rota=dashboard');
        }
    }
}