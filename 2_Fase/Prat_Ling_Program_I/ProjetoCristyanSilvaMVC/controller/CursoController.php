<?php

require_once 'model/CursoModel.php';
require_once 'model/Curso.php';

class CursoController {
    
    // Atributo para guardar uma instância do CursoModel
    private $model;

    /**
     * Construtor
     * Cria uma nova instância do CursoModel
     */
    public function __construct() {
        $this->model = new CursoModel();
    }

/**
     * Ação: CADASTRAR (Create)
     * Pega os dados do POST, cria um objeto Curso e manda o Model salvar.
     */
    public function cadastrar() {
        // Pega os dados do formulário (view/formulario.php)
        $nome = $_POST['nome_curso'];
        $codigo = $_POST['codigo_curso'];
        // Garanta que esta linha tenha o (;) no final
        $duracao = (int)$_POST['duracao']; // Requisito do PDF: Duração é inteiro
        $descricao = $_POST['descricao'];

        // Cria um novo objeto Curso com os dados
        $novoCurso = new Curso($nome, $codigo, $duracao, $descricao);

        // Manda o Model inserir o objeto no banco
        $sucesso = $this->model->inserir($novoCurso);
        
        // Após cadastrar, redireciona para a listagem
        $this->listar();
    }

    /**
     * Ação: LISTAR (Read)
     * Pede ao Model todos os cursos e o total,
     * e então carrega o arquivo da View (listagem.php).
     */
    public function listar() {
        // Pede os dados ao Model
        $cursos = $this->model->listarTodos();
        $totalCursos = $this->model->contarTotal();

        // Carrega o arquivo da View (listagem.php)
        // A View agora terá acesso às variáveis $cursos e $totalCursos
        require 'view/listagem.php';
    }

/**
     * Ação: EXCLUIR (Delete)
     * Pega o nome do curso do POST e manda o Model excluir.
     */
    public function excluir() {
        // Pega o nome do curso a excluir (do formulário na listagem)
        $nomeExcluir = $_POST['nome_curso_excluir'];
        
        // Manda o Model excluir por nome (requisito do PDF)
        $this->model->excluirPorNome($nomeExcluir);

        // Após excluir, redireciona para a listagem
        $this->listar();
    }

/**
     * Ação: ATUALIZAR (Update)
     * Pega os dados do POST e manda o Model atualizar.
     */
    public function atualizar() {
        // Pega os dados do formulário de atualização (view/listagem.php)
        $nomeBuscar = $_POST['nome_curso_buscar'];
        $novoCodigo = $_POST['novo_codigo'];
        $novaDuracao = (int)$_POST['nova_duracao'];

        // Manda o Model atualizar (requisito do PDF)
        $this->model->atualizar($nomeBuscar, $novoCodigo, $novaDuracao);

        // Após atualizar, redireciona para a listagem
        $this->listar();
    }

    /**
     * Ação: MOSTRAR FORMULÁRIO
     * Apenas carrega a view do formulário de cadastro.
     */
    public function mostrarFormulario() {
        require 'view/formulario.php';
    }
}
?>