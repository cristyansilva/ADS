<?php
session_start();

$usuario_valido = 'admin';
$senha_valida = '1234'; 

$erro = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_digitado = $_POST['usuario'] ?? '';
    $senha_digitada = $_POST['senha'] ?? '';

    if ($usuario_digitado === $usuario_valido && $senha_digitada === $senha_valida) {
        $_SESSION['usuario'] = $usuario_digitado;
        header("Location: index.php");
        exit;
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4" style="width: 22rem;">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Login</h1>
                
                <?php if (!empty($erro)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($erro); ?>
                    </div>
                <?php endif; ?>

                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Nome de Usuário</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>