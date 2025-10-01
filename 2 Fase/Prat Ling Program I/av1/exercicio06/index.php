<?php
    require_once '../includes/auth.php';
    $last_result = $_COOKIE['ex06_resultado'] ?? 'Nenhum';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 6 - Ordem Crescente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Exercício 6</h1>
            <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <p>Último resultado: <strong><?php echo htmlspecialchars($last_result); ?></strong></p>
                <form action="processa.php" method="post">
                    <div class="mb-3"><label for="n1" class="form-label">Número 1:</label><input type="number" class="form-control" id="n1" name="n1" required></div>
                    <div class="mb-3"><label for="n2" class="form-label">Número 2:</label><input type="number" class="form-control" id="n2" name="n2" required></div>
                    <div class="mb-3"><label for="n3" class="form-label">Número 3:</label><input type="number" class="form-control" id="n3" name="n3" required></div>
                    <div class="mb-3"><label for="n4" class="form-label">Número 4:</label><input type="number" class="form-control" id="n4" name="n4" required></div>
                    <div class="mb-3"><label for="n5" class="form-label">Número 5:</label><input type="number" class="form-control" id="n5" name="n5" required></div>
                    <button type="submit" class="btn btn-primary">Organizar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>