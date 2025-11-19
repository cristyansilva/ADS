<?php
require_once __DIR__ . '/../../config/database.php';

class Orcamento {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function criar($uid, $cid, $valor, $mes, $ano) {
        $sql = "INSERT INTO orcamentos (usuario_id, categoria_id, valor_orcado, mes, ano) 
                VALUES (?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE valor_orcado = VALUES(valor_orcado)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$uid, $cid, $valor, $mes, $ano]);
    }

    public function listarPorMes($uid, $mes, $ano) {
        $sql = "SELECT 
                    o.*, 
                    c.nome as categoria_nome, c.icone,
                    (SELECT SUM(valor) FROM transacoes t 
                     WHERE t.categoria_id = o.categoria_id 
                     AND t.tipo = 'despesa'
                     AND MONTH(t.data_transacao) = o.mes
                     AND YEAR(t.data_transacao) = o.ano
                    ) as gasto_real
                FROM orcamentos o
                JOIN categorias c ON o.categoria_id = c.id
                WHERE o.usuario_id = ? AND o.mes = ? AND o.ano = ?";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$uid, $mes, $ano]);
        return $stmt->fetchAll();
    }

    public function excluir($id, $uid) {
        $stmt = $this->pdo->prepare("DELETE FROM orcamentos WHERE id = ? AND usuario_id = ?");
        return $stmt->execute([$id, $uid]);
    }
}