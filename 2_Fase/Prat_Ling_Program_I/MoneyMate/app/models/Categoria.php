<?php
require_once __DIR__ . '/../../config/database.php';

class Categoria {
    private $pdo;
    public function __construct() { $this->pdo = Database::getConnection(); }

    public function listarPorUsuario($userId, $tipo = null) {
        
        $sql = "SELECT * FROM categorias WHERE usuario_id = ?";
        $params = [$userId];
        if ($tipo !== null) {
            $sql .= " AND tipo = ?";
            $params[] = $tipo;
        }

        $sql .= " ORDER BY tipo, nome";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function criar($userId, $nome, $tipo) {
        $cor = ($tipo == 'receita') ? '#10b981' : '#ef4444'; 
        $icone = 'fa-tag';

        $stmt = $this->pdo->prepare("INSERT INTO categorias (usuario_id, nome, tipo, cor, icone) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$userId, $nome, $tipo, $cor, $icone]);
    }

    public function excluir($id, $userId) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM categorias WHERE id = ? AND usuario_id = ?");
            return $stmt->execute([$id, $userId]);
        } catch (PDOException $e) {
            return false;
        }
    }
    public function atualizar($id, $uid, $nome, $tipo) {
        $cor = ($tipo == 'receita') ? '#10b981' : '#ef4444'; 
        $stmt = $this->pdo->prepare("UPDATE categorias SET nome = ?, tipo = ?, cor = ? WHERE id = ? AND usuario_id = ?");
        return $stmt->execute([$nome, $tipo, $cor, $id, $uid]);
    }
}