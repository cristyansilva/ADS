<?php

// ======================================================================
//     SCRIPT PARA ZERAR O BANCO DE DADOS (TRUNCATE)
// ======================================================================
//
//   ATENÇÃO! ESTE SCRIPT APAGA TODOS OS DADOS DE TODAS AS TABELAS.
//   USE COM EXTREMA CAUTELA. FAÇA BACKUP ANTES.
//   APAGUE ESTE ARQUIVO DO SERVIDOR IMEDIATAMENTE APÓS O USO.
//
// ======================================================================

echo "<!DOCTYPE html><html lang='pt-br'><head><meta charset='UTF-8'>";
echo "<title>Zerar Banco de Dados</title>";
echo "<style>body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; line-height: 1.6; padding: 20px; background-color: #f4f4f4; color: #333; }";
echo ".container { max-width: 800px; margin: 20px auto; padding: 20px; background-color: #fff; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }";
echo "h1 { color: #d9534f; border-bottom: 2px solid #f0ad4e; padding-bottom: 10px; }";
echo ".success { color: #28a745; font-weight: bold; }";
echo ".error { color: #d9534f; font-weight: bold; }";
echo ".warn { background-color: #fcf8e3; border: 1px solid #faebcc; color: #8a6d3b; padding: 15px; border-radius: 4px; margin-bottom: 20px; }";
echo "pre { background-color: #eee; padding: 10px; border-radius: 4px; white-space: pre-wrap; word-wrap: break-word; } </style>";
echo "</head><body><div class='container'>";
echo "<h1><i class='fas fa-exclamation-triangle'></i> Script para Zerar Banco de Dados</h1>";
echo "<p class='warn'><strong>AVISO:</strong> Este script apagará permanentemente todos os dados das tabelas listadas. Tenha certeza de que você fez um backup.</p>";

try {
    // 1. Inclui sua classe de conexão com o banco
    require_once __DIR__ . '/config/database.php';


    // ======================================================================
    //     !! CONEXÃO CORRIGIDA !!
    // ======================================================================
    //
    // Agora estamos chamando o método estático da sua classe Database
    // para obter a conexão PDO.
    
    $conexao = Database::getConnection();

    // ======================================================================


    // 2. Validação da Conexão
    if (!$conexao || !is_object($conexao)) {
        // Este erro não deve mais acontecer
        throw new Exception("Falha ao obter conexão do Database::getConnection().");
    }
    
    // --- INÍCIO DA ÁREA DE CONFIGURAÇÃO ---
    // Detecta automaticamente que é PDO (baseado na sua classe)
    $tipo_conexao = (get_class($conexao) === 'PDO') ? 'pdo' : 'mysqli';
    
    // 3. ADAPTE ESTA LISTA!
    //    Coloque os nomes exatos das suas tabelas do banco de dados aqui.
    $tabelasParaLimpar = [
        'transacoes',
        'orcamentos',
        'metas',
        'contas',
        'categorias',
        'usuarios' 
        // Adicione outras tabelas se houver (ex: 'metas_depositos', etc.)
    ];
    // --- FIM DA ÁREA DE CONFIGURAÇÃO ---

    echo "<p>Conexão estabelecida com sucesso (" . $tipo_conexao . "). Iniciando limpeza...</p><hr>";
    echo "<strong>Tabelas a serem limpas:</strong> " . implode(', ', $tabelasParaLimpar) . "<br><br>";
    echo "<pre>";

    // Desativa a checagem de chaves estrangeiras (essencial para o TRUNCATE funcionar)
    if ($tipo_conexao == 'pdo') {
        $conexao->exec('SET FOREIGN_KEY_CHECKS = 0;');
    } else {
        // Este else provavelmente não será usado, já que sua classe é PDO
        $conexao->query('SET FOREIGN_KEY_CHECKS = 0;');
    }
    echo "Checks de Chave Estrangeira desativados...<br>";

    // Executa o TRUNCATE em cada tabela
    foreach ($tabelasParaLimpar as $tabela) {
        $sql = "TRUNCATE TABLE `$tabela`"; // TRUNCATE é mais rápido que DELETE e reseta o AUTO_INCREMENT
        
        if ($tipo_conexao == 'pdo') {
            $conexao->exec($sql);
        } else {
            $conexao->query($sql);
        }
        echo "Tabela `$tabela` limpa com sucesso.<br>";
    }

    // Reativa a checagem de chaves estrangeiras
    if ($tipo_conexao == 'pdo') {
        $conexao->exec('SET FOREIGN_KEY_CHECKS = 1;');
    } else {
        $conexao->query('SET FOREIGN_KEY_CHECKS = 1;');
    }
    echo "Checks de Chave Estrangeira reativados...<br>";
    
    echo "</pre>";
    echo "<hr><h2 class='success'>Processo concluído! Todos os dados foram apagados e as tabelas estão vazias.</h2>";
    echo "<p class='error'><strong>LEMBRE-SE DE APAGAR ESTE ARQUIVO DO SERVIDOR AGORA!</strong></p>";

} catch (Exception $e) {
    echo "</pre>";
    echo "<hr><p class='error'><strong>Ocorreu um erro:</strong><br>" . $e->getMessage() . "</p>";
    echo "<p><strong>Possíveis causas:</strong></p>";
    echo "<ul>";
    echo "<li>O nome de uma das tabelas na lista (linha 53) está errado.</li>";
    echo "<li>O arquivo `config/database.php` não foi encontrado.</li>";
    echo "<li>O usuário do banco não tem permissão para `TRUNCATE`.</li>";
    echo "</ul>";
    
    // Tenta reativar as chaves em caso de falha no meio
    if (isset($conexao) && $tipo_conexao == 'pdo') {
        $conexao->exec('SET FOREIGN_KEY_CHECKS = 1;');
    } elseif (isset($conexao)) {
        $conexao->query('SET FOREIGN_KEY_CHECKS = 1;');
    }
}

echo "</div></body></html>";