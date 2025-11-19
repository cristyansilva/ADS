<?php
class Database {
    private static $instancia = null;

    public static function getConnection() {
        if (!isset(self::$instancia)) {
            $host = 'localhost';
            $db   = 'moneymate';
            $user = 'root';
            $pass = ''; 

            try {
                self::$instancia = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instancia->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Erro de Conexão: " . $e->getMessage());
            }
        }
        return self::$instancia;
    }
}