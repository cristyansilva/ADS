<?php
require_once 'veiculo.php';

// Classe Filha (Subclasse)
class Moto extends Veiculo {
    private $cilindradas;

    public function __construct($marca, $modelo, $cilindradas) {
        // Chama o construtor da classe pai
        parent::__construct($marca, $modelo);
        $this->cilindradas = $cilindradas;
    }

    // Polimorfismo: Sobrescrevendo o método info()
    public function info() {
        return "🏍️ Moto: {$this->marca} {$this->modelo} | Cilindradas: {$this->cilindradas}cc";
    }
}
?>