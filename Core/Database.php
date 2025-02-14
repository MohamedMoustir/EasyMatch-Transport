<?php

class Database {
    private static $instance = null;
    private $conn;

    private function __construct() {

        $host = "localhost";
        $port = "5432";
        $dbname = "transport";
        $user = "postgres";
        $pass = "902320";
 
        try { 
            
            $this->conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->conn; 
       
    } 
  
}
  
?>