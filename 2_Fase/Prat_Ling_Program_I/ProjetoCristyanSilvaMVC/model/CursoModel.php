<?php
// Arquivo: model/CursoModel.php

// Inclui os arquivos necessários que vamos usar
require_once 'Conexao.php';
require_once 'Curso.php';

class CursoModel {
    
    // Atributo privado para armazenar a conexão PDO
    private $pdo;

    /**
     * Construtor da classe
     * Ao criar um CursoModel, ele recebe a conexão PDO
     */
    public function __construct() {
        // Chama o método estático da classe Conexao para pegar o PDO
        $this->pdo = Conexao::conectar();
    }

    /**
     * CREATE: Insere um novo curso no banco de dados [cite: 34]
     * Recebe um objeto da classe Curso
     */
    public function inserir(Curso $curso) {
        try {
            // SQL usando "named parameters" (:nome, :codigo, etc.)
            $sql = "INSERT INTO cursos (nome_do_curso, codigo_do_curso, duracao, descricao) 
                    VALUES (:nome, :codigo, :duracao, :descricao)";
            
            // Prepara o SQL para evitar SQL Injection
            $stmt = $this->pdo->prepare($sql);

            // Vincula os valores do objeto Curso aos parâmetros do SQL
            $stmt->bindValue(':nome', $curso->getNomeCurso());
            $stmt->bindValue(':codigo', $curso->getCodigoCurso());
            $stmt->bindValue(':duracao', $curso->getDuracao());
            $stmt->bindValue(':descricao', $curso->getDescricao());

            // Executa a query
            $stmt->execute();
            
            return true; // Sucesso

        } catch (PDOException $e) {
            echo "Erro ao inserir curso: " . $e->getMessage();
            return false; // Falha
        }
    }

    /**
     * READ: Lista todos os cursos do banco [cite: 35]
     * Retorna um array de cursos
     */
    public function listarTodos() {
        try {
            $sql = "SELECT * FROM cursos ORDER BY nome_do_curso ASC";
            $stmt = $this->pdo->query($sql);

            // fetchAll() busca todos os resultados
            // PDO::FETCH_ASSOC retorna um array associativo (coluna => valor)
            $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $cursos;

        } catch (PDOException $e) {
            echo "Erro ao listar cursos: " . $e->getMessage();
            return []; // Retorna array vazio em caso de falha
        }
    }
    
    /**
     * READ: Conta o total de cursos cadastrados [cite: 39]
     * Retorna um número inteiro
     */
    public function contarTotal() {
        try {
            $sql = "SELECT COUNT(*) FROM cursos";
            $stmt = $this->pdo->query($sql);
            
            // fetchColumn() retorna apenas a primeira coluna do primeiro resultado
            return $stmt->fetchColumn();

        } catch (PDOException $e) {
            echo "Erro ao contar cursos: " . $e->getMessage();
            return 0;
        }
    }

    /**
     * DELETE: Exclui um curso pelo NOME [cite: 38]
     */
    public function excluirPorNome($nome) {
        try {
            $sql = "DELETE FROM cursos WHERE nome_do_curso = :nome";
            $stmt = $this->pdo->prepare($sql);
            
            $stmt->bindValue(':nome', $nome);
            
            $stmt->execute();

            // Retorna a quantidade de linhas afetadas (para saber se excluiu)
            return $stmt->rowCount();

        } catch (PDOException $e) {
            echo "Erro ao excluir curso: " . $e->getMessage();
            return 0;
        }
    }

    /**
     * UPDATE: Atualiza código e duração baseado no NOME [cite: 37]
     */
    public function atualizar($nome, $novoCodigo, $novaDuracao) {
        try {
            $sql = "UPDATE cursos SET codigo_do_curso = :codigo, duracao = :duracao 
                    WHERE nome_do_curso = :nome";
            
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindValue(':codigo', $novoCodigo);
            $stmt->bindValue(':duracao', $novaDuracao);
            $stmt->bindValue(':nome', $nome);

            $stmt->execute();
            
            return $stmt->rowCount(); // Retorna linhas afetadas

        } catch (PDOException $e) {
            echo "Erro ao atualizar curso: " . $e->getMessage();
            return 0;
        }
    }
    
    /**
     * READ: Busca cursos por nome (sugestão do PDF) [cite: 36]
     * (Pode ser usado para o Update ou para uma futura busca)
     */
    public function buscarPorNome($nome) {
        try {
            $sql = "SELECT * FROM cursos WHERE nome_do_curso = :nome LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':nome', $nome);
            $stmt->execute();
            
            // fetch() busca apenas um resultado
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Erro ao buscar curso: " . $e->getMessage();
            return false;
        }
    }
}
?>