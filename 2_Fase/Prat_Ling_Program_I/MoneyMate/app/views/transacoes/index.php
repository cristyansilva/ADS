<?php include __DIR__ . '/../../views/layouts/header.php'; ?>

<div class="wrapper">
    <?php include __DIR__ . '/../../views/layouts/sidebar.php'; ?>

    <div id="content">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Histórico de Transações</h2>
                <p class="text-muted">Gerencie suas receitas e despesas passadas.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="index.php?rota=exportar_csv" class="btn btn-outline-success">
                    <i class="fas fa-file-download me-2"></i> Exportar CSV
                </a>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTransacao" onclick="limparModalTransacao()">
                    <i class="fas fa-plus me-2"></i> Nova Transação
                </button>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">Data</th>
                                <th>Descrição</th>
                                <th>Categoria</th>
                                <th>Conta</th>
                                <th>Valor</th>
                                <th>Anexo</th>
                                <th class="text-end pe-4">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($transacoes)): ?>
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-muted">
                                        Nenhuma transação encontrada.
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach($transacoes as $t): ?>
                                <tr>
                                    <td class="ps-4"><?= date('d/m/Y', strtotime($t['data_transacao'])) ?></td>
                                    <td>
                                        <span class="fw-bold text-dark"><?= htmlspecialchars($t['descricao']) ?></span>
                                    </td>
                                    <td>
                                        <?php if(!empty($t['categoria_nome'])): ?>
                                            <span class="badge bg-light text-dark border">
                                                <?= htmlspecialchars($t['categoria_nome']) ?>
                                            </span>
                                        <?php else: ?>
                                            <span class="text-muted small">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($t['conta_nome']) ?></td>
                                    <td class="<?= $t['tipo'] == 'receita' ? 'text-success' : 'text-danger' ?> fw-bold">
                                        <?= $t['tipo'] == 'despesa' ? '-' : '+' ?> 
                                        R$ <?= number_format($t['valor'], 2, ',', '.') ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($t['comprovante'])): ?>
                                            <a href="uploads/<?= $t['comprovante'] ?>" target="_blank" class="btn btn-sm btn-light text-secondary border" title="Ver Comprovante">
                                                <i class="fas fa-paperclip"></i>
                                            </a>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-end pe-4">
                                        <button class="btn btn-sm btn-outline-primary border-0" 
                                            onclick='editarTransacao(<?= json_encode($t) ?>)'
                                            data-bs-toggle="modal" data-bs-target="#modalTransacao" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <a href="index.php?rota=excluir_transacao&id=<?= $t['id'] ?>&origem=lista" 
                                           class="btn btn-sm btn-outline-danger border-0" 
                                           onclick="return confirm('Tem certeza? O valor será estornado ao saldo da conta.')"
                                           title="Excluir">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTransacao" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTransacaoTitulo">Nova Movimentação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="index.php?rota=salvar_transacao" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="id" id="transacao_id">
                <input type="hidden" name="origem" value="transacoes">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label>Conta</label>
                            <select name="conta_id" class="form-select" required>
                                <?php foreach($contas as $c): ?>
                                    <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nome']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label>Categoria</label>
                            <select name="categoria_id" class="form-select">
                                <option value="">Selecione...</option>
                                <?php foreach($categorias as $cat): ?>
                                    <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['nome']) ?> (<?= $cat['tipo'] ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label>Tipo</label>
                            <select name="tipo" class="form-select">
                                <option value="despesa">Despesa</option>
                                <option value="receita">Receita</option>
                            </select>
                        </div>
                        <div class="col-6 mb-3" id="campo_parcelas">
                            <label>Parcelas</label>
                            <input type="number" name="parcelas" class="form-control" value="1" min="1" required>
                            <small class="text-muted">1 = À vista</small>
                        </div>
                    </div>
                    <div class="mb-3"><label>Descrição</label><input type="text" name="descricao" class="form-control" required></div>
                    <div class="mb-3"><label>Valor</label><input type="number" step="0.01" name="valor" class="form-control" placeholder="Valor total ou da parcela" required></div>
                    <div class="mb-3"><label>Data</label><input type="date" name="data" class="form-control" value="<?= date('Y-m-d') ?>" required></div>
                    <div class="mb-3"><label>Comprovante</label><input type="file" name="comprovante" class="form-control"></div>
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
function editarTransacao(dados) {
    document.getElementById('modalTransacaoTitulo').innerText = 'Editar Transação';
    document.getElementById('transacao_id').value = dados.id;
    document.querySelector('#modalTransacao select[name="conta_id"]').value = dados.conta_id;
    document.querySelector('#modalTransacao select[name="categoria_id"]').value = dados.categoria_id;
    document.querySelector('#modalTransacao select[name="tipo"]').value = dados.tipo;
    document.querySelector('#modalTransacao input[name="descricao"]').value = dados.descricao;
    document.querySelector('#modalTransacao input[name="valor"]').value = dados.valor;
    document.querySelector('#modalTransacao input[name="data"]').value = dados.data_transacao;
    document.getElementById('campo_parcelas').style.display = 'none';
}

function limparModalTransacao() {
    document.getElementById('modalTransacaoTitulo').innerText = 'Nova Movimentação';
    document.getElementById('transacao_id').value = '';
    
    const form = document.querySelector('#modalTransacao form');
    if (form) form.reset();
    
    document.querySelector('#modalTransacao input[name="data"]').value = '<?= date('Y-m-d') ?>';
    document.getElementById('campo_parcelas').style.display = 'block';
}
</script>

<?php include __DIR__ . '/../../views/layouts/footer.php'; ?>