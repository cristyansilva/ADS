<?php include __DIR__ . '/../../views/layouts/header.php'; ?>

<div class="wrapper">
    <?php include __DIR__ . '/../../views/layouts/sidebar.php'; ?>
    <div id="content">

        <?php
        $dataAtual = DateTime::createFromFormat('!m-Y', "$mes-$ano");
        $mesAnterior = (clone $dataAtual)->modify('-1 month');
        $mesProximo = (clone $dataAtual)->modify('+1 month');
        $meses = [1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril', 5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto', 9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'];
        ?>

        <!-- 2. NAVEGADOR DE MÊS -->
        <div class="d-flex justify-content-between align-items-center mb-4 bg-white p-3 rounded shadow-sm border">
            <a href="?rota=dashboard&mes=<?= $mesAnterior->format('m') ?>&ano=<?= $mesAnterior->format('Y') ?>" class="btn btn-outline-secondary btn-sm" title="Mês Anterior">
                <i class="fas fa-chevron-left"></i>
            </a>
            <h4 class="m-0 text-capitalize fw-bold text-secondary">
                <i class="far fa-calendar-alt me-2 text-primary"></i><?= $meses[(int)$mes] ?> de <?= $ano ?>
            </h4>
            <a href="?rota=dashboard&mes=<?= $mesProximo->format('m') ?>&ano=<?= $mesProximo->format('Y') ?>" class="btn btn-outline-secondary btn-sm" title="Próximo Mês">
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>

        <div class="mb-3 d-flex flex-wrap gap-2">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTransacao"><i class="fas fa-plus"></i> Nova Transação</button>
        </div>

        <div class="row">
            <!-- 4. COLUNA DA ESQUERDA (Cards e Tabela) -->
            <div class="col-lg-7">

                <!-- Cards de Resumo do Mês -->
                <div class="row mb-4">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card text-white bg-success h-100 shadow-sm border-0">
                            <div class="card-body text-center">
                                <small class="opacity-75">Receitas</small>
                                <h3 class="fw-bold mt-1">R$ <?= number_format($resumo['receita'], 2, ',', '.') ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card text-white bg-danger h-100 shadow-sm border-0">
                            <div class="card-body text-center">
                                <small class="opacity-75">Despesas</small>
                                <h3 class="fw-bold mt-1">R$ <?= number_format($resumo['despesa'], 2, ',', '.') ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white <?= $resumo['saldo'] >= 0 ? 'bg-primary' : 'bg-warning text-dark' ?> h-100 shadow-sm border-0">
                            <div class="card-body text-center">
                                <small class="opacity-75">Saldo do Mês</small>
                                <h3 class="fw-bold mt-1">R$ <?= number_format($resumo['saldo'], 2, ',', '.') ?></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabela de Transações -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white fw-bold border-bottom">Extrato Detalhado do Mês</div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Dia</th>
                                        <th>Descrição</th>
                                        <th>Categoria</th>
                                        <th class="text-nowrap">Valor</th>
                                        <th>Anexo</th>
                                        <th class="text-end">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($transacoes)): ?>
                                        <tr>
                                            <td colspan="6" class="text-center py-5 text-muted">Nenhuma movimentação neste mês.</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($transacoes as $t): ?>
                                            <tr>
                                                <td><?= date('d', strtotime($t['data_transacao'])) ?></td>
                                                <td>
                                                    <div class="fw-bold text-dark"><?= htmlspecialchars($t['descricao']) ?></div>
                                                    <small class="text-muted"><i class="fas fa-wallet me-1"></i><?= htmlspecialchars($t['conta_nome']) ?></small>
                                                </td>
                                                <td>
                                                    <?php if (!empty($t['categoria_nome'])): ?>
                                                        <span class="badge bg-light text-dark border"><i class="fas fa-tag me-1"></i><?= htmlspecialchars($t['categoria_nome']) ?></span>
                                                    <?php else: ?>
                                                        <span class="badge bg-light text-muted border">Geral</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="<?= $t['tipo'] == 'receita' ? 'text-success' : 'text-danger' ?> fw-bold text-nowrap">
                                                    <?= $t['tipo'] == 'despesa' ? '-' : '+' ?> R$ <?= number_format($t['valor'], 2, ',', '.') ?>
                                                <td class="text-center">
                                                    <?php if (!empty($t['comprovante'])): ?>

                                                        <a href="index.php?rota=visualizar_arquivo&nome=<?= $t['comprovante'] ?>"
                                                            target="_blank"
                                                            class="btn btn-sm btn-light text-secondary border"
                                                            title="Ver Comprovante (<?= $t['comprovante'] ?>)">
                                                            <i class="fas fa-paperclip"></i>
                                                        </a>

                                                    <?php else: ?>
                                                        <span class="text-muted">-</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-end">
                                                    <a href="?rota=excluir_transacao&id=<?= $t['id'] ?>&mes=<?= $mes ?>&ano=<?= $ano ?>" onclick="return confirm('Tem certeza que deseja excluir? O saldo será estornado.')" class="btn btn-sm btn-outline-danger border-0" title="Excluir">
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

            <!-- 5. COLUNA DA DIREITA (Gráfico, Orçamentos, Metas) -->
            <div class="col-lg-5 mt-4 mt-lg-0">

                <!-- Gráfico de Despesas -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white fw-bold">Despesas por Categoria</div>
                    <div class="card-body">
                        <canvas id="graficoCategoria"></canvas>
                        <div id="msgGraficoVazio" class="text-center text-muted my-4 small" style="display: none;">
                            Sem despesas categorizadas neste mês.
                        </div>
                    </div>
                </div>

                <!-- Widget de Orçamentos -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white fw-bold d-flex justify-content-between align-items-center">
                        Orçamentos do Mês
                        <a href="index.php?rota=orcamentos" class="btn btn-sm btn-outline-secondary border-0">Ver todos</a>
                    </div>
                    <div class="card-body">
                        <?php if (empty($orcamentos)): ?>
                            <p class="text-center text-muted small m-0">Nenhum orçamento definido para este mês.</p>
                        <?php else: ?>
                            <?php foreach (array_slice($orcamentos, 0, 3) as $orc): // Limita a 3
                                $gasto = $orc['gasto_real'] ?? 0;
                                $percent = $orc['valor_orcado'] > 0 ? ($gasto / $orc['valor_orcado']) * 100 : 0;
                                $cor = $percent > 90 ? 'bg-danger' : ($percent > 70 ? 'bg-warning' : 'bg-success');
                            ?>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1 small">
                                        <span class="fw-bold"><i class="fas fa-tag me-1"></i><?= htmlspecialchars($orc['categoria_nome']) ?></span>
                                        <span class="text-muted">R$ <?= number_format($gasto, 0, ',', '.') ?> / R$ <?= number_format($orc['valor_orcado'], 0, ',', '.') ?></span>
                                    </div>
                                    <div class="progress" style="height: 12px;" title="<?= number_format($percent, 1) ?>%">
                                        <div class="progress-bar <?= $cor ?>" role="progressbar" style="width: <?= min(100, $percent) ?>%;"></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Widget de Metas -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white fw-bold d-flex justify-content-between align-items-center">
                        Metas de Economia
                        <a href="index.php?rota=metas" class="btn btn-sm btn-outline-secondary border-0">Ver todas</a>
                    </div>
                    <div class="card-body">
                        <?php if (empty($metas)): ?>
                            <p class="text-center text-muted small m-0">Nenhuma meta criada.</p>
                        <?php else: ?>
                            <?php foreach (array_slice($metas, 0, 3) as $meta): // Limita a 3
                                $percent = $meta['valor_alvo'] > 0 ? ($meta['valor_atual'] / $meta['valor_alvo']) * 100 : 0;
                            ?>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1 small">
                                        <span class="fw-bold"><i class="fas fa-bullseye me-1"></i><?= htmlspecialchars($meta['nome']) ?> (<?= number_format($percent, 0) ?>%)</span>
                                        <span class="text-muted">R$ <?= number_format($meta['valor_atual'], 0, ',', '.') ?> / R$ <?= number_format($meta['valor_alvo'], 0, ',', '.') ?></span>
                                    </div>
                                    <div class="progress" style="height: 12px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?= min(100, $percent) ?>%;"></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Transação -->
