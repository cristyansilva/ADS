<?php
require_once '../includes/auth.php';
require_once '../includes/conexao.php';

$nome = $_POST['nome'] ?? '';
$matricula = $_POST['matricula'] ?? '';
$curso = $_POST['curso'] ?? '';
$email = $_POST['email'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$endereco = $_POST['endereco'] ?? '';
$cep = $_POST['cep'] ?? '';
$cidade = $_POST['cidade'] ?? '';
$uf = $_POST['uf'] ?? '';
$curso_horas = $_POST['curso_horas'] ?? '';
$carga_horaria = $_POST['carga_horaria'] ?? 0;

$sql = "INSERT INTO alunos (nome, matricula, curso, email, telefone, endereco, cep, cidade, uf, curso_horas, carga_horaria) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssi", $nome, $matricula, $curso, $email, $telefone, $endereco, $cep, $cidade, $uf, $curso_horas, $carga_horaria);

$mensagem = '';
$class = '';

if ($stmt->execute()) {
    $mensagem = "Aluno cadastrado com sucesso!";
    $class = "alert-success";
} else {
    $mensagem = "Erro ao cadastrar aluno: " . $stmt->error;
    $class = "alert-danger";
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Resultado do Cadastro</h1>
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
            <a href="index.php" class="btn btn-outline-primary">Voltar para o Cadastro</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>