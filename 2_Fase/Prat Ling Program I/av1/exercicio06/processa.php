<?php
    require_once '../includes/auth.php';
    $numeros = [
        $_POST['n1'] ?? 0,
        $_POST['n2'] ?? 0,
        $_POST['n3'] ?? 0,
        $_POST['n4'] ?? 0,
        $_POST['n5'] ?? 0,
    ];

    sort($numeros);
    
    $cookie_value = 'Menor: ' . $numeros[0] . ', Médio: ' . $numeros[2] . ', Maior: ' . $numeros[4];
    setcookie('ex06_resultado', $cookie_value, time() + 60);
?>
<?php require_once '../includes/header.php'; ?>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Resultado (Ordem Crescente)</h1>
            <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <p>Valores ordenados: 
                    <span class="badge bg-success">Menor: <?php echo htmlspecialchars($numeros[0]); ?></span>
                    <span class="badge bg-warning text-dark">Médio: <?php echo htmlspecialchars($numeros[2]); ?></span>
                    <span class="badge bg-danger">Maior: <?php echo htmlspecialchars($numeros[4]); ?></span>
                </p>
                <p>Lista completa: <?php echo implode(', ', array_map('htmlspecialchars', $numeros)); ?></p>
            </div>
        </div>
        <div class="mt-3">
            <a href="index.php" class="btn btn-outline-primary">Tentar Novamente</a>
        </div>
    </div>
  <?php require_once '../includes/footer.php'; ?>