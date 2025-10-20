<?php require_once '../includes/auth.php'; ?>
<?php require_once '../includes/header.php'; ?>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Exercício 11 - Cadastro de Alunos</h1>
            <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="cadastro.php" method="post">
                    <div class="mb-3"><label for="nome" class="form-label">Nome:</label><input type="text" class="form-control" name="nome" required></div>
                    <div class="mb-3"><label for="matricula" class="form-label">Matrícula:</label><input type="text" class="form-control" name="matricula" required></div>
                    <div class="mb-3"><label for="curso" class="form-label">Curso:</label><input type="text" class="form-control" name="curso" required></div>
                    <div class="mb-3"><label for="email" class="form-label">E-mail:</label><input type="email" class="form-control" name="email" required></div>
                    <div class="mb-3"><label for="telefone" class="form-label">Telefone:</label><input type="tel" class="form-control" name="telefone" required></div>
                    <div class="mb-3"><label for="endereco" class="form-label">Endereço:</label><input type="text" class="form-control" name="endereco" required></div>
                    <div class="mb-3"><label for="cep" class="form-label">CEP:</label><input type="text" class="form-control" name="cep" required></div>
                    <div class="mb-3"><label for="cidade" class="form-label">Cidade:</label><input type="text" class="form-control" name="cidade" required></div>
                    <div class="mb-3"><label for="uf" class="form-label">UF:</label><input type="text" class="form-control" name="uf" maxlength="2" required></div>
                    <div class="mb-3"><label for="curso_horas" class="form-label">Curso p/ Horas:</label><input type="text" class="form-control" name="curso_horas" required></div>
                    <div class="mb-3"><label for="carga_horaria" class="form-label">Carga Horária:</label><input type="number" class="form-control" name="carga_horaria" required></div>
                    <button type="submit" class="btn btn-primary">Cadastrar Aluno</button>
                </form>
            </div>
        </div>
        <div class="mt-3">
            <a href="somar_carga.php" class="btn btn-secondary">Atualizar Carga Horária</a>
        </div>
    </div>
<?php require_once '../includes/footer.php'; ?>