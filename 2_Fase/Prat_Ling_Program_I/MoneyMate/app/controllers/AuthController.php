<?php
require_once __DIR__ . '/../../config/database.php';

class AuthController {

    /**
     * Exibe a página de login (app/views/auth/login.php)
     */
    public function index() {
        require_once dirname(__DIR__) . '/views/auth/login.php';
    }

    /**
     * Processa a tentativa de login.
     * Agora aceita E-mail OU Nome de Usuário.
     */
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login_identificador']; 
            $senha = $_POST['senha'];

            try {
                $pdo = Database::getConnection();
                $sql = "SELECT * FROM usuarios WHERE email = :login OR nome = :login LIMIT 1";
                
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['login' => $login]);
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($usuario && password_verify($senha, $usuario['senha'])) {
                    $_SESSION['uid'] = $usuario['id'];
                    $_SESSION['nome'] = $usuario['nome'];
                    
                    // Redireciona para o dashboard
                    header("Location: index.php?rota=dashboard");
                    exit;
                    
                } else {
                    header("Location: index.php?rota=login&erro=1");
                    exit;
                }

            } catch (PDOException $e) {
                die("Erro de login: " . $e->getMessage());
            }
        }
    }

    /**
     * Processa o logout do usuário.
     */
    public function logout() {
        session_unset();
        session_destroy();
        header("Location: index.php?rota=login");
        exit;
    }
    
}