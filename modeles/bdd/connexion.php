<?php 

class PDOConnexion
{
    private static $instance = null;
    private $connection;

    private function __construct() {
        $config = require __DIR__ . '/config.php';
        $this->connection = new PDO(
            dsn: "mysql:host={$config['host']};dbname={$config['dbname']}",
            username: $config['username'],
            password: $config['password']
        );
        $this->connection->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);
    }

    // private function __destruct(){
    //     $this->connection == null;
    //     self::$instance = null;
    // }

    public static function getInstance(): mixed {
        if (self::$instance === null) {
            self::$instance = new PDOConnexion();
        }
        return self::$instance;
    }

    public function getConnection(): PDO {
        return $this->connection;
    }
    
}