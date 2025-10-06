<?php
require_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Cursos</title>
    <link rel="icon" type="img/cns.png" href="img/cns.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-5">
        <?php
        if (isset($_POST['cadastrar'])) {
            $nome_curso = $conexao->real_escape_string($_POST['nome_curso']);
            $codigo_curso = $conexao->real_escape_string($_POST['codigo_curso']);
            $duracao = (int)$_POST['duracao'];
            $descricao = $conexao->real_escape_string($_POST['descricao']);
            
            $sql = "INSERT INTO cursos (nome_do_curso, codigo_do_curso, duracao, descricao) VALUES ('$nome_curso', '$codigo_curso', $duracao, '$descricao')";

            if ($conexao->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Curso cadastrado com sucesso!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Erro ao cadastrar o curso: ' . $conexao->error . '</div>';
            }
        }

        if (isset($_GET['excluir_id'])) {
            $id_para_excluir = (int)$_GET['excluir_id'];
            $sql_excluir = "DELETE FROM cursos WHERE id = $id_para_excluir";

            if ($conexao->query($sql_excluir) === TRUE) {
                echo '<div class="alert alert-warning" role="alert">Curso excluído com sucesso!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Erro ao excluir o curso: ' . $conexao->error . '</div>';
            }
        }

        ?>

        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                <h2 class="h5 mb-0"><i class="bi bi-list-ul"></i> Cursos Cadastrados</h2>
                <span class="badge bg-light text-secondary-emphasis fs-6">
                    <i class="bi bi-person-circle"></i> Aluno: Cristyan
                </span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?php
                    $sql_listar = "SELECT id, nome_do_curso, codigo_do_curso, duracao, descricao FROM cursos ORDER BY nome_do_curso ASC";
                    $resultado = $conexao->query($sql_listar);

                    if ($resultado->num_rows > 0) {
                        echo '<table class="table table-striped table-hover table-bordered">';
                        echo '<thead class="table-dark">';
                        echo '<tr>';
                        echo '<th scope="col">#ID</th>';
                        echo '<th scope="col">Nome do Curso</th>';
                        echo '<th scope="col">Código</th>';
                        echo '<th scope="col">Duração</th>';
                        echo '<th scope="col">Descrição</th>';
                        echo '<th scope="col" class="text-center">Ação</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        while ($curso = $resultado->fetch_assoc()) {
                            echo '<tr>';
                            echo '<th scope="row">' . htmlspecialchars($curso['id']) . '</th>';
                            echo '<td>' . htmlspecialchars($curso['nome_do_curso']) . '</td>';
                            echo '<td>' . htmlspecialchars($curso['codigo_do_curso']) . '</td>';
                            echo '<td>' . htmlspecialchars($curso['duracao']) . ' meses</td>';
                            echo '<td>' . htmlspecialchars($curso['descricao']) . '</td>';
                            echo '<td class="text-center"><a href="manipular_bd.php?excluir_id=' . $curso['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Tem certeza que deseja excluir este curso?\');"><i class="bi bi-trash"></i></a></td>';
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table>';

                        $total_cursos = $resultado->num_rows;
                        echo "<div class='alert alert-info mt-3'>Total de Cursos Cadastrados: <strong>$total_cursos</strong></div>";

                    } else {
                        echo '<div class="alert alert-secondary text-center" role="alert">Nenhum curso cadastrado até o momento.</div>';
                    }

                    $conexao->close();
                    ?>
                </div>
            </div>
            <div class="card-footer">
                <a href="index.html" class="btn btn-primary">
                    <i class="bi bi-arrow-left-circle"></i> Voltar para o Cadastro
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>