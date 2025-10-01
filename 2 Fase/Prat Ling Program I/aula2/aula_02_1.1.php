<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo 1</title>
</head>
<body>
    <?php
    $idade = 23;
    $nome = "Cristyan";
    echo "Idade " . $idade . "<br>";
    echo "Nome: " . $nome. "<br>";

    //Soma
    $num1 = 10;
    $num2 = 20;
    $result = $num1 + $num2;
    echo "A soma de " . $num1 . " com ". $num2 . " é: " . $result ."<br>";

      //subtração
    $num3 = 30;
    $num4 = 15;
    $result2 = $num3 - $num4;
    echo "A subtração de " . $num3 . " com ". $num4 . " é: " . $result2 ."<br>";

      //mult
    $num5 = 2;
    $num6 = 3;
    $result3 = $num5 * $num6;
    echo "A multiplicação de " . $num5 . " com ". $num6 . " é: " . $result3 ."<br>";

      //div
    $num7 = 50;
    $num8 = 2;
    $result4 = $num7 / $num8;
    echo "A divisão de " . $num7 . " com ". $num8 . " é: " . $result4 ."<br>";
    ?>
</body>
</html>