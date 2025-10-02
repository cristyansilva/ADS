<?php 
require_once '../includes/header.php'; 
$last_value = $_COOKIE['ex01_ultimo'] ?? 'Nenhum';
?>
<title>Ex 1 - Positivo, Negativo ou Zero</title>

<h1 class="h3 page-title">Exercício 1</h1>
<div class="d-flex justify-content-end align-items-center mb-4" style="margin-top:-3rem">
    <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <p class="mb-3">Último valor usado: <strong><?php echo htmlspecialchars($last_value); ?></strong></p>
        <form action="processa.php" method="post">
            <div class="mb-3">
                <label for="numero" class="form-label">Digite um número:</label>
                <input type="number" class="form-control" id="numero" name="numero" required>
            </div>
            <button type="submit" class="btn btn-primary">Verificar</button>
        </form>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>