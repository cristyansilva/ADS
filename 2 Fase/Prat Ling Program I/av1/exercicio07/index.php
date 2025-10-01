<?php
    require_once '../includes/auth.php';
    $last_result = $_COOKIE['ex07_resultado'] ?? 'Nenhum';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 7 - Comparação A e B</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Exercício 7</h1>
            <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <p>Último resultado: <strong><?php echo htmlspecialchars($last_result); ?></strong></p>
                <form action="processa.php" method="post">
                    <div class="mb-3">
                        <label for="a" class="form-label">Valor de A:</label>
                        <input type="number" class="form-control" id="a" name="a" step="any" required>
                    </div>
                    <div class="mb-3">
                        <label for="b" class="form-label">Valor de B:</label>
                        <input type="number" class="form-control" id="b" name="b" step="any" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Comparar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>