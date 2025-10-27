<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Teste de Herança e Polimorfismo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; line-height: 1.6; }
        .resultado {
            background-color: #f0f8ff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        h1 { color: #2c3e50; }
        code { background: #eee; padding: 2px 6px; border-radius: 3px; }
    </style>
</head>
<body>

<h1>🧪 Teste de Herança e Polimorfismo</h1>

<?php
require_once 'Usuario.php';
require_once 'Admin.php';

// Criando os objetos
$usuarioComum = new Usuario("Ana", "ana@email.com");
$admin = new Admin("Carlos", "carlos@admin.com", 5);
?>

<div class="resultado">
    <h2>Usuário Comum</h2>
    <p><strong>Saudação:</strong> <?= htmlspecialchars($usuarioComum->saudacao()) ?></p>
    <p><strong>Nome:</strong> <?= htmlspecialchars($usuarioComum->getNome()) ?></p>
    <p><strong>E-mail:</strong> <?= htmlspecialchars($usuarioComum->getEmail()) ?></p>
</div>

<div class="resultado">
    <h2>Administrador</h2>
    <p><strong>Saudação:</strong> <?= htmlspecialchars($admin->saudacao()) ?></p>
    <p><strong>Nome (herdado):</strong> <?= htmlspecialchars($admin->getNome()) ?></p>
    <p><strong>Nível de acesso:</strong> <?= $admin->getNivelAcesso() ?></p>
</div>

<h2>O que isso demonstra?</h2>
<ul>
    <li>✅ <code>Admin</code> <strong>herda</strong> os atributos e métodos de <code>Usuario</code>.</li>
    <li>✅ O método <code>saudacao()</code> tem <strong>comportamentos diferentes</strong> → isso é <strong>polimorfismo</strong>.</li>
    <li>✅ O construtor do <code>Admin</code> usa <code>parent::__construct()</code> para inicializar os dados da classe pai.</li>
    <li>✅ Atributos <code>protected</code> permitem acesso nas subclasses, mas não de fora.</li>
</ul>

</body>
</html>