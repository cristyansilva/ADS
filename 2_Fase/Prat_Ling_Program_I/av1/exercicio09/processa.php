<?php
    require_once '../includes/auth.php';
    $nome = $_POST['nome'] ?? '';
    $idade = $_POST['idade'] ?? 0;
    
    setcookie('ex09_ultimo', $nome . ',' . $idade, time() + 60);
    
    $mensagem = '';
    $class = '';

    if ($idade >= 18) {
        $mensagem = $nome . " é maior de 18 e tem " . $idade . " anos.";
    } else {
        $mensagem = $nome . " não é maior de 18 e tem " . $idade . " anos.";
    }
    
    if ($idade >= 0 && $idade <= 12) {
        $class = "alert-info"; // Criança
    } elseif ($idade >= 13 && $idade <= 17) {
        $class = "alert-warning"; // Adolescente
    } elseif ($idade >= 18 && $idade <= 59) {
        $class = "alert-success"; // Adulto
    } else {
        $class = "alert-primary"; // Idoso
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