<div class="modal fade" id="modalTransacao" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nova Movimentação</h5>
            </div>
            <form action="index.php?rota=salvar_transacao" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="origem" value="dashboard">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label>Conta</label>
                            <select name="conta_id" class="form-select" required>
                                <?php foreach ($contas as $c): ?>
                                    <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nome']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label>Categoria</label>
                            <select name="categoria_id" class="form-select">
                                <option value="">Selecione...</option>
                                <?php foreach ($categorias as $cat): ?>
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
                        <div class="col-6 mb-3">
                            <label>Parcelas</label>
                            <input type="number" name="parcelas" class="form-control" value="1" min="1" required>
                            <small class="text-muted">1 = À vista</small>
                        </div>
                    </div>
                    <div class="mb-3"><label>Descrição</label><input type="text" name="descricao" class="form-control" required></div>
                    <div class="mb-3"><label>Valor TOTAL</label><input type="number" step="0.01" name="valor" class="form-control" placeholder="Valor total da compra" required></div>
                    <div class="mb-3"><label>Data 1ª Parcela</label><input type="date" name="data" class="form-control" value="<?= date('Y-m-d') ?>" required></div>
                    <div class="mb-3"><label>Comprovante</label><input type="file" name="comprovante" class="form-control"></div>
                </div>
                <div class="modal-footer"><button class="btn btn-primary">Salvar</button></div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Conta -->
