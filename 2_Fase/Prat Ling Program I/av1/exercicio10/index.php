<?php
    require_once '../includes/auth.php';
    $last_value = $_COOKIE['ex10_ultimo'] ?? 'Nenhum';
?>
<?php require_once '../includes/header.php'; ?>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Exercício 10</h1>
            <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <p>Último número usado: <strong><?php echo htmlspecialchars($last_value); ?></strong></p>
                <form action="processa.php" method="post">
                    <div class="mb-3">
                        <label for="mes" class="form-label">Digite um número (1 a 12):</label>
                        <input type="number" class="form-control" id="mes" name="mes" min="1" max="12" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Verificar Mês</button>
                </form>
            </div>
        </div>
    </div>
<?php require_once '../includes/footer.php'; ?>