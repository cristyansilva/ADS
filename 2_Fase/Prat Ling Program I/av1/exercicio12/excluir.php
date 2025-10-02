<?php
require_once '../includes/auth.php';
require_once '../includes/conexao.php';

$id = $_POST['id'] ?? 0;

$mensagem = '';
$class = '';

if (empty($id)) {
    $mensagem = "ID do aluno não fornecido.";
    $class = "alert-danger";
} else {
    $sql = "DELETE FROM alunos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute() && $stmt->affected_rows > 0) {
        $mensagem = "Aluno excluído com sucesso!";
        $class = "alert-success";
    } else {
        $mensagem = "Erro: Aluno não encontrado ou não pôde ser excluído.";
        $class = "alert-warning";
    }
    $stmt->close();
}
$conn->close();

require_once '../includes/header.php';
?>
<title>Resultado Exclusão</title>

<div class="d-flex justify-content-between align-items-center">
    <h1 class="h3 page-title">Resultado da Exclusão</h1>
    <a href="index.php" class="btn btn-secondary">Voltar para a Busca</a>
</div>

<div class="card shadow-sm mt-4">
    <div class="card-body">
        <div class="alert <?php echo $class; ?>" role="alert">
            <?php echo htmlspecialchars($mensagem); ?>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>