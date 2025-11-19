<?php include __DIR__ . '/../../views/layouts/header.php'; ?>

<div class="wrapper">
    <?php include __DIR__ . '/../../views/layouts/sidebar.php'; ?>
    
    <div id="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Categorias</h2>
                <p class="text-muted">Organize suas transações por categoria.</p>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCategoria" onclick="limparModalCat()">
                <i class="fas fa-plus"></i> Nova Categoria
            </button>
        </div>

        <!-- Abas de Navegação (Tabs) -->
        <ul class="nav nav-tabs mb-4" id="catTab" role="tablist">
            <li class="nav-item">
                <button class="nav-link active text-danger" id="despesas-tab" data-bs-toggle="tab" data-bs-target="#despesas" type="button">Despesas</button>
            </li>
            <li class="nav-item">
                <button class="nav-link text-success" id="receitas-tab" data-bs-toggle="tab" data-bs-target="#receitas" type="button">Receitas</button>
            </li>
        </ul>

        <div class="tab-content" id="catTabContent">
            
            <!-- Aba Despesas -->
            <div class="tab-pane fade show active" id="despesas" role="tabpanel">
                <div class="row">
                    <?php if(empty($despesas)): ?>
                        <div class="col-12"><div class="alert alert-light border">Nenhuma categoria de despesa.</div></div>
                    <?php endif; ?>

                    <?php foreach($despesas as $c): ?>
                    <div class="col-md-4 col-lg-3 mb-3">
                        <div class="card shadow-sm h-100 border-0">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3" style="width:40px; height:40px;">
                                        <i class="fas <?= $c['icone'] ?? 'fa-tag' ?> text-danger"></i>
                                    </div>
                                    <span class="fw-bold"><?= htmlspecialchars($c['nome']) ?></span>
                                </div>
                                
                                <!--  Botões de Ação (Editar e Excluir) -->
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light border-0" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="#" 
                                               onclick='editarCategoria(<?= json_encode($c) ?>)' 
                                               data-bs-toggle="modal" data-bs-target="#modalCategoria">
                                               <i class="fas fa-edit me-2"></i>Editar
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-danger" 
                                               href="index.php?rota=excluir_categoria&id=<?= $c['id'] ?>" 
                                               onclick="return confirm('Excluir categoria?')">
                                               <i class="fas fa-trash-alt me-2"></i>Excluir
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Aba Receitas -->
            <div class="tab-pane fade" id="receitas" role="tabpanel">
                <div class="row">
                    <?php if(empty($receitas)): ?>
                        <div class="col-12"><div class="alert alert-light border">Nenhuma categoria de receita.</div></div>
                    <?php endif; ?>

                    <?php foreach($receitas as $c): ?>
                    <div class="col-md-4 col-lg-3 mb-3">
                        <div class="card shadow-sm h-100 border-0">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3" style="width:40px; height:40px;">
                                        <i class="fas <?= $c['icone'] ?? 'fa-tag' ?> text-success"></i>
                                    </div>
                                    <span class="fw-bold"><?= htmlspecialchars($c['nome']) ?></span>
                                </div>
                                
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light border-0" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="#" 
                                               onclick='editarCategoria(<?= json_encode($c) ?>)' 
                                               data-bs-toggle="modal" data-bs-target="#modalCategoria">
                                               <i class="fas fa-edit me-2"></i>Editar
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-danger" 
                                               href="index.php?rota=excluir_categoria&id=<?= $c['id'] ?>" 
                                               onclick="return confirm('Excluir categoria?')">
                                               <i class="fas fa-trash-alt me-2"></i>Excluir
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal Nova Categoria -->
<div class="modal fade" id="modalCategoria" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Nova Categoria</h5></div>
            <form action="index.php?rota=salvar_categoria" method="POST">
                <input type="hidden" name="id" id="cat_id">
                <input type="hidden" name="origem" value="categorias">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Tipo</label>
                        <select name="tipo" class="form-select">
                            <option value="despesa">Despesa</option>
                            <option value="receita">Receita</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editarCategoria(dados) {
    document.querySelector('#modalCategoria .modal-title').innerText = 'Editar Categoria';
    document.getElementById('cat_id').value = dados.id;
    document.querySelector('#modalCategoria input[name="nome"]').value = dados.nome;
    document.querySelector('#modalCategoria select[name="tipo"]').value = dados.tipo;
}

function limparModalCat() {
    document.querySelector('#modalCategoria .modal-title').innerText = 'Nova Categoria';
    document.getElementById('cat_id').value = '';
    document.querySelector('#modalCategoria input[name="nome"]').value = '';
    document.querySelector('#modalCategoria select[name="tipo"]').value = 'despesa';
}
</script>

<?php include __DIR__ . '/../../views/layouts/footer.php'; ?>