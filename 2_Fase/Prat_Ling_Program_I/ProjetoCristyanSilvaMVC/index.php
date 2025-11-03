<?php
// Arquivo: index.php (Na pasta raiz do projeto)

/*
 * Este é o "Front Controller" ou Roteador.
 * É o ÚNICO arquivo que o navegador vai acessar diretamente.
 * Ele é responsável por carregar o Controller e chamar a ação correta.
 */

// 1. Inclui o arquivo do Controller
// (O Controller já inclui o Model e a View que ele precisa)
require_once 'controller/CursoController.php';

// 2. Cria uma instância do Controller
$controller = new CursoController();

// 3. Determina qual "ação" o usuário solicitou
// (Verifica o parâmetro 'acao' na URL)
if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
} else {
    // Se nenhuma ação for especificada, a ação padrão
    // será 'formulario' (carregar a view/formulario.php)
    $acao = 'formulario';
}

// 4. Executa a ação (chama o método correspondente no Controller)
switch ($acao) {
    
    // Rota do formulário de cadastro (view/formulario.php)
    case 'formulario':
        $controller->mostrarFormulario();
        break;

    // Rota da listagem (view/listagem.php)
    case 'listar':
        $controller->listar();
        break;

    // Rota para processar o cadastro (vem do POST do formulário)
    case 'cadastrar':
        $controller->cadastrar();
        break;

    // Rota para processar a atualização (vem do POST da listagem)
    case 'atualizar':
        $controller->atualizar();
        break;

    // Rota para processar a exclusão (vem do POST da listagem)
    case 'excluir':
        $controller->excluir();
        break;

    // Rota padrão (caso a 'acao' seja inválida)
    default:
        $controller->mostrarFormulario();
        break;
}

?>