<?php
abstract class Funcionario {
    protected $conn;
    protected $table = 'funcionarios';

    public $id;
    public $nome;
    public $salario_base;
    public $tipo;

    public function __construct($db) {
        $this->conn = $db;
    }

    public abstract function criar();
    public abstract function calcularSalarioFinal();

    public static function listarTodos($db) {
        $query = "SELECT * FROM funcionarios ORDER BY nome";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public static function excluirPorId($id, $db) {
        $query = "DELETE FROM funcionarios WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>