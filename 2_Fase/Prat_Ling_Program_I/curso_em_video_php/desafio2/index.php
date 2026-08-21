<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <main>
        <h1>trabalhando com numeros aleatorios</h1>
        <p>
            <?php
            $min= 0;
            $max = 100;
                $num = rand($min, $max);
                echo "Gerando um numero aleatorio entre $min e $max...\n";
                echo "O numero gerado foi $num";
            ?>
        </p>
        <button onclick="javascript:document.location.reload()">&#x1F504; De novo</button>
    </main>
    
</body>
</html>