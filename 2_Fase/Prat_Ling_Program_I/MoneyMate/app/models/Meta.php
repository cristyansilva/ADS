<?php
require_once __DIR__ . '/../../config/database.php';

class Meta {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function criar($uid, $nome, $valorAlvo) {
        $sql = "INSERT INTO metas (usuario_id, nome, valor_alvo) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$uid, $nome, $valorAlvo]);
    }

    public function listarPorUsuario($uid) {
        $sql = "SELECT * FROM metas WHERE usuario_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$uid]);
        return $stmt->fetchAll();
    }

    public function atualizarValor($metaId, $valorAdicional) {
        $sql = "UPDATE metas SET valor_atual = valor_atual + ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$valorAdicional, $metaId]);
    }

    public function excluir($id, $uid) {
        $stmt = $this->pdo->prepare("DELETE FROM metas WHERE id = ? AND usuario_id = ?");
        return $stmt->execute([$id, $uid]);
    }
}