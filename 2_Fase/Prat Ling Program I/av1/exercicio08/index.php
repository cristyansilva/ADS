<?php
    require_once '../includes/auth.php';
    $last_media = $_COOKIE['ex08_media'] ?? 'Nenhum';
?>
<?php require_once '../includes/header.php'; ?>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Exercício 8</h1>
            <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <p>Última média calculada: <strong><?php echo htmlspecialchars($last_media); ?></strong></p>
                <form action="processa.php" method="post">
                    <div class="mb-3">
                        <label for="a1" class="form-label">Nota A1:</label>
                        <input type="number" class="form-control" id="a1" name="a1" step="0.1" required>
                    </div>
                    <div class="mb-3">
                        <label for="a2" class="form-label">Nota A2:</label>
                        <input type="number" class="form-control" id="a2" name="a2" step="0.1" required>
                    </div>
                    <div class="mb-3">
                        <label for="a3" class="form-label">Nota A3:</label>
                        <input type="number" class="form-control" id="a3" name="a3" step="0.1" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Calcular Média</button>
                </form>
            </div>
        </div>
    </div>
<?php require_once '../includes/footer.php'; ?>