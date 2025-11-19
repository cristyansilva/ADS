<?php
session_start();
require_once __DIR__ . '/app/controllers/AuthController.php';
require_once __DIR__ . '/app/controllers/TransacaoController.php';
require_once __DIR__ . '/app/controllers/RelatorioController.php';
require_once __DIR__ . '/app/controllers/ContaController.php';
require_once __DIR__ . '/app/controllers/CategoriaController.php';
require_once __DIR__ . '/app/controllers/OrcamentoController.php'; 
require_once __DIR__ . '/app/controllers/MetaController.php';       

$rota = $_GET['rota'] ?? 'login';


if ($rota == 'visualizar_arquivo') {
    if (empty($_GET['nome'])) {
        die("Nome do arquivo não fornecido.");
    }

    $arquivo = basename($_GET['nome']); 
    $caminhoArquivo = __DIR__ . '/uploads/' . $arquivo;

    if (file_exists($caminhoArquivo) && is_readable($caminhoArquivo)) {
        $tipo = mime_content_type($caminhoArquivo);
        
        header("Content-Type: $tipo");
        header("Content-Length: " . filesize($caminhoArquivo));
        header('Content-Disposition: inline; filename="' . $arquivo . '"');
        
        ob_clean();
        flush();

        readfile($caminhoArquivo);
        exit; 
    } else {
        http_response_code(404);
        die("Arquivo não encontrado ou sem permissão de leitura.");
    }
}



// 2. Rotas que exigem login
$rotasProtegidas = [
    'dashboard', 
    'relatorios', 
    'contas', 'salvar_conta', 'excluir_conta',
    'categorias', 'salvar_categoria', 'excluir_categoria',
    'transacoes', 'salvar_transacao', 'excluir_transacao',
    'orcamentos', 'salvar_orcamento', 'excluir_orcamento', 
    'metas', 'salvar_meta', 'excluir_meta', 'adicionar_valor_meta', 
    'exportar_csv'
];

if (!isset($_SESSION['uid']) && in_array($rota, $rotasProtegidas)) {
    header('Location: index.php?rota=login');
    exit;
}

// 3. Instancia Controllers
$auth = new AuthController();
$transacao = new TransacaoController();
$relatorio = new RelatorioController();
$conta = new ContaController();
$categoria = new CategoriaController();
$orcamento = new OrcamentoController(); 
$meta = new MetaController();       

switch($rota) {
    // --- Autenticação ---
    case 'login': $auth->index(); break;
    case 'logar': $auth->login(); break;
    case 'registrar': $auth->registrar(); break;
    case 'logout': $auth->logout(); break;
    case 'dashboard': $transacao->dashboard(); break;
    case 'transacoes': $transacao->index(); break;
    case 'contas': $conta->index(); break;
    case 'categorias': $categoria->index(); break;
    case 'relatorios': $relatorio->index(); break;
    case 'orcamentos': $orcamento->index(); break;
    case 'metas': $meta->index(); break;       

    // --- Ações (Formulários) ---
    case 'salvar_transacao': $transacao->salvar(); break;
    case 'excluir_transacao': $transacao->excluir(); break;
    
    case 'salvar_conta': $conta->salvar(); break;
    case 'excluir_conta': $conta->excluir(); break;

    case 'salvar_categoria': $categoria->salvar(); break;
    case 'excluir_categoria': $categoria->excluir(); break;

    case 'salvar_orcamento': $orcamento->salvar(); break;
    case 'excluir_orcamento': $orcamento->excluir(); break; 
    
    case 'salvar_meta': $meta->salvar(); break;
    case 'adicionar_valor_meta': $meta->adicionarValor(); break; 
    case 'excluir_meta': $meta->excluir(); break;      

    case 'exportar_csv': $relatorio->exportarCSV(); break;
    
    
    default:
        $auth->index();
        break;
}