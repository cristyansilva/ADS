<?php
    require_once '../includes/auth.php';
    $last_num = $_COOKIE['ex02_numero'] ?? 'Nenhum';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 2 - Tabuada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Exercício 2</h1>
            <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <p>Último número usado: <strong><?php echo htmlspecialchars($last_num); ?></strong></p>
                <form action="processa.php" method="post">
                    <div class="mb-3">
                        <label for="numero" class="form-label">Digite um número:</label>
                        <input type="number" class="form-control" id="numero" name="numero" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Gerar Tabuada</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>