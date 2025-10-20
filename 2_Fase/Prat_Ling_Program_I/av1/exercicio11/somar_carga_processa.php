<?php
require_once '../includes/auth.php';
require_once '../includes/conexao.php';

$matricula = $_POST['matricula'] ?? '';
$nova_carga = $_POST['nova_carga'] ?? 0;

$mensagem = '';
$class = '';

if (empty($matricula)) {
    $mensagem = "A matrícula é obrigatória.";
    $class = "alert-danger";
} else {
    $sql_update = "UPDATE alunos SET carga_horaria = carga_horaria + ? WHERE matricula = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("is", $nova_carga, $matricula);
    $stmt_update->execute();

    if ($stmt_update->affected_rows > 0) {
        $mensagem = "Carga horária atualizada com sucesso!";
        $class = "alert-success";
    } else {
        $mensagem = "Erro: Matrícula não encontrada ou nenhum dado foi alterado.";
        $class = "alert-warning";
    }

    $stmt_update->close();
}

$conn->close();
?>
<?php require_once '../includes/header.php'; ?>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Resultado da Atualização</h1>
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
            <a href="somar_carga.php" class="btn btn-outline-primary">Voltar para a Atualização</a>
        </div>
    </div>
<?php require_once '../includes/footer.php'; ?>