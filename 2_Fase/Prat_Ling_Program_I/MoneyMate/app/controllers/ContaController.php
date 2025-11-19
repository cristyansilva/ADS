<?php
require_once __DIR__ . '/../models/Conta.php';

class ContaController
{

    // Mostra a página de lista de contas
    public function index()
    {
        if (!isset($_SESSION['uid'])) header('Location: index.php');

        $contaModel = new Conta();
        $contas = $contaModel->listarPorUsuario($_SESSION['uid']);

        include __DIR__ . '/../views/contas/index.php';
    }

    // Processa o formulário de salvar
    public function salvar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['uid'])) {
            $contaModel = new Conta();

            if (!empty($_POST['id'])) {
                // EDIÇÃO
                $contaModel->atualizar($_POST['id'], $_SESSION['uid'], $_POST['nome'], $_POST['saldo_inicial']);
            } else {
                // CRIAÇÃO
                $contaModel->criar($_SESSION['uid'], $_POST['nome'], $_POST['saldo_inicial']);
            }

            // Redireciona para a mesma página de onde veio (ou padrão contas)
            $origem = $_POST['origem'] ?? 'contas';
            $rota = ($origem == 'dashboard') ? 'dashboard' : 'contas';
            header("Location: index.php?rota=$rota");
        }
    }

    // Processa a exclusão
    public function excluir()
    {
        if (isset($_GET['id']) && isset($_SESSION['uid'])) {
            $contaModel = new Conta();
            $contaModel->excluir($_GET['id'], $_SESSION['uid']);
            header('Location: index.php?rota=contas');
        }
    }
}
