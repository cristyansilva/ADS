<?php
    require_once '../includes/auth.php';
    $numero = $_POST['numero'] ?? 0;
    setcookie('ex05_ultimo', $numero, time() + 60);

    $mensagem = '';
    $class = '';

    if ($numero % 2 == 0) {
        $mensagem = $numero . " é par";
        $class = "alert-info"; // Par: azul claro
    } else {
        $mensagem = $numero . " é ímpar";
        $class = "alert-warning"; // Ímpar: amarelo
    }
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