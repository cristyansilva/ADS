<?php
// Este arquivo será incluído em todas as páginas protegidas
require_once __DIR__ . '/auth.php'; // Usar __DIR__ garante que o caminho funcione de qualquer lugar
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
<body>
<div class="container my-5">
    <header class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
        <div id="page-title-container"></div>
        <div class="text-end">
            <span class="text-muted me-3">
                Logado como: <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong>
            </span>
            <a href="/logout.php" class="btn btn-sm btn-outline-danger">Sair</a>
        </div>
    </header>