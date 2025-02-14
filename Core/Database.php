<?php
class Database {
    private static $instance = null;
    private $pdo;
    private function __construct() {


        $host = "localhost";
        $port = "5432";
        $dbname = "transport";
        $dbname = "transport";
        $user = "postgres";
        $pass = "1234";
 
       
        try {
            $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
            $this->pdo = new PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->pdo; 
       
    } 

}
  
  
?>