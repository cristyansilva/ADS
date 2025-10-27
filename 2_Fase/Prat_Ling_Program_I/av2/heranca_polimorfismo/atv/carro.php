<?php
require_once 'veiculo.php';

// Classe Filha (Subclasse)
class Carro extends Veiculo {
    private $portas;

    public function __construct($marca, $modelo, $portas) {
        // Chama o construtor da classe pai para reaproveitar o código
        parent::__construct($marca, $modelo);
        $this->portas = $portas;
    }

    // Polimorfismo: Sobrescrevendo o método info()
    public function info() {
        return "🚗 Carro: {$this->marca} {$this->modelo} | Portas: {$this->portas}";
    }
}
?>