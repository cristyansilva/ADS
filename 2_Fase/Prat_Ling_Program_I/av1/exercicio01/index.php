<?php 
require_once '../includes/header.php'; 
$last_value = $_COOKIE['ex01_ultimo'] ?? 'Nenhum';
?>
<title>Ex 1 - Positivo, Negativo ou Zero</title>

<div class="d-flex justify-content-between align-items-center">
    <h1 class="h3 page-title">Exercício 1</h1>
    <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
</div>

<div class="card shadow-sm mt-4">
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