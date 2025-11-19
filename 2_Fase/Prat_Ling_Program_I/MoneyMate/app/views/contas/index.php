<?php include __DIR__ . '/../../views/layouts/header.php'; ?>

<div class="wrapper">
    <?php include __DIR__ . '/../../views/layouts/sidebar.php'; ?>
    <div id="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Minhas Contas</h2>
                <p class="text-muted">Gerencie suas contas bancárias e carteiras.</p>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalConta" onclick="limparModalConta()">
                <i class="fas fa-plus"></i> Nova Conta
            </button>
        </div>

        <div class="row">
            <?php foreach ($contas as $conta): ?>
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="card-title fw-bold text-dark"><?= htmlspecialchars($conta['nome']) ?></h5>
                                    <h3 class="fw-bold text-primary">R$ <?= number_format($conta['saldo_atual'], 2, ',', '.') ?></h3>
                                </div>
                                
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v text-muted"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="#" 
                                               onclick='editarConta(<?= json_encode($conta) ?>)' 
                                               data-bs-toggle="modal" data-bs-target="#modalConta">
                                               <i class="fas fa-edit me-2"></i>Editar
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-danger" 
                                               href="index.php?rota=excluir_conta&id=<?= $conta['id'] ?>" 
                                               onclick="return confirm('Atenção! Excluir a conta não apaga as transações dela.')">
                                               <i class="fas fa-trash me-2"></i>Excluir
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="modalConta" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalContaTitulo">Nova Conta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="index.php?rota=salvar_conta" method="POST">
                
                <input type="hidden" name="id" id="conta_id">
                <input type="hidden" name="origem" value="contas">

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nome da Conta</label>
                        <input type="text" name="nome" id="conta_nome" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Saldo</label>
                        <input type="number" step="0.01" name="saldo_inicial" id="conta_saldo" class="form-control" required>
                        <small class="text-muted">Para editar, digite o novo saldo total. Para criar, o saldo inicial.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editarConta(dados) {
    document.getElementById('modalContaTitulo').innerText = 'Editar Conta';
    document.getElementById('conta_id').value = dados.id;
    document.getElementById('conta_nome').value = dados.nome;
    document.getElementById('conta_saldo').value = dados.saldo_atual; 
}

function limparModalConta() {
    document.getElementById('modalContaTitulo').innerText = 'Nova Conta';
    document.getElementById('conta_id').value = '';
    document.getElementById('conta_nome').value = '';
    document.getElementById('conta_saldo').value = '0.00';
}
</script>

<?php include __DIR__ . '/../../views/layouts/footer.php'; ?>