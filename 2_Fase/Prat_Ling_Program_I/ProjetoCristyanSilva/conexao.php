<?php
$servidor = "localhost"; 
$usuario = "root";       
$senha = "";             
$banco = "cadastro_cursos";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
}

$conexao->set_charset("utf8");
?>