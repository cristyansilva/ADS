<?php
    require_once '../includes/auth.php';
    $last_calc = $_COOKIE['ex04_ultimo'] ?? 'Nenhum';
?>
<?php require_once '../includes/header.php'; ?>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Exercício 4 - Calculadora</h1>
            <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <p>Última operação: <strong><?php echo htmlspecialchars($last_calc); ?></strong></p>
                <form action="processa.php" method="post">
                    <div class="mb-3">
                        <label for="num1" class="form-label">Número 1:</label>
                        <input type="number" class="form-control" id="num1" name="num1" step="any" required>
                    </div>
                    <div class="mb-3">
                        <label for="operacao" class="form-label">Operação:</label>
                        <select class="form-select" id="operacao" name="operacao" required>
                            <option value="+">Soma (+)</option>
                            <option value="-">Subtração (-)</option>
                            <option value="*">Multiplicação (*)</option>
                            <option value="/">Divisão (/)</option>
                            <option value="^">Potência (^)</option>
                            <option value="sqrt">Raiz Quadrada (√)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="num2" class="form-label">Número 2:</label>
                        <input type="number" class="form-control" id="num2" name="num2" step="any">
                    </div>
                    <button type="submit" class="btn btn-primary">Calcular</button>
                </form>
            </div>
        </div>
    </div>
 <?php require_once '../includes/footer.php'; ?>