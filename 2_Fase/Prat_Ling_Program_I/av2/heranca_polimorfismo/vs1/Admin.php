<?php
require_once 'Usuario.php';

class Admin extends Usuario {
    private $nivelAcesso;

    public function __construct($nome, $email, $nivel) {
        parent::__construct($nome, $email); // Chama o construtor da classe pai
        $this->nivelAcesso = $nivel;
    }

    public function getNivelAcesso() {
        return $this->nivelAcesso;
    }

    // SOBRESCRITA (Polimorfismo!)
    public function saudacao() {
        return "Olá, eu sou um ADMIN com nível {$this->nivelAcesso}!";
    }
}
?>