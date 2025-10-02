<?php
    require_once '../includes/auth.php';
    $numero = $_POST['numero'] ?? 0;
    setcookie('ex02_numero', $numero, time() + 60);
?>
<?php require_once '../includes/header.php'; ?>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Tabuada do <?php echo htmlspecialchars($numero); ?></h1>
            <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <ul class="list-group">
                    <?php for ($i = 0; $i <= 10; $i++): ?>
                        <li class="list-group-item"><?php echo htmlspecialchars($numero) . ' x ' . htmlspecialchars($i) . ' = ' . htmlspecialchars($numero * $i); ?></li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
        <div class="mt-3">
            <a href="index.php" class="btn btn-outline-primary">Tentar Novamente</a>
        </div>
    </div>
   <?php require_once '../includes/footer.php'; ?>