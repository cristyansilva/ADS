<?php
class Usuario {
    protected $nome;
    protected $email;

    public function __construct($nome, $email) {
        $this->nome = $nome;
        $this->email = $email;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    // Método comum a todos os usuários
    public function saudacao() {
        return "Olá, eu sou um usuário comum.";
    }
}
?>