<?php
session_start();
// Se a sessão 'usuario' não existir, redireciona para o login
if (!isset($_SESSION['usuario'])) {
    header("Location: /login.php");
    exit;
}
?>