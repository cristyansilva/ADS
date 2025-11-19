<?php include __DIR__ . '/../../views/layouts/header.php'; ?>

<div class="wrapper">
    
    <?php include __DIR__ . '/../../views/layouts/sidebar.php'; ?>

    <div id="content">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Relatórios Financeiros</h2>
                <p class="text-muted">Análise detalhada da sua evolução patrimonial.</p>
            </div>
            <div class="d-flex gap-2">
                <form action="index.php" method="GET" class="d-flex gap-2">
                    <input type="hidden" name="rota" value="relatorios">
                    <select name="periodo" class="form-select" onchange="this.form.submit()">
                        <option value="3" <?= ($periodo == 3) ? 'selected' : '' ?>>Últimos 3 meses</option>
                        <option value="6" <?= ($periodo == 6) ? 'selected' : '' ?>>Últimos 6 meses</option>
                        <option value="12" <?= ($periodo == 12) ? 'selected' : '' ?>>Último ano</option>
                    </select>
                </form>
                <a href="index.php?rota=exportar_csv" class="btn btn-outline-success">
                    <i class="fas fa-file-csv me-2"></i> Exportar CSV
                </a>
            </div>
        </div>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white fw-bold">Evolução Mensal (Receitas vs Despesas)</div>
            <div class="card-body">
                <div style="height: 300px;">
                    <canvas id="chartEvolucao"></canvas>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-white fw-bold">Saldo Atual por Conta</div>
                    <div class="card-body">
                        <canvas id="chartContas"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm border-0 bg-light h-100">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-4">Resumo do Período</h5>
                        
                        <div class="d-flex justify-content-between mb-3 border-bottom pb-2">
                            <span>Total Recebido:</span>
                            <span class="text-success fw-bold">R$ <?= number_format(array_sum($receitas), 2, ',', '.') ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-3 border-bottom pb-2">
                            <span>Total Gasto:</span>
                            <span class="text-danger fw-bold">R$ <?= number_format(array_sum($despesas), 2, ',', '.') ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Resultado Líquido:</span>
                            <span class="fw-bold <?= (array_sum($saldos) >= 0) ? 'text-primary' : 'text-warning' ?>">
                                R$ <?= number_format(array_sum($saldos), 2, ',', '.') ?>
                            </span>
                        </div>
                        
                        <div class="alert alert-info mt-4 small">
                            <i class="fas fa-info-circle me-1"></i> Dica: Se o resultado líquido for positivo frequentemente, considere criar uma nova Meta de investimento.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctxEvolucao = document.getElementById('chartEvolucao');
        if (ctxEvolucao) {
            new Chart(ctxEvolucao, {
                type: 'line',
                data: {
                    labels: <?= json_encode($labels) ?>,
                    datasets: [
                        {
                            label: 'Receitas',
                            data: <?= json_encode($receitas) ?>,
                            borderColor: '#198754', // Verde
                            backgroundColor: 'rgba(25, 135, 84, 0.1)',
                            tension: 0.3,
                            fill: true
                        },
                        {
                            label: 'Despesas',
                            data: <?= json_encode($despesas) ?>,
                            borderColor: '#dc3545', // Vermelho
                            backgroundColor: 'rgba(220, 53, 69, 0.1)',
                            tension: 0.3,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                        }
                    },
                    interaction: {
                        mode: 'nearest',
                        axis: 'x',
                        intersect: false
                    }
                }
            });
        }

        const ctxContas = document.getElementById('chartContas');
        if (ctxContas) {
            new Chart(ctxContas, {
                type: 'bar',
                data: {
                    labels: <?= json_encode($contasLabels) ?>,
                    datasets: [{
                        label: 'Saldo Atual',
                        data: <?= json_encode($contasValores) ?>,
                        backgroundColor: [
                            '#0d6efd', '#6610f2', '#6f42c1', '#d63384', '#fd7e14', '#20c997'
                        ],
                        borderRadius: 4
                    }]
                },
                options: {
                    indexAxis: 'y', 
                    responsive: true,
                    plugins: { legend: { display: false } }
                }
            });
        }
    });
</script>

<?php include __DIR__ . '/../../views/layouts/footer.php'; ?>