<?php
    require_once '../includes/auth.php';
    $last_num = $_COOKIE['ex02_numero'] ?? 'Nenhum';
?>
<?php require_once '../includes/header.php'; ?>
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
 <?php require_once '../includes/footer.php'; ?>