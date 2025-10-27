<?php
class Programador extends Funcionario {
    public $linguagem_principal;

    public function __construct($db) {
        parent::__construct($db);
        $this->tipo = 'programador';
    }

    public function calcularSalarioFinal() {
        return $this->salario_base;
    }

    public function criar() {
        $query = "INSERT INTO " . $this->table . " (nome, salario_base, tipo, linguagem_principal) VALUES (:nome, :salario_base, :tipo, :linguagem_principal)";
        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->salario_base = htmlspecialchars(strip_tags($this->salario_base));
        $this->linguagem_principal = htmlspecialchars(strip_tags($this->linguagem_principal));

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':salario_base', $this->salario_base);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':linguagem_principal', $this->linguagem_principal);

        return $stmt->execute();
    }
}
?>