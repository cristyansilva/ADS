<?php
require_once __DIR__ . '/../../config/database.php';
class Transacao
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function listarPorMes($userId, $mes, $ano)
    {
        $sql = "SELECT t.*, c.nome as conta_nome, cat.nome as categoria_nome 
                FROM transacoes t 
                JOIN contas c ON t.conta_id = c.id 
                LEFT JOIN categorias cat ON t.categoria_id = cat.id
                WHERE t.usuario_id = ? 
                AND MONTH(t.data_transacao) = ? 
                AND YEAR(t.data_transacao) = ?
                ORDER BY t.data_transacao DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId, $mes, $ano]);
        return $stmt->fetchAll();
    }

    public function criar($dados)
    {
        try {
            $this->pdo->beginTransaction();

  
            $sql = "INSERT INTO transacoes (usuario_id, conta_id, categoria_id, tipo, descricao, valor, data_transacao, comprovante) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                $dados['usuario_id'],
                $dados['conta_id'],
                $dados['categoria_id'],
                $dados['tipo'],
                $dados['descricao'],
                $dados['valor'],
                $dados['data'],
                $dados['comprovante']
            ]);

            $fator = ($dados['tipo'] == 'receita') ? 1 : -1;
            $update = $this->pdo->prepare("UPDATE contas SET saldo_atual = saldo_atual + ? WHERE id = ?");
            $update->execute([$dados['valor'] * $fator, $dados['conta_id']]);

            $this->pdo->commit();
            return true;
        } catch (Exception $e) {
            $this->pdo->rollBack();
            return false; 
        }
    }

    public function resumoFinanceiro($userId, $mes, $ano)
    {
        $sql = "SELECT tipo, SUM(valor) as total FROM transacoes 
                WHERE usuario_id = ? 
                AND MONTH(data_transacao) = ? 
                AND YEAR(data_transacao) = ?
                GROUP BY tipo";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId, $mes, $ano]);
        return $stmt->fetchAll();
    }
    //  Dados para o Gráfico de Categorias
    public function gastosPorCategoria($userId, $mes, $ano)
    {
        $sql = "SELECT cat.nome, SUM(t.valor) as total 
                FROM transacoes t
                JOIN categorias cat ON t.categoria_id = cat.id
                WHERE t.usuario_id = ? 
                AND t.tipo = 'despesa'
                AND MONTH(t.data_transacao) = ? 
                AND YEAR(t.data_transacao) = ?
                GROUP BY cat.nome";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId, $mes, $ano]);
        return $stmt->fetchAll();
    }

    //  Excluir transação
    public function excluir($id, $userId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM transacoes WHERE id = ? AND usuario_id = ?");
        $stmt->execute([$id, $userId]);
        $transacao = $stmt->fetch();

        if ($transacao) {
            $this->pdo->beginTransaction();
            $del = $this->pdo->prepare("DELETE FROM transacoes WHERE id = ?");
            $del->execute([$id]);
            $fator = ($transacao['tipo'] == 'despesa') ? 1 : -1;
            $upd = $this->pdo->prepare("UPDATE contas SET saldo_atual = saldo_atual + ? WHERE id = ?");
            $upd->execute([$transacao['valor'] * $fator, $transacao['conta_id']]);

            $this->pdo->commit();
        }
    }
    public function obterEvolucaoMensal($userId, $meses = 6) {
        $sql = "SELECT 
                    DATE_FORMAT(data_transacao, '%Y-%m') as mes_ano,
                    SUM(CASE WHEN tipo = 'receita' THEN valor ELSE 0 END) as receitas,
                    SUM(CASE WHEN tipo = 'despesa' THEN valor ELSE 0 END) as despesas
                FROM transacoes 
                WHERE usuario_id = ? 
                AND data_transacao >= DATE_SUB(CURDATE(), INTERVAL ? MONTH)
                GROUP BY mes_ano
                ORDER BY mes_ano ASC";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId, $meses]);
        return $stmt->fetchAll();
    }
    
    public function listarTodas($userId) {
        $sql = "SELECT t.*, c.nome as conta_nome, cat.nome as categoria_nome 
                FROM transacoes t 
                JOIN contas c ON t.conta_id = c.id 
                LEFT JOIN categorias cat ON t.categoria_id = cat.id
                WHERE t.usuario_id = ? ORDER BY t.data_transacao DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
    public function atualizar($id, $uid, $dados) {
        try {
            $this->pdo->beginTransaction();

            $stmt = $this->pdo->prepare("SELECT * FROM transacoes WHERE id = ? AND usuario_id = ?");
            $stmt->execute([$id, $uid]);
            $antiga = $stmt->fetch();

            if (!$antiga) return false;

            $fatorAntigo = ($antiga['tipo'] == 'despesa') ? 1 : -1; // Inverso do que foi feito
            $upd = $this->pdo->prepare("UPDATE contas SET saldo_atual = saldo_atual + ? WHERE id = ?");
            $upd->execute([$antiga['valor'] * $fatorAntigo, $antiga['conta_id']]);

            $sql = "UPDATE transacoes SET conta_id=?, categoria_id=?, tipo=?, descricao=?, valor=?, data_transacao=?, comprovante=? WHERE id=? AND usuario_id=?";
            $stmt = $this->pdo->prepare($sql);
            $comprovanteFinal = $dados['comprovante'] ? $dados['comprovante'] : $antiga['comprovante'];

            $stmt->execute([
                $dados['conta_id'], $dados['categoria_id'], $dados['tipo'], 
                $dados['descricao'], $dados['valor'], $dados['data'], 
                $comprovanteFinal, $id, $uid
            ]);

            $fatorNovo = ($dados['tipo'] == 'receita') ? 1 : -1;
            $upd->execute([$dados['valor'] * $fatorNovo, $dados['conta_id']]);

            $this->pdo->commit();
            return true;
        } catch (Exception $e) {
            $this->pdo->rollBack();
            return false;
        }
    }
}
