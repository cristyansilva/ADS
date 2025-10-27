<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Funcionários</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f8f9fa; }
        h1 { color: #2c3e50; }
        .btn { display: inline-block; padding: 8px 15px; margin: 5px 0; text-decoration: none; border-radius: 4px; }
        .btn-primary { background: #007bff; color: white; }
        .btn-danger { background: #dc3545; color: white; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #f1f3f5; }
        .msg { padding: 12px; margin: 15px 0; border-radius: 5px; }
        .msg-success { background: #d4edda; color: #155724; }
    </style>
</head>
<body>
<h1>👥 Gerenciamento de Funcionários</h1>
<a href="index.php?acao=criar" class="btn btn-primary">+ Novo Funcionário</a>

<?php
if (isset($_GET['msg'])) {
    $mensagens = [
        'criado' => '✅ Funcionário cadastrado com sucesso!',
        'excluido' => '🗑️ Funcionário excluído com sucesso!'
    ];
    if (isset($mensagens[$_GET['msg']])) {
        echo '<div class="msg msg-success">' . $mensagens[$_GET['msg']] . '</div>';
    }
}
?>

<?php if ($funcionarios && $funcionarios->rowCount() > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cargo</th>
                <th>Detalhe Específico</th>
                <th>Salário Final</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($f = $funcionarios->fetch(PDO::FETCH_ASSOC)): ?>
            <?php
                $obj = null;
                if ($f['tipo'] === 'gerente') {
                    $obj = new Gerente($this->db);
                    $obj->bonus_gerencia = $f['bonus_gerencia'];
                    $detalhe = 'Bônus: R$ ' . number_format($f['bonus_gerencia'], 2, ',', '.');
                } else if ($f['tipo'] === 'programador') {
                    $obj = new Programador($this->db);
                    $obj->linguagem_principal = $f['linguagem_principal'];
                    $detalhe = 'Linguagem: ' . htmlspecialchars($f['linguagem_principal']);
                }
                $obj->salario_base = $f['salario_base'];
            ?>
            <tr>
                <td><?= htmlspecialchars($f['nome']) ?></td>
                <td><?= ucfirst($f['tipo']) ?></td>
                <td><?= $detalhe ?></td>
                <td><b>R$ <?= number_format($obj->calcularSalarioFinal(), 2, ',', '.') ?></b></td>
                <td>
                    <a href="index.php?acao=excluir&id=<?= $f['id'] ?>" class="btn btn-danger" onclick="return confirm('Tem certeza?')">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Nenhum funcionário cadastrado ainda.</p>
<?php endif; ?>

</body>
</html>