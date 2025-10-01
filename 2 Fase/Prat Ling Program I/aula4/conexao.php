<?php
$servidor = "localhost";
$usuario  = "root";
$senha    = "";
$dbname   = "aula_php";

$conn = new mysqli($servidor, $usuario, $senha, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