<div class="modal fade" id="modalConta" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nova Conta</h5>
            </div>
            <form action="index.php?rota=salvar_conta" method="POST">
                <input type="hidden" name="origem" value="dashboard">
                <div class="modal-body">
                    <div class="mb-3"><label>Nome da Conta</label><input type="text" name="nome" class="form-control" placeholder="Ex: Carteira, Nubank" required></div>
                    <div class="mb-3"><label>Saldo Inicial</label><input type="number" step="0.01" name="saldo_inicial" class="form-control" value="0.00" required></div>
                </div>
                <div class="modal-footer"><button class="btn btn-secondary">Criar Conta</button></div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Categoria -->
<div class="modal fade" id="modalCategoria" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Criar Categoria</h5>
            </div>
            <form action="index.php?rota=salvar_categoria" method="POST">
                <input type="hidden" name="origem" value="dashboard">
                <div class="modal-body">
                    <div class="mb-3"><label>Nome</label><input type="text" name="nome" class="form-control" required></div>
                    <div class="mb-3"><label>Tipo</label>
                        <select name="tipo" class="form-select">
                            <option value="despesa">Despesa</option>
                            <option value="receita">Receita</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-info text-white">Salvar</button></div>
            </form>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('graficoCategoria');
        if (!ctx) return;

        const labels = <?= json_encode($chartLabels ?? []) ?>;
        const dataValues = <?= json_encode($chartValues ?? []) ?>;

        if (labels.length > 0) {
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        data: dataValues,
                        backgroundColor: ['#dc3545', '#0d6efd', '#ffc107', '#198754', '#6610f2', '#fd7e14'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 12,
                                padding: 20
                            }
                        }
                    }
                }
            });
        } else {
            ctx.style.display = 'none';
            document.getElementById('msgGraficoVazio').style.display = 'block';
        }
    });
</script>

<?php include __DIR__ . '/../../views/layouts/footer.php'; ?>