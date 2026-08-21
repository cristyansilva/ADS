<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<main>
    <?php

    $cotacao = 5.17;
    $real = $_REQUEST["dinheiro"] ?? 0;

    $dolar = $real / $cotacao;
    $padrao = numfmt_create("pt-BR", NumberFormatter::CURRENCY);
    echo "Seus " . numfmt_format_currency($padrao, $real, "BRL").
    " equivalem a  " . numfmt_format_currency($padrao, $dolar, "USD");

    ?>
    <button onclick="javascript:history.go(-1)">Voltar</button>
</main>
    
</body>
</html>