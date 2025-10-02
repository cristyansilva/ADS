<?php
    require_once '../includes/auth.php';
    $a = $_POST['a'] ?? 0;
    $b = $_POST['b'] ?? 0;
    
    $mensagem = '';
    $class = 'alert-primary';
    if ($a > $b) {
        $mensagem = "A maior que B";
    } elseif ($a < $b) {
        $mensagem = "A menor que B";
    } else {
        $mensagem = "A é igual a B";
    }
    
    setcookie('ex07_resultado', $mensagem, time() + 60);
?>
<?php require_once '../includes/header.php'; ?>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Resultado</h1>
            <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="alert <?php echo $class; ?>" role="alert">
                    <?php echo htmlspecialchars($mensagem); ?>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <a href="index.php" class="btn btn-outline-primary">Tentar Novamente</a>
        </div>
    </div>
<?php require_once '../includes/footer.php'; ?>