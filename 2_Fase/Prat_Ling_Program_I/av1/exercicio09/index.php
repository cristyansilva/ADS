<?php
    require_once '../includes/auth.php';
    $last_result = $_COOKIE['ex09_ultimo'] ?? 'Nenhum';
?>
<?php require_once '../includes/header.php'; ?>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Exercício 9</h1>
            <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <p>Último valor usado: <strong><?php echo htmlspecialchars($last_result); ?></strong></p>
                <form action="processa.php" method="post">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="idade" class="form-label">Idade:</label>
                        <input type="number" class="form-control" id="idade" name="idade" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Verificar Maioridade</button>
                </form>
            </div>
        </div>
    </div>
<?php require_once '../includes/footer.php'; ?>