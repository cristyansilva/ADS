<?php

require_once 'Usuario.php';

echo "<h1>Exibindo dados a partir de mostraUsuario.php</h1>";

$usuario1 = new Usuario(
    "Cristyan Silva",
    "111.222.333-44",
    "rua x , 789, Centro"
);

echo "<p><strong>Nome:</strong> " . $usuario1->nome . "</p>"; 
echo "<p><strong>CPF:</strong> " . $usuario1->cpf . "</p>";   
echo "<p><strong>Endereço:</strong> " . $usuario1->getEndereco() . "</p>";

