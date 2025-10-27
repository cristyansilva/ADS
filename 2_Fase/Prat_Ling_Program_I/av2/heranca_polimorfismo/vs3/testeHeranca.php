<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultado – Herança e Polimorfismo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 40px 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 {
            color: #27ae60;
        }
        .saudacao {
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
            background: #e8f5e9;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .dados {
            text-align: left;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            color: #3498db;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>✅ Administrador Criado com Sucesso!</h1>

    <?php
    // Inclui as classes
    require_once 'Usuario.php';
    require_once 'Admin.php';

    // Recebe os dados do formulário
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $nivel = (int)($_POST['nivel'] ?? 0);

    // Validação simples
    if (empty($nome) || empty($email) || $nivel < 1 || $nivel > 10) {
        echo "<p style='color: red;'>❌ Dados inválidos. Volte e preencha corretamente.</p>";
        echo '<a href="formulario.html">← Voltar ao formulário</a>';
        exit;
    }

    // Cria o objeto Admin (herança em ação!)
    $admin = new Admin($nome, $email, $nivel);
    ?>

    <div class="saudacao">
        <?= htmlspecialchars($admin->saudacao()) ?>
    </div>

    <div class="dados">
        <p><strong>Nome:</strong> <?= htmlspecialchars($admin->getNome()) ?></p>
        <p><strong>E-mail:</strong> <?= htmlspecialchars($admin->getEmail()) ?></p>
        <p><strong>Nível de acesso:</strong> <?= $admin->getNivelAcesso() ?></p>
    </div>

    <p>🎯 Isso é <strong>polimorfismo</strong>: o método <code>saudacao()</code> se comporta de forma diferente na classe <code>Admin</code>, mesmo herdando de <code>Usuario</code>.</p>

    <a href="formulario.html">← Cadastrar outro administrador</a>
</div>

</body>
</html>