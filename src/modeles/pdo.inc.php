<?php

class monPDO
{
    private static $instance = null;
    private $pdo;

    private function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=monsite';
        $user = 'root';
        $password = '';

        try {
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new monPDO();
        }

        return self::$instance->pdo;
    }
}
