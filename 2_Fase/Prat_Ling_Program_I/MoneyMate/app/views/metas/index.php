<?php include __DIR__ . '/../../views/layouts/header.php'; ?>

<div class="wrapper">
    <?php include __DIR__ . '/../../views/layouts/sidebar.php'; ?>
    
    <div id="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Minhas Metas</h2>
                <p class="text-muted">Defina e acompanhe seus objetivos financeiros.</p>
            </div>
            <button class="btn btn-success shadow-sm" data-bs-toggle="modal" data-bs-target="#modalMeta">
                <i class="fas fa-plus"></i> Nova Meta
            </button>
        </div>

        <div class="row">
            <?php if(empty($metas)): ?>
                <div class="col-12"><p class="text-center text-muted m-0 py-5">Nenhuma meta criada.</p></div>
            <?php else: ?>
                <?php foreach($metas as $meta): 
                    $percent = $meta['valor_alvo'] > 0 ? ($meta['valor_atual'] / $meta['valor_alvo']) * 100 : 0;
                    $restante = $meta['valor_alvo'] - $meta['valor_atual'];
                ?>
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-bold h5 m-0"><i class="fas fa-bullseye me-2 text-success"></i><?= htmlspecialchars($meta['nome']) ?></span>
                                <a href="?rota=excluir_meta&id=<?= $meta['id'] ?>" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Excluir esta meta?')"><i class="fas fa-trash"></i></a>
                            </div>
                            <div class="d-flex justify-content-between mb-1 small">
                                <span class="fw-bold text-dark">R$ <?= number_format($meta['valor_atual'], 2, ',', '.') ?></span>
                                <span class="text-muted">/ R$ <?= number_format($meta['valor_alvo'], 2, ',', '.') ?></span>
                            </div>
                            <div class="progress" style="height: 12px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: <?= min(100, $percent) ?>%;" title="<?= number_format($percent, 0) ?>%"></div>
                            </div>
                            <div class="text-end mt-1">
                                <small class="text-muted">Faltam: R$ <?= number_format($restante, 2, ',', '.') ?></small>
                            </div>

                            <hr>
                            <form action="index.php?rota=adicionar_valor_meta" method="POST" class="d-flex gap-2">
                                <input type="hidden" name="meta_id" value="<?= $meta['id'] ?>">
                                <input type="number" name="valor" class="form-control form-control-sm" placeholder="Adicionar R$" step="0.01" required>
                                <button class="btn btn-sm btn-success">Adicionar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="modalMeta" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Nova Meta</h5></div>
            <form action="index.php?rota=salvar_meta" method="POST">
                <div class="modal-body">
                    <div class="mb-3"><label>Nome da Meta</label><input type="text" name="nome" class="form-control" placeholder="Ex: Viagem, Emergência" required></div>
                    <div class="mb-3"><label>Valor Alvo (R$)</label><input type="number" step="0.01" name="valor_alvo" class="form-control" required></div>
                </div>
                <div class="modal-footer"><button class="btn btn-success">Criar Meta</button></div>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../views/layouts/footer.php'; ?>