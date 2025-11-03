<?php
// Arquivo: view/listagem.php

/* IMPORTANTE: 
   Este arquivo espera receber duas variáveis do Controller:
   $cursos (um array com os dados dos cursos)
   $totalCursos (um número inteiro com o total)
*/
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
    
    <style>
        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }
        .form-delete {
            display: inline-block; /* Faz o form de exclusão ficar na linha */
        }
    </style>
</head>
<body>
    <div class="container mt-5">

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                <h2 class="h5 mb-0"><i class="bi bi-list-ul"></i> Cursos Cadastrados</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Nome do Curso</th>
                                <th scope="col">Código</th>
                                <th scope="col">Duração (meses)</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Verifica se há cursos para listar
                            if ($totalCursos > 0) {
                                // Loop para exibir cada curso
                                foreach ($cursos as $curso) {
                                    echo '<tr>';
                                    // Usamos htmlspecialchars para prevenir XSS
                                    echo '<th scope="row">' . htmlspecialchars($curso['id']) . '</th>';
                                    echo '<td>' . htmlspecialchars($curso['nome_do_curso']) . '</td>';
                                    echo '<td>' . htmlspecialchars($curso['codigo_do_curso']) . '</td>';
                                    echo '<td>' . htmlspecialchars($curso['duracao']) . '</td>';
                                    echo '<td>' . htmlspecialchars($curso['descricao']) . '</td>';
                                    echo '<td>';
                                    // Formulário de EXCLUSÃO por nome (requisito do PDF )
                                    // Envia para o index.php com a ação 'excluir'
                                    echo '<form action="../index.php?acao=excluir" method="POST" class="form-delete" onsubmit="return confirm(\'Tem certeza que quer excluir este curso?\');">';
                                    echo '<input type="hidden" name="nome_curso_excluir" value="' . htmlspecialchars($curso['nome_do_curso']) . '">';
                                    echo '<button type="submit" name="excluir_por_nome" class="btn btn-danger btn-sm">';
                                    echo '<i class="bi bi-trash3"></i>';
                                    echo '</button>';
                                    echo '</form>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                // Caso não haja cursos
                                echo '<tr><td colspan="6" class="text-center">Nenhum curso cadastrado até o momento.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="alert alert-info mt-3">
                    Total de cursos cadastrados: <strong><?php echo $totalCursos; ?></strong>
                </div>

            </div>
            <div class="card-footer">
                <a href="../index.php?acao=formulario" class="btn btn-primary">
                    <i class="bi bi-arrow-left-circle"></i> Voltar para o Cadastro
                </a>
            </div>
        </div>
        
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-warning">
                <h3 class="h5 mb-0"><i class="bi bi-pencil-square"></i> Atualizar Curso</h3>
            </div>
            <div class="card-body">
                <form action="../index.php?acao=atualizar" method="POST">
                    <div class="mb-3">
                        <label for="nome_curso_buscar" class="form-label">Nome do Curso a Atualizar:</label>
                        <input type="text" class="form-control" name="nome_curso_buscar" id="nome_curso_buscar" placeholder="Digite o nome exato" required>
                    </div>
                    <div class="mb-3">
                        <label for="novo_codigo" class="form-label">Novo Código do Curso:</label>
                        <input type="text" class="form-control" name="novo_codigo" id="novo_codigo" required>
                    </div>
                    <div class="mb-3">
                        <label for="nova_duracao" class="form-label">Nova Duração (em meses):</label>
                        <input type="number" class="form-control" name="nova_duracao" id="nova_duracao" min="1" required>
                    </div>
                    <button type="submit" name="atualizar" class="btn btn-warning w-100">Atualizar</button>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>