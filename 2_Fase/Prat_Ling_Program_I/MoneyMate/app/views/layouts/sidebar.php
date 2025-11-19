<?php
$rota = $_GET['rota'] ?? 'dashboard';
$inicial = strtoupper(substr($_SESSION['nome'] ?? 'U', 0, 1));
?>

<nav id="sidebar">
    <div class="d-flex align-items-center p-4 mb-2">
        <div class="bg-success text-white rounded p-1 me-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
            <i class="fas fa-wallet"></i>
        </div>
        <h5 class="m-0 fw-bold text-dark">MoneyMate</h5>
    </div>

    <div class="flex-grow-1 overflow-auto">
        <ul class="nav flex-column">
            
            <li class="nav-item">
                <a class="nav-link <?= $rota == 'dashboard' ? 'active' : '' ?>" href="index.php?rota=dashboard">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link <?= $rota == 'contas' ? 'active' : '' ?>" href="index.php?rota=contas">
                    <i class="fas fa-wallet"></i> Contas
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link <?= $rota == 'transacoes' ? 'active' : '' ?>" href="index.php?rota=transacoes">
                    <i class="fas fa-exchange-alt"></i> Transações
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link <?= $rota == 'categorias' ? 'active' : '' ?>" href="index.php?rota=categorias">
                    <i class="fas fa-tags"></i> Categorias
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link <?= $rota == 'orcamentos' ? 'active' : '' ?>" href="index.php?rota=orcamentos">
                    <i class="fas fa-chart-pie"></i> Orçamentos
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= $rota == 'metas' ? 'active' : '' ?>" href="index.php?rota=metas">
                    <i class="fas fa-bullseye"></i> Metas
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link <?= $rota == 'relatorios' ? 'active' : '' ?>" href="index.php?rota=relatorios">
                    <i class="fas fa-chart-bar"></i> Relatórios
                </a>
            </li>
            
        </ul>
    </div>

    <div class="border-top p-3">
        <div class="d-flex align-items-center">
            <div class="avatar-circle me-3">
                <?= $inicial ?>
            </div>
            <div class="flex-grow-1 overflow-hidden">
                <p class="m-0 fw-bold text-dark text-truncate"><?= $_SESSION['nome'] ?? 'Usuário' ?></p>
                <small class="text-muted">Online</small>
            </div>
            <a href="index.php?rota=logout" class="btn btn-light btn-sm text-secondary" title="Sair">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>
</nav>