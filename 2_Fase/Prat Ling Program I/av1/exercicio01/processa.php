<?php
// Apenas protege o acesso direto, o header fará o resto
require_once '../includes/auth.php'; 

$numero = $_POST['numero'] ?? '';
setcookie('ex01_ultimo', $numero, time() + 60);

$class = '';
$mensagem = '';

if ($numero > 0) {
    $mensagem = "Valor positivo";
    $class = "alert-success";
} elseif ($numero < 0) {
    $mensagem = "Valor negativo";
    $class = "alert-danger";
} else {
    $mensagem = "Igual a zero";
    $class = "alert-primary";
}

// Inclui o cabeçalho HTML
require_once '../includes/header.php'; 
?>
<title>Resultado Ex 1</title>

<div class="d-flex justify-content-between align-items-center">
    <h1 class="h3 page-title">Resultado</h1>
    <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
</div>

<div class="card shadow-sm mt-4">
    <div class="card-body">
        <div class="alert <?php echo $class; ?>" role="alert">
            <?php echo htmlspecialchars($mensagem); ?>
        </div>
        <a href="index.php" class="btn btn-outline-primary mt-3">Tentar Novamente</a>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>