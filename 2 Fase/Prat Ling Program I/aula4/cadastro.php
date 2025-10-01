<?php
include_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome      = $_POST['nome'] ?? '';
    $matricula = $_POST['matricula'] ?? '';
    $curso     = $_POST['curso'] ?? '';
    $email     = $_POST['email'] ?? '';
    $telefone  = $_POST['telefone'] ?? '';
    $endereco  = $_POST['endereco'] ?? '';
    $cep       = $_POST['cep'] ?? '';
    $cidade    = $_POST['cidade'] ?? '';
    $estado    = $_POST['estado'] ?? '';

    $stmt = $conn->prepare("INSERT INTO alunos (nome, endereco, cidade, matricula, curso, email, telefone, cep, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $nome, $endereco, $cidade, $matricula, $curso, $email, $telefone, $cep, $estado);

    if ($stmt->execute()) {
        header("Location: sucesso.php");
        exit;
    } else {
        echo "Erro ao salvar: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
