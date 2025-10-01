<?php
    require_once '../includes/auth.php';
    $numero = $_POST['numero'] ?? null;

    setcookie('ex03_ultimo', $numero, time() + 60);

    $mensagem = "";
    $class = "";

    function fatorial_recursivo($n) {
        if ($n === 0) {
            return 1;
        }
        return $n * fatorial_recursivo($n - 1);
    }
    
    function fatorial_string($n) {
        if ($n < 0) return '';
        if ($n === 0) return '1';
        $str = '';
        for ($i = $n; $i >= 1; $i--) {
            $str .= $i . ' × ';
        }
        return rtrim($str, ' × ');
    }

    if ($numero === null || $numero < 0 || $numero > 20) {
        $mensagem = "Erro: O número deve ser entre 0 e 20.";
        $class = "alert-danger";
    } else {
        $resultado = fatorial_recursivo($numero);
        $passos = fatorial_string($numero);
        $mensagem = htmlspecialchars($numero) . "! = " . htmlspecialchars($passos) . " = " . htmlspecialchars($resultado);
        $class = "alert-success";
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Ex 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Resultado</h1>
            <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="alert <?php echo $class; ?>" role="alert">
                    <?php echo $mensagem; ?>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <a href="index.php" class="btn btn-outline-primary">Tentar Novamente</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>