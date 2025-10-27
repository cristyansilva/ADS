<?php
require_once 'Usuario.php';

class Admin extends Usuario {
    private $nivelAcesso;

    public function __construct($nome, $email, $nivel) {
        parent::__construct($nome, $email);
        $this->nivelAcesso = $nivel;
    }

    public function getNivelAcesso() {
        return $this->nivelAcesso;
    }

    public function saudacao() {
        return "Olá, eu sou um ADMIN com nível {$this->nivelAcesso}!";
    }
}
?>