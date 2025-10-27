<?php
class Gerente extends Funcionario {
    public $bonus_gerencia;

    public function __construct($db) {
        parent::__construct($db); 
        $this->tipo = 'gerente';
    }

    // Implementação do Polimorfismo
    public function calcularSalarioFinal() {
        return $this->salario_base + $this->bonus_gerencia;
    }

    public function criar() {
        $query = "INSERT INTO " . $this->table . " (nome, salario_base, tipo, bonus_gerencia) VALUES (:nome, :salario_base, :tipo, :bonus_gerencia)";
        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->salario_base = htmlspecialchars(strip_tags($this->salario_base));
        $this->bonus_gerencia = htmlspecialchars(strip_tags($this->bonus_gerencia));

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':salario_base', $this->salario_base);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':bonus_gerencia', $this->bonus_gerencia);

        return $stmt->execute();
    }
}
?>