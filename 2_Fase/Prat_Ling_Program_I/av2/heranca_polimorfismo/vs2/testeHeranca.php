<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Herança e Polimorfismo – Versão Interativa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .resultado {
            background-color: #e7f3ff;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #007BFF;
        }
        .destaque {
            font-weight: bold;
            color: #2980b9;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>👥 Herança e Polimorfismo em Ação</h1>

    <!-- Formulário para criar um Admin -->
    <form method="POST">
        <label for="nome">Nome do Administrador:</label>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($_POST['nome'] ?? 'Carlos') ?>" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? 'carlos@admin.com') ?>" required>

        <label for="nivel">Nível de Acesso (1 a 10):</label>
        <input type="number" id="nivel" name="nivel" min="1" max="10" value="<?= $_POST['nivel'] ?? 5 ?>" required>

        <button type="submit">Criar Administrador e Ver Saudação</button>
    </form>

    <?php if ($_POST): ?>
        <?php
        require_once 'Usuario.php';
        require_once 'Admin.php';

        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $nivel = (int)$_POST['nivel'];

        // Validar rapidamente
        if ($nome && $email && $nivel >= 1 && $nivel <= 10) {
            $admin = new Admin($nome, $email, $nivel);
        } else {
            echo '<div class="resultado" style="background:#ffeaea; border-left-color:#e74c3c;">';
            echo '<p style="color:#c0392b;">⚠️ Por favor, preencha todos os campos corretamente.</p>';
            echo '</div>';
            return;
        }
        ?>

        <div class="resultado">
            <h2>Resultado da Criação do Objeto</h2>
            <p><span class="destaque">Nome:</span> <?= htmlspecialchars($admin->getNome()) ?></p>
            <p><span class="destaque">E-mail:</span> <?= htmlspecialchars($admin->getEmail()) ?></p>
            <p><span class="destaque">Nível de Acesso:</span> <?= $admin->getNivelAcesso() ?></p>
            <p><span class="destaque">Saudação (Polimorfismo em ação!):</span><br>
               <strong><?= htmlspecialchars($admin->saudacao()) ?></strong></p>
            <p>✅ Este objeto é uma instância de <code>Admin</code>, que herda de <code>Usuario</code>.</p>
        </div>
    <?php endif; ?>

    <hr style="margin: 30px 0; border: 0; border-top: 1px solid #ddd;">

    <h3>💡 Como isso demonstra Herança e Polimorfismo?</h3>
    <ul>
        <li><strong>Herança</strong>: <code>Admin</code> herda <code>$nome</code>, <code>$email</code> e os métodos <code>getNome()</code>, <code>getEmail()</code> da classe <code>Usuario</code>.</li>
        <li><strong>Polimorfismo</strong>: O método <code>saudacao()</code> foi <em>sobrescrito</em> na classe <code>Admin</code>, então ele se comporta de forma diferente mesmo tendo o mesmo nome.</li>
        <li><strong>parent::__construct()</strong> foi usado para reutilizar a lógica de inicialização da classe pai.</li>
    </ul>
</div>

</body>
</html>