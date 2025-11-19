<?php include __DIR__ . '/../../views/layouts/header.php'; ?>

<div class="wrapper">
    <?php include __DIR__ . '/../../views/layouts/sidebar.php'; ?>
    
    <div id="content">
        <?php
            $dataAtual = DateTime::createFromFormat('!m-Y', "$mes-$ano");
            $mesAnterior = (clone $dataAtual)->modify('-1 month');
            $mesProximo = (clone $dataAtual)->modify('+1 month');
            $meses = [1=>'Janeiro', 2=>'Fevereiro', 3=>'Março', 4=>'Abril', 5=>'Maio', 6=>'Junho', 7=>'Julho', 8=>'Agosto', 9=>'Setembro', 10=>'Outubro', 11=>'Novembro', 12=>'Dezembro'];
        ?>
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Orçamentos</h2>
                <p class="text-muted">Acompanhe seus limites de gasto por categoria.</p>
            </div>
            <button class="btn btn-warning text-dark shadow-sm" data-bs-toggle="modal" data-bs-target="#modalOrcamento">
                <i class="fas fa-plus"></i> Novo Orçamento
            </button>
        </div>

        <div class="d-flex justify-content-center align-items-center mb-4 bg-white p-3 rounded shadow-sm border">
            <a href="?rota=orcamentos&mes=<?= $mesAnterior->format('m') ?>&ano=<?= $mesAnterior->format('Y') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-chevron-left"></i></a>
            <h5 class="m-0 mx-4 text-capitalize fw-bold text-secondary"><?= $meses[(int)$mes] ?> de <?= $ano ?></h5>
            <a href="?rota=orcamentos&mes=<?= $mesProximo->format('m') ?>&ano=<?= $mesProximo->format('Y') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-chevron-right"></i></a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <?php if(empty($orcamentos)): ?>
                    <p class="text-center text-muted m-0 py-4">Nenhum orçamento definido para este mês.</p>
                <?php else: ?>
                    <?php foreach($orcamentos as $orc): 
                        $gasto = $orc['gasto_real'] ?? 0;
                        $percent = $orc['valor_orcado'] > 0 ? ($gasto / $orc['valor_orcado']) * 100 : 0;
                        $cor = $percent > 100 ? 'bg-danger' : ($percent > 80 ? 'bg-warning' : 'bg-success');
                        $restante = $orc['valor_orcado'] - $gasto;
                    ?>
                    <div class="mb-4 p-3 bg-light rounded">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-bold h5 m-0"><i class="fas <?= $orc['icone'] ?? 'fa-tag' ?> me-2"></i><?= htmlspecialchars($orc['categoria_nome']) ?></span>
                            <a href="?rota=excluir_orcamento&id=<?= $orc['id'] ?>" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Excluir este orçamento?')"><i class="fas fa-trash"></i></a>
                        </div>
                        <div class="d-flex justify-content-between mb-1 small">
                            <span class="fw-bold">R$ <?= number_format($gasto, 2, ',', '.') ?></span>
                            <span class="text-muted">/ R$ <?= number_format($orc['valor_orcado'], 2, ',', '.') ?></span>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar <?= $cor ?>" role="progressbar" style="width: <?= min(100, $percent) ?>%;"></div>
                        </div>
                        <div class="text-end mt-1">
                            <small class="text-muted">Restam: R$ <?= number_format($restante, 2, ',', '.') ?></small>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalOrcamento" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Novo Orçamento</h5></div>
            <form action="index.php?rota=salvar_orcamento" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Mês/Ano</label>
                        <input type="month" name="mes_ano" class="form-control" value="<?= $ano ?>-<?= $mes ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Categoria (Despesas)</label>
                        <select name="categoria_id" class="form-select" required>
                            <option value="">Selecione...</option>
                            <?php foreach($categorias as $cat): ?>
                                <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['nome']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3"><label>Valor Orçado (R$)</label><input type="number" step="0.01" name="valor" class="form-control" required></div>
                </div>
                <div class="modal-footer"><button class="btn btn-warning text-dark">Definir</button></div>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../views/layouts/footer.php'; ?>