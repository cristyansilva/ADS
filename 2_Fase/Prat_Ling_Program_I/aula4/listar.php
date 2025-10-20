<?php
include_once("conexao.php");

$busca = $_GET['busca'] ?? '';

if (!empty($busca)) {
    $busca_like = "%".$busca."%";
    $stmt = $conn->prepare("SELECT id, nome, matricula, curso, email, telefone, endereco, cep, cidade, estado 
                            FROM alunos
                            WHERE nome LIKE ? OR matricula LIKE ? OR curso LIKE ? OR email LIKE ?");
    $stmt->bind_param("ssss", $busca_like, $busca_like, $busca_like, $busca_like);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT id, nome, matricula, curso, email, telefone, endereco, cep, cidade, estado FROM alunos");
}

if (isset($_GET['excluir_id'])) {
    $id_excluir = intval($_GET['excluir_id']);
    $stmt_del = $conn->prepare("DELETE FROM alunos WHERE id = ?");
    $stmt_del->bind_param("i", $id_excluir);
    $stmt_del->execute();
    $stmt_del->close();
    header("Location: listar.php?busca=".urlencode($busca));
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Lista de Alunos</h2>

    <form method="GET" class="row g-3 mb-3">
        <div class="col-md-8">
            <input type="text" name="busca" class="form-control" placeholder="Buscar por Nome, Matrícula, Curso ou Email" value="<?= htmlspecialchars($busca) ?>">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="listar.php" class="btn btn-secondary">Limpar</a>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Matrícula</th>
                <th>Curso</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>CEP</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nome']}</td>
                        <td>{$row['matricula']}</td>
                        <td>{$row['curso']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['telefone']}</td>
                        <td>{$row['endereco']}</td>
                        <td>{$row['cep']}</td>
                        <td>{$row['cidade']}</td>
                        <td>{$row['estado']}</td>
                        <td>
                            <a href='listar.php?excluir_id={$row['id']}&busca=".urlencode($busca)."' class='btn btn-danger btn-sm' onclick=\"return confirm('Deseja realmente excluir este aluno?');\">Excluir</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='11'>Nenhum aluno encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-primary">Voltar</a>
</body>
</html>

<?php
if (isset($stmt)) $stmt->close();
$conn->close();
?>
