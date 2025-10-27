<?php
require_once 'veiculo.php';

// Terceira Classe Filha
class Caminhao extends Veiculo {
    private $capacidadeCarga;

    public function __construct($marca, $modelo, $capacidadeCarga) {
        parent::__construct($marca, $modelo);
        $this->capacidadeCarga = $capacidadeCarga;
    }

    // Polimorfismo: Sobrescrevendo o método info()
    public function info() {
        return "🚚 Caminhão: {$this->marca} {$this->modelo} | Capacidade: {$this->capacidadeCarga} Toneladas";
    }
}
?>