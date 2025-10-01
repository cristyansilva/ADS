<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processamento - Cadastros</title>
</head>

<body>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($nome) || empty($matricula) || empty($curso) || empty($email) || empty($telefone) || empty($endereco) || ($cep) || ($cidade) || ($estado)) {
        $nome = $_POST['nome'];
        $matricula = $_POST['matricula'];
        $curso = $_POST['curso'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $cep = $_POST['cep'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        header("Location: sucesso.php");
        exit;
    } else {
        header("Location: falha.php");
        exit;
    }
} else {
    header(header: "Location: agradecimentos.php");
    exit;
}
?>
</body>
</html>