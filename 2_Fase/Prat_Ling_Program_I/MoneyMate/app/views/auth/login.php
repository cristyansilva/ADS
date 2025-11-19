<?php include __DIR__ . '/../layouts/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="text-center mb-4">Login</h3>
                    <?php if (isset($_GET['erro']) && $_GET['erro'] == 1): ?>
                        <div class="alert alert-danger" role="alert">
                            Usuário ou senha inválidos.
                        </div>
                    <?php endif; ?>
                    <form action="index.php?rota=logar" method="POST">
                        <div class="mb-3">
                            <input type="text" name="login_identificador" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                        </div>
                        <button class="btn btn-primary w-100">Entrar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/../layouts/footer.php'; ?>