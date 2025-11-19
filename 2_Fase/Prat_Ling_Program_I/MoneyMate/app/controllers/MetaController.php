<?php
require_once __DIR__ . '/../models/Meta.php';

class MetaController {

    public function index() {
        if (!isset($_SESSION['uid'])) header('Location: index.php');
        
        $metaModel = new Meta();
        $metas = $metaModel->listarPorUsuario($_SESSION['uid']);

        include __DIR__ . '/../views/metas/index.php';
    }

    public function salvar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['uid'])) {
            $model = new Meta();
            $model->criar($_SESSION['uid'], $_POST['nome'], $_POST['valor_alvo']);
            header('Location: index.php?rota=metas');
        }
    }

    public function excluir() {
        if (isset($_GET['id']) && isset($_SESSION['uid'])) {
            $model = new Meta();
            $model->excluir($_GET['id'], $_SESSION['uid']);
        }
        header('Location: index.php?rota=metas');
    }

    public function adicionarValor() {
         if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['uid'])) {
            $modelMeta = new Meta();
            $modelMeta->atualizarValor($_POST['meta_id'], $_POST['valor']);
            header('Location: index.php?rota=metas');
        }
    }
}