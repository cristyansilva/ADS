<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucesso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
<H1>Sucesso! Dados Gravados.</H1>
<?php
        $nome = $_POST['nome'];
        $matricula = $_POST['matricula'];
        $curso = $_POST['curso'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $cep = $_POST['cep'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
echo "<h1>Dados Recebidos</h1><br>";
echo "<p><strong>nome: </strong> $nome</p>";
echo "<p><strong>matricula: </strong> $matricula</p>";
echo "<p><strong>curso: </strong> $curso</p>";
echo "<p><strong>email: </strong> $email</p>";
echo "<p><strong>telefone: </strong> $telefone</p>";
echo "<p><strong>endereco: </strong> $endereco</p>";
echo "<p><strong>cep: </strong> $cep</p>";
echo "<p><strong>cidade: </strong> $cidade</p>";
echo "<p><strong>estado: </strong> $estado</p>";
?>
</body>
</html>