<?php
    require_once '../includes/auth.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Carga Horária</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Atualizar Carga Horária</h1>
            <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="somar_carga_processa.php" method="post">
                    <div class="mb-3">
                        <label for="matricula" class="form-label">Matrícula do Aluno:</label>
                        <input type="text" class="form-control" name="matricula" required>
                    </div>
                    <div class="mb-3">
                        <label for="nova_carga" class="form-label">Nova Carga Horária para somar:</label>
                        <input type="number" class="form-control" name="nova_carga" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
        </div>
        <div class="mt-3">
            <a href="index.php" class="btn btn-outline-primary">Voltar para o Cadastro</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>