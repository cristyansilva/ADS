<?php
require_once __DIR__ . '/../models/Transacao.php';
require_once __DIR__ . '/../models/Conta.php';

class RelatorioController {
    
    public function index() {
        if (!isset($_SESSION['uid'])) header('Location: index.php');
        
        $periodo = $_GET['periodo'] ?? 6; 
        
        $transacaoModel = new Transacao();
        $contaModel = new Conta();
        $dadosEvolucao = $transacaoModel->obterEvolucaoMensal($_SESSION['uid'], $periodo);    
        $labels = [];
        $receitas = [];
        $despesas = [];
        $saldos = [];

        foreach($dadosEvolucao as $d) {
            $dateObj = DateTime::createFromFormat('!Y-m', $d['mes_ano']);
            $labels[] = $dateObj->format('M/y');
            
            $receitas[] = $d['receitas'];
            $despesas[] = $d['despesas'];
            $saldos[] = $d['receitas'] - $d['despesas'];
        }

        $contas = $contaModel->listarPorUsuario($_SESSION['uid']);
        $contasLabels = [];
        $contasValores = [];
        foreach($contas as $c) {
            $contasLabels[] = $c['nome'];
            $contasValores[] = $c['saldo_atual'];
        }

        include __DIR__ . '/../views/relatorios/index.php';
    }

    // Funcionalidade de Exportar para Excel/CSV (Visto no transactions.tsx)
    public function exportarCSV() {
        if (!isset($_SESSION['uid'])) return;

        $transacaoModel = new Transacao();
        $dados = $transacaoModel->listarTodas($_SESSION['uid']);

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=transacoes.csv');

        $output = fopen('php://output', 'w');
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($output, ['ID', 'Data', 'Descrição', 'Tipo', 'Valor', 'Conta', 'Categoria']);

        foreach ($dados as $linha) {
            fputcsv($output, [
                $linha['id'],
                $linha['data_transacao'],
                $linha['descricao'],
                $linha['tipo'],
                number_format($linha['valor'], 2, ',', '.'),
                $linha['conta_nome'],
                $linha['categoria_nome']
            ]);
        }
        fclose($output);
        exit;
    }
}