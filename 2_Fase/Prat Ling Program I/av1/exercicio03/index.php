<?php
    require_once '../includes/auth.php';
    $last_value = $_COOKIE['ex03_ultimo'] ?? 'Nenhum';
?>
<?php require_once '../includes/header.php'; ?>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Exercício 3</h1>
            <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <p>Último valor usado: <strong><?php echo htmlspecialchars($last_value); ?></strong></p>
                <form action="processa.php" method="post">
                    <div class="mb-3">
                        <label for="numero" class="form-label">Digite um número (0 a 20):</label>
                        <input type="number" class="form-control" id="numero" name="numero" min="0" max="20" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Calcular Fatorial</button>
                </form>
            </div>
        </div>
    </div>
  <?php require_once '../includes/footer.php'; ?>