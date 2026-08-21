<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 1</title>
</head>
<body>

<main>
    <h1>Resultado Final</h1>
    <p>
        <?php
        $num = $_REQUEST["num"] ?? 0;
        $antecessor = $num -1;
        $sucessor = $num +1;
        echo "O numero escolhido foi $num<br>";
        echo "O antecessor é $antecessor<br>";
        echo "O sucessor é $sucessor<br>";        
        ?>
    </p>
    <input type="submit"value="Gerar outro">
</main>
    
</body>
</html>