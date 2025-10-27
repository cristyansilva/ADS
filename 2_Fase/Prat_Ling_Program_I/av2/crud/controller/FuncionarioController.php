<?php
require_once 'model/funcionario/Funcionario.php';
require_once 'model/funcionario/Gerente.php';
require_once 'model/funcionario/Programador.php';

class FuncionarioController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function listar() {
        $funcionarios = Funcionario::listarTodos($this->db);
        include 'view/funcionario/listar.php';
    }

    public function criar() {
        if ($_POST) {
            $tipo = $_POST['tipo'] ?? '';
            $funcionario = null;

            if ($tipo === 'gerente') {
                $funcionario = new Gerente($this->db);
                $funcionario->bonus_gerencia = $_POST['bonus_gerencia'];
            } elseif ($tipo === 'programador') {
                $funcionario = new Programador($this->db);
                $funcionario->linguagem_principal = $_POST['linguagem_principal'];
            }

            if ($funcionario) {
                $funcionario->nome = $_POST['nome'];
                $funcionario->salario_base = $_POST['salario_base'];
                
                if ($funcionario->criar()) {
                    header("Location: index.php?msg=criado");
                    exit;
                } else {
                    $erro = "Erro ao salvar funcionário.";
                }
            } else {
                $erro = "Tipo de funcionário inválido.";
            }
        }
        include 'view/funcionario/criar.php';
    }
    
    public function excluir() {
        $id = $_GET['id'] ?? null;
        if ($id && Funcionario::excluirPorId($id, $this->db)) {
            header("Location: index.php?msg=excluido");
        } else {
            header("Location: index.php?erro=excluir");
        }
        exit;
    }

    public function editar() {
       echo "Funcionalidade de editar ainda não implementada.";
    }
}
?>