<?php
require_once __DIR__ . '/../models/Categoria.php';

class CategoriaController
{

    public function index()
    {
        if (!isset($_SESSION['uid'])) header('Location: index.php');

        $categoriaModel = new Categoria();
        $categorias = $categoriaModel->listarPorUsuario($_SESSION['uid']);
        $receitas = array_filter($categorias, function ($c) {
            return $c['tipo'] == 'receita';
        });
        $despesas = array_filter($categorias, function ($c) {
            return $c['tipo'] == 'despesa';
        });

        include __DIR__ . '/../views/categorias/index.php';
    }

    // Salva nova categoria (lógica movida do TransacaoController)
    public function salvar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['uid'])) {
            $model = new Categoria();

            if (!empty($_POST['id'])) {
                // EDIÇÃO
                $model->atualizar($_POST['id'], $_SESSION['uid'], $_POST['nome'], $_POST['tipo']);
            } else {
                // CRIAÇÃO
                $model->criar($_SESSION['uid'], $_POST['nome'], $_POST['tipo']);
            }

            $origem = $_POST['origem'] ?? 'categorias';
            $rota = ($origem == 'dashboard') ? 'dashboard' : 'categorias';
            header("Location: index.php?rota=$rota");
        }
    }

    // Exclui categoria
    public function excluir()
    {
        if (isset($_GET['id']) && isset($_SESSION['uid'])) {
            $model = new Categoria();
            if (!$model->excluir($_GET['id'], $_SESSION['uid'])) {
                // $_SESSION['erro'] = "Não foi possível excluir. Categoria em uso.";
            }
            header('Location: index.php?rota=categorias');
        }
    }
}
