<?php
require_once '../includes/auth.php'; // Apenas para proteger o acesso direto
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

require_once '../includes/header.php'; 
?>
<title>Resultado Ex 1</title>

<h1 class="h3 page-title">Resultado</h1>
<div class="d-flex justify-content-end align-items-center mb-4" style="margin-top:-3rem">
    <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="alert <?php echo $class; ?>" role="alert">
            <?php echo htmlspecialchars($mensagem); ?>
        </div>
        <a href="index.php" class="btn btn-outline-primary">Tentar Novamente</a>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>