<?php
require_once '../includes/auth.php';
require_once '../includes/conexao.php';

$delete_term = $_POST['delete_term'] ?? '';
$delete_by = $_POST['delete_by'] ?? '';

$mensagem = '';
$class = '';

if (empty($delete_term) || empty($delete_by)) {
    $mensagem = "Termo ou critério de exclusão inválido.";
    $class = "alert-danger";
} else {
    $where_clause = '';
    switch ($delete_by) {
        case 'nome':
        case 'matricula':
        case 'email':
            $where_clause = " WHERE " . $delete_by . " = ?";
            break;
        default:
            $mensagem = "Critério de exclusão inválido.";
            $class = "alert-danger";
            break;
    }
    
    if (!empty($where_clause)) {
        $sql = "DELETE FROM alunos" . $where_clause;
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $delete_term);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            $mensagem = "Registro excluído com sucesso!";
            $class = "alert-success";
        } else {
            $mensagem = "Erro: Nenhum registro encontrado com o termo fornecido.";
            $class = "alert-warning";
        }
        $stmt->close();
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Exclusão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Resultado da Exclusão</h1>
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
            <a href="index.php" class="btn btn-outline-primary">Voltar para a Busca</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>