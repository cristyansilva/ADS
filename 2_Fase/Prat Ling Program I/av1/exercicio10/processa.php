<?php
    require_once '../includes/auth.php';
    $mes = $_POST['mes'] ?? 0;
    
    setcookie('ex10_ultimo', $mes, time() + 60);

    $mes_nome = '';
    $class = '';
    switch ($mes) {
        case 1: $mes_nome = "Janeiro"; $class = "alert-info"; break;
        case 2: $mes_nome = "Fevereiro"; $class = "alert-info"; break;
        case 3: $mes_nome = "Março"; $class = "alert-info"; break;
        case 4: $mes_nome = "Abril"; $class = "alert-info"; break;
        case 5: $mes_nome = "Maio"; $class = "alert-info"; break;
        case 6: $mes_nome = "Junho"; $class = "alert-info"; break;
        case 7: $mes_nome = "Julho"; $class = "alert-info"; break;
        case 8: $mes_nome = "Agosto"; $class = "alert-info"; break;
        case 9: $mes_nome = "Setembro"; $class = "alert-info"; break;
        case 10: $mes_nome = "Outubro"; $class = "alert-info"; break;
        case 11: $mes_nome = "Novembro"; $class = "alert-info"; break;
        case 12: $mes_nome = "Dezembro"; $class = "alert-info"; break;
        default: $mes_nome = "Não existe mês com este número."; $class = "alert-danger"; break;
    }
?>
<?php require_once '../includes/header.php'; ?>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Resultado</h1>
            <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="alert <?php echo $class; ?>" role="alert">
                    <?php echo htmlspecialchars($mes_nome); ?>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <a href="index.php" class="btn btn-outline-primary">Tentar Novamente</a>
        </div>
    </div>
<?php require_once '../includes/footer.php'; ?>