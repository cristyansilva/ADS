<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1>Faça Sua Matrícula</h1>
    <form action="cadastro.php" method="POST" class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Matrícula</label>
            <input type="text" class="form-control" name="matricula" required>
        </div>
        <div class="col-md-3">
            <label class="form-label">Curso</label>
            <input type="text" class="form-control" name="curso">
        </div>
        <div class="col-md-9">
            <label class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Telefone</label>
            <input type="text" class="form-control" name="telefone" required>
        </div>
        <div class="col-md-5">
            <label class="form-label">Endereço</label>
            <input type="text" class="form-control" name="endereco">
        </div>
        <div class="col-md-2">
            <label class="form-label">CEP</label>
            <input type="text" class="form-control" name="cep">
        </div>
        <div class="col-md-3">
            <label class="form-label">Cidade</label>
            <input type="text" class="form-control" name="cidade">
        </div>
        <div class="col-md-3">
            <label class="form-label">Estado</label>
            <input type="text" class="form-control" name="estado">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="reset" class="btn btn-warning">Limpar</button>
        </div>
    </form>

    <hr>

    <h2>Outras Ações</h2>
    <div class="mb-2">
        <a href="listar.php" class="btn btn-success">Listar Alunos</a>
    </div>
</body>
</html>
