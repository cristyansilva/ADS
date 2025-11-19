<?php
require_once __DIR__ . '/../../config/database.php';

class Conta {
    private $pdo;
    public function __construct() { $this->pdo = Database::getConnection(); }

    public function listarPorUsuario($userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM contas WHERE usuario_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
    
    public function criar($userId, $nome, $saldoInicial) {
        $stmt = $this->pdo->prepare("INSERT INTO contas (usuario_id, nome, saldo_atual) VALUES (?, ?, ?)");
        return $stmt->execute([$userId, $nome, $saldoInicial]);
    }

    public function excluir($id, $userId) {
        // Cuidado: Adicionar verificação se a conta tem transações antes de excluir
        $stmt = $this->pdo->prepare("DELETE FROM contas WHERE id = ? AND usuario_id = ?");
        return $stmt->execute([$id, $userId]);
    }
    public function atualizar($id, $uid, $nome, $saldo) {
        $stmt = $this->pdo->prepare("UPDATE contas SET nome = ?, saldo_atual = ? WHERE id = ? AND usuario_id = ?");
        return $stmt->execute([$nome, $saldo, $id, $uid]);
    }
}