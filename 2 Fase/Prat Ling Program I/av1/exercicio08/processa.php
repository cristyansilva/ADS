<?php
    require_once '../includes/auth.php';
    $a1 = $_POST['a1'] ?? 0;
    $a2 = $_POST['a2'] ?? 0;
    $a3 = $_POST['a3'] ?? 0;
    $rec = $_POST['rec'] ?? null;
    $media = ((float)$a1 * 2 + (float)$a2 * 2 + (float)$a3 * 1) / 5;
    $situacao = '';
    $class = '';

    if ($rec !== null) {
        $media = ($media + (float)$rec) / 2;
    }
    
    if ($media >= 7) {
        $situacao = "Aprovado";
        $class = "alert-success";
    } elseif ($media >= 5) {
        $situacao = "Recuperação";
        $class = "alert-warning";
    } else {
        $situacao = "Reprovado";
        $class = "alert-danger";
    }

    setcookie('ex08_media', number_format($media, 2), time() + 60);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Ex 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Resultado Média Final</h1>
            <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <p>Sua média foi: <strong><?php echo number_format($media, 2); ?></strong></p>
                <div class="alert <?php echo $class; ?>" role="alert">
                    Situação: <?php echo $situacao; ?>
                </div>
                <?php if ($situacao == 'Recuperação' && $rec === null): ?>
                    <p>Você precisa fazer a recuperação.</p>
                    <form action="processa.php" method="post">
                        <input type="hidden" name="a1" value="<?php echo htmlspecialchars($a1); ?>">
                        <input type="hidden" name="a2" value="<?php echo htmlspecialchars($a2); ?>">
                        <input type="hidden" name="a3" value="<?php echo htmlspecialchars($a3); ?>">
                        <div class="mb-3">
                            <label for="rec" class="form-label">Nota da Recuperação:</label>
                            <input type="number" class="form-control" id="rec" name="rec" step="0.1" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Recalcular Média</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
        <div class="mt-3">
            <a href="index.php" class="btn btn-outline-primary">Tentar Novamente</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>