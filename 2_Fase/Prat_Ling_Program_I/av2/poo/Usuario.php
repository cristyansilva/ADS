<?php

class Usuario
{
    // Atributos com visibilidade definida
    public $nome;
    public $cpf;
    private $endereco; // Atributo privado para proteger a informação

    public function __construct($nome, $cpf, $endereco)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->endereco = $endereco; 
    }

    public function getEndereco()
    {
        return $this->endereco;
    }
}