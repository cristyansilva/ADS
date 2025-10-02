<?php
    require_once '../includes/auth.php';
    $num1 = $_POST['num1'] ?? 0;
    $num2 = $_POST['num2'] ?? 0;
    $operacao = $_POST['operacao'] ?? '+';
    $resultado = 0;
    $mensagem = "";
    $class = "alert-success";

    switch ($operacao) {
        case '+':
            $resultado = $num1 + $num2;
            $mensagem = "Resultado: " . $num1 . " + " . $num2 . " = " . $resultado;
            break;
        case '-':
            $resultado = $num1 - $num2;
            $mensagem = "Resultado: " . $num1 . " - " . $num2 . " = " . $resultado;
            break;
        case '*':
            $resultado = $num1 * $num2;
            $mensagem = "Resultado: " . $num1 . " × " . $num2 . " = " . $resultado;
            break;
        case '/':
            if ($num2 == 0) {
                $mensagem = "Erro: Divisão por zero.";
                $class = "alert-danger";
            } else {
                $resultado = $num1 / $num2;
                $mensagem = "Resultado: " . $num1 . " ÷ " . $num2 . " = " . $resultado;
            }
            break;
        case '^':
            $resultado = pow($num1, $num2);
            $mensagem = "Resultado: " . $num1 . " ^ " . $num2 . " = " . $resultado;
            break;
        case 'sqrt':
            if ($num1 < 0) {
                $mensagem = "Erro: Não é possível calcular a raiz de um número negativo.";
                $class = "alert-danger";
            } else {
                $resultado = sqrt($num1);
                $mensagem = "Resultado: √" . $num1 . " = " . $resultado;
            }
            break;
        default:
            $mensagem = "Operação inválida.";
            $class = "alert-warning";
            break;
    }
    setcookie('ex04_ultimo', $mensagem, time() + 60);
?>
<<?php require_once '../includes/header.php'; ?>
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