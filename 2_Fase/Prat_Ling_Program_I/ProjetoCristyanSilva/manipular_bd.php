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
            $aluno = $conexao->real_escape_string($_POST['aluno']);
            $nome_curso = $conexao->real_escape_string($_POST['nome_curso']);
            $codigo_curso = $conexao->real_escape_string($_POST['codigo_curso']);
            $duracao = (int)$_POST['duracao'];
            $descricao = $conexao->real_escape_string($_POST['descricao']);
            
            $sql = "INSERT INTO cursos (aluno, nome_do_curso, codigo_do_curso, duracao, descricao) VALUES ('$aluno', '$nome_curso', '$codigo_curso', $duracao, '$descricao')";

            if ($conexao->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Curso cadastrado com sucesso!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Erro ao cadastrar o curso: ' . $conexao->error . '</div>';
            }
        }

        if (isset($_POST['excluir_por_nome'])) {
            $nome_para_excluir = $conexao->real_escape_string($_POST['nome_curso_excluir']);
            
            if (!empty($nome_para_excluir)) {
                $sql_excluir = "DELETE FROM cursos WHERE nome_do_curso = '$nome_para_excluir'";
                
                if ($conexao->query($sql_excluir) === TRUE) {
                    if ($conexao->affected_rows > 0) {
                        echo '<div class="alert alert-warning" role="alert">Curso "<strong>' . htmlspecialchars($nome_para_excluir) . '</strong>" excluído com sucesso!</div>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Nenhum curso encontrado com o nome "<strong>' . htmlspecialchars($nome_para_excluir) . '</strong>".</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger" role="alert">Erro ao executar a exclusão: ' . $conexao->error . '</div>';
                }
            } else {
                echo '<div class="alert alert-info" role="alert">Por favor, digite o nome de um curso para excluir.</div>';
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
         <div class="card shadow-sm mb-4">
            <div class="card-header bg-danger text-white">
                <h3 class="h5 mb-0"><i class="bi bi-trash3"></i> Excluir Curso</h3>
            </div>
            <div class="card-body">
                <form action="manipular_bd.php" method="POST">
                    <div class="mb-3">
                        <label for="nome_curso_excluir" class="form-label">Digite o nome exato do curso que deseja excluir:</label>
                        <input type="text" class="form-control" name="nome_curso_excluir" id="nome_curso_excluir" placeholder="Ex: Engenharia de Software" required>
                    </div>
                    <button type="submit" name="excluir_por_nome" class="btn btn-danger w-100">Excluir Curso</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>