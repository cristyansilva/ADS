<?php
    $nome = filter_input(INPUT_POST, "nome");
    $telefone = filter_input(INPUT_POST,"telefone");
    ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
<form method="POST">
  <div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" name="nome" aria-describedby="nome">
    </div>
  <div class="mb-3">
    <label for="telefone" class="form-label">Telefone</label>
    <input type="numer" class="form-control" name="telefone"></div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
        <h1>Dados Preenchidos</h1><br>
        <h2> <?php  echo $nome ?> </h2> 
        <h2> <?php  echo $telefone ?> </h2> 
</body>
</html>