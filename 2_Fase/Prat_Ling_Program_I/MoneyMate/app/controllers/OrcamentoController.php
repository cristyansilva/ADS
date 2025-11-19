<?php
require_once __DIR__ . '/../models/Orcamento.php';
require_once __DIR__ . '/../models/Categoria.php';

class OrcamentoController {

    public function index() {
        if (!isset($_SESSION['uid'])) header('Location: index.php');
        
        $uid = $_SESSION['uid'];
        $mes = $_GET['mes'] ?? date('m');
        $ano = $_GET['ano'] ?? date('Y');
        $orcamentoModel = new Orcamento();
        $categoriaModel = new Categoria();
        $orcamentos = $orcamentoModel->listarPorMes($uid, $mes, $ano);
        $categorias = $categoriaModel->listarPorUsuario($uid, 'despesa'); 

        include __DIR__ . '/../views/orcamentos/index.php';
    }

    public function salvar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['uid'])) {
            $mesAno = explode('-', $_POST['mes_ano']);
            $ano = $mesAno[0];
            $mes = $mesAno[1];
            
            $model = new Orcamento();
            $model->criar($_SESSION['uid'], $_POST['categoria_id'], $_POST['valor'], $mes, $ano);
            header("Location: index.php?rota=orcamentos&mes=$mes&ano=$ano");
        }
    }

    public function excluir() {
        if (isset($_GET['id']) && isset($_SESSION['uid'])) {
            $model = new Orcamento();
            $model->excluir($_GET['id'], $_SESSION['uid']);
        }
        header('Location: index.php?rota=orcamentos');
    }
}