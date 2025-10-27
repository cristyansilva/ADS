<?php

require_once 'Usuario.php';

class AcessaUsuario
{
    public function imprimeUsuario()
    {
        echo "<h1>Exibindo dados a partir do método imprimeUsuario() da classe AcessaUsuario</h1>";
        
        $usuario2 = new Usuario(
            "Ana Carolina",
            "999.888.777-66",
            "Rua Y, 45, Bairro Novo"
        );

        echo "<p><strong>Nome:</strong> " . $usuario2->nome . "</p>";
        echo "<p><strong>CPF:</strong> " . $usuario2->cpf . "</p>";
        echo "<p><strong>Endereço (via Getter):</strong> " . $usuario2->getEndereco() . "</p>";
    }
}

$acesso = new AcessaUsuario();
$acesso->imprimeUsuario();