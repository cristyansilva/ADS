<?php
// Arquivo: model/Conexao.php

class Conexao {
    
    // Configurações do banco (baseado no seu arquivo conexao.php)
    private static $host = 'localhost';
    private static $dbname = 'cadastro_cursos';
    private static $usuario = 'root';
    private static $senha = '';

    /**
     * Método estático para conectar ao banco de dados.
     * Retorna um objeto PDO.
     */
    public static function conectar() {
        try {
            // Cria a conexão PDO
            $pdo = new PDO(
                "mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8",
                self::$usuario,
                self::$senha
            );
            
            // Define o modo de erro do PDO para lançar exceções
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $pdo;

        } catch (PDOException $e) {
            // Em caso de falha, exibe o erro e "mata" a aplicação
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }
}

?>