<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Veículos</title>
    <style>
        body { font-family: sans-serif; background-color: #f0f2f5; margin: 0; padding: 20px; }
        .container { max-width: 800px; margin: 20px auto; background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1, h2 { color: #333; text-align: center; }
        .forms-wrapper { display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; }
        
        form { 
            border: 1px solid #ddd; 
            padding: 20px; 
            border-radius: 8px; 
            width: 220px;
            box-sizing: border-box;
        }

        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #0056b3; }
        .resultado { margin-top: 30px; padding: 20px; background-color: #e9f7ef; border-left: 5px solid #28a745; border-radius: 5px; font-size: 1.1em; text-align: center; }
    </style>
</head>
<body>

<div class="container">
    <h1>Sistema de Veículos com Herança e Polimorfismo</h1>
    <div class="forms-wrapper">
        <form method="POST">
            <h2>Criar Carro</h2>
            <input type="hidden" name="tipo" value="carro">
            <label for="marca_carro">Marca:</label>
            <input type="text" name="marca" id="marca_carro" required value="Fiat">
            <label for="modelo_carro">Modelo:</label>
            <input type="text" name="modelo" id="modelo_carro" required value="Uno">
            <label for="portas">Portas:</label>
            <input type="number" name="portas" id="portas" required value="4">
            <button type="submit">Criar Carro</button>
        </form>

        <form method="POST">
            <h2>Criar Moto</h2>
            <input type="hidden" name="tipo" value="moto">
            <label for="marca_moto">Marca:</label>
            <input type="text" name="marca" id="marca_moto" required value="Honda">
            <label for="modelo_moto">Modelo:</label>
            <input type="text" name="modelo" id="modelo_moto" required value="Biz">
            <label for="cilindradas">Cilindradas:</label>
            <input type="number" name="cilindradas" id="cilindradas" required value="125">
            <button type="submit">Criar Moto</button>
        </form>
        
        <form method="POST">
            <h2>Criar Caminhão</h2>
            <input type="hidden" name="tipo" value="caminhao">
            <label for="marca_caminhao">Marca:</label>
            <input type="text" name="marca" id="marca_caminhao" required value="Scania">
            <label for="modelo_caminhao">Modelo:</label>
            <input type="text" name="modelo" id="modelo_caminhao" required value="R450">
            <label for="capacidade">Carga (Ton):</label>
            <input type="number" name="capacidadeCarga" id="capacidade" step="0.1" required value="25">
            <button type="submit">Criar Caminhão</button>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once 'veiculo.php';
        require_once 'carro.php';
        require_once 'moto.php';
        require_once 'caminhao.php';

        $tipo = $_POST['tipo'] ?? '';
        $marca = htmlspecialchars($_POST['marca'] ?? '');
        $modelo = htmlspecialchars($_POST['modelo'] ?? '');
        $veiculo = null;

        if ($tipo === 'carro') {
            $portas = (int)($_POST['portas'] ?? 0);
            $veiculo = new Carro($marca, $modelo, $portas);
        } elseif ($tipo === 'moto') {
            $cilindradas = (int)($_POST['cilindradas'] ?? 0);
            $veiculo = new Moto($marca, $modelo, $cilindradas);
        } elseif ($tipo === 'caminhao') {
            $capacidade = (float)($_POST['capacidadeCarga'] ?? 0);
            $veiculo = new Caminhao($marca, $modelo, $capacidade);
        }

        if ($veiculo) {
            echo '<div class="resultado">';
            echo '<strong>Informações do Veículo Criado:</strong><br>';
            echo $veiculo->info();
            echo '</div>';
        }
    }
    ?>
</div>

</body>
</html>