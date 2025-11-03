<?php
// Arquivo: model/Curso.php

class Curso {
    
    // 1. Atributos (baseados no PDF [cite: 11-15])
    private $id;
    private $nomeCurso;
    private $codigoCurso;
    private $duracao;
    private $descricao;

    // 2. Construtor (baseado no PDF [cite: 16])
    // Usado para criar um NOVO objeto Curso
    public function __construct($nomeCurso, $codigoCurso, $duracao, $descricao, $id = null) {
        $this->nomeCurso = $nomeCurso;
        $this->codigoCurso = $codigoCurso;
        $this->duracao = $duracao;
        $this->descricao = $descricao;
        $this->id = $id; // O ID é opcional no construtor [cite: 16]
    }

    // 3. Métodos Getters (para LER os dados [cite: 16-20])
    
    public function getId() {
        return $this->id;
    }

    public function getNomeCurso() {
        return $this->nomeCurso;
    }

    public function getCodigoCurso() {
        return $this->codigoCurso;
    }

    public function getDuracao() {
        return $this->duracao;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    // 4. Métodos Setters (para ALTERAR os dados [cite: 21-25])
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setNomeCurso($nomeCurso) {
        $this->nomeCurso = $nomeCurso;
    }

    public function setCodigoCurso($codigoCurso) {
        $this->codigoCurso = $codigoCurso;
    }

    public function setDuracao($duracao) {
        $this->duracao = $duracao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
}

?>