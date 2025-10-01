<?php
    require_once '../includes/auth.php';
    require_once '../includes/conexao.php';

    $search_term = $_POST['search_term'] ?? '';
    $search_by = $_POST['search_by'] ?? '';
    $where_clause = '';
    $stmt_params = [];
    $stmt_types = '';

    if (!empty($search_term) && !empty($search_by)) {
        switch ($search_by) {
            case 'nome':
                $where_clause = " WHERE nome LIKE ?";
                $stmt_params[] = '%' . $search_term . '%';
                $stmt_types = 's';
                break;
            case 'matricula':
                $where_clause = " WHERE matricula LIKE ?";
                $stmt_params[] = '%' . $search_term . '%';
                $stmt_types = 's';
                break;
            case 'email':
                $where_clause = " WHERE email LIKE ?";
                $stmt_params[] = '%' . $search_term . '%';
                $stmt_types = 's';
                break;
        }
    }

    $sql = "SELECT id, nome, matricula, curso, email, telefone, endereco, cep, cidade, uf, curso_horas, carga_horaria FROM alunos" . $where_clause;
    $stmt = $conn->prepare($sql);
    
    if (!empty($stmt_params)) {
        $stmt->bind_param($stmt_types, ...$stmt_params);
    }
    
    $stmt->execute();
    $result = $stmt->get_result();
    $alunos = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 12 - Busca e Exclusão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Exercício 12 - Busca e Exclusão</h1>
            <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
        </div>
        <div class="card shadow-sm p-4">
            <h3>Buscar Alunos</h3>
            <form action="index.php" method="post">
                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="search_term" value="<?php echo htmlspecialchars($search_term); ?>" placeholder="Termo de Busca">
                    </div>
                    <div class="col-md-4">
                        <select name="search_by" class="form-select">
                            <option value="nome" <?php echo ($search_by == 'nome') ? 'selected' : ''; ?>>Nome</option>
                            <option value="matricula" <?php echo ($search_by == 'matricula') ? 'selected' : ''; ?>>Matrícula</option>
                            <option value="email" <?php echo ($search_by == 'email') ? 'selected' : ''; ?>>E-mail</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Buscar</button>
                    </div>
                </div>
            </form>

            <h4 class="mt-4">Resultados</h4>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th><th>Matrícula</th><th>Curso</th><th>E-mail</th><th>Telefone</th><th>Endereço</th><th>CEP</th><th>Cidade</th><th>UF</th><th>Horas</th><th>Carga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($alunos)): ?>
                            <?php foreach ($alunos as $aluno): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($aluno['nome']); ?></td>
                                    <td><?php echo htmlspecialchars($aluno['matricula']); ?></td>
                                    <td><?php echo htmlspecialchars($aluno['curso']); ?></td>
                                    <td><?php echo htmlspecialchars($aluno['email']); ?></td>
                                    <td><?php echo htmlspecialchars($aluno['telefone']); ?></td>
                                    <td><?php echo htmlspecialchars($aluno['endereco']); ?></td>
                                    <td><?php echo htmlspecialchars($aluno['cep']); ?></td>
                                    <td><?php echo htmlspecialchars($aluno['cidade']); ?></td>
                                    <td><?php echo htmlspecialchars($aluno['uf']); ?></td>
                                    <td><?php echo htmlspecialchars($aluno['curso_horas']); ?></td>
                                    <td><?php echo htmlspecialchars($aluno['carga_horaria']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="11" class="text-center">Nenhum aluno encontrado.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <h3 class="mt-4">Excluir Registro</h3>
            <form action="excluir.php" method="post">
                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="delete_term" required placeholder="Termo para Exclusão">
                    </div>
                    <div class="col-md-4">
                        <select name="delete_by" class="form-select">
                            <option value="nome">Nome</option>
                            <option value="matricula">Matrícula</option>
                            <option value="email">E-mail</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Tem certeza que deseja excluir este registro?');">Excluir</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>