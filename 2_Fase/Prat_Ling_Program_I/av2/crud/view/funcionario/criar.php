<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Funcionário</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        form { max-width: 600px; background: #f0f8ff; padding: 20px; border-radius: 8px; }
        label, select, input { display: block; width: 100%; margin-top: 10px; padding: 8px; box-sizing: border-box; }
        button { margin-top: 20px; padding: 10px 20px; background: #007bff; color: white; border: none; cursor: pointer; }
        a { margin-left: 15px; }
        .campo-extra { display: none; margin-top: 10px; padding: 10px; background-color: #e9ecef; border-radius: 4px; }
    </style>
</head>
<body>

<h1>➕ Cadastrar Novo Funcionário</h1>

<form method="POST">
    <label for="tipo">Tipo de Funcionário:</label>
    <select name="tipo" id="tipo" required onchange="mostrarCamposExtras()">
        <option value="">-- Selecione o tipo --</option>
        <option value="gerente">Gerente</option>
        <option value="programador">Programador</option>
    </select>

    <label>Nome:</label>
    <input type="text" name="nome" required>
    
    <label>Salário Base (R$):</label>
    <input type="number" name="salario_base" step="0.01" required>

    <div id="campo-gerente" class="campo-extra">
        <label>Bônus de Gerência (R$):</label>
        <input type="number" name="bonus_gerencia" step="0.01">
    </div>

    <div id="campo-programador" class="campo-extra">
        <label>Linguagem Principal:</label>
        <input type="text" name="linguagem_principal">
    </div>

    <button type="submit">Salvar Funcionário</button>
    <a href="index.php?acao=listar">← Voltar para Lista</a>
</form>

<script>
function mostrarCamposExtras() {
    document.getElementById('campo-gerente').style.display = 'none';
    document.getElementById('campo-programador').style.display = 'none';

    const tipo = document.getElementById('tipo').value;
    if (tipo === 'gerente') {
        document.getElementById('campo-gerente').style.display = 'block';
    } else if (tipo === 'programador') {
        document.getElementById('campo-programador').style.display = 'block';
    }
}
</script>

</body>
</html>