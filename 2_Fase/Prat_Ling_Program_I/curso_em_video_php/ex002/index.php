<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timezone</title>
</head>
<body>
    <h1>Exemplo</h1>
    <?php 
        date_default_timezone_set("America/Sao_Paulo");
        echo("Hoje é dia: " . date("d/M/Y"));
        echo ( " e já são: " . date("G:i:s")) // G.i.s T
    ?>
    
</body>
</html>