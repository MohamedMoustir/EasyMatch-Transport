<?php

class Database {
    private static $instance = null;
    private $conn;

    private function __construct() {
        $host = "localhost";
        $port = "5432";
<<<<<<< .merge_file_hzsxSi
        $dbname = "Transport";
        $user = "postgres";
        $pass = "abc";

        try {
=======
        $dbname = "transport";
        $user = "postgres";
        $pass = "1234";
 
        try { 
            
>>>>>>> .merge_file_PCOsnS
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
<<<<<<< .merge_file_hzsxSi
        return self::$instance; 
    }

    public function getConnection() {
        return $this->conn;
    }
=======
        return self::$instance->conn;
    } 
  
>>>>>>> .merge_file_PCOsnS
}
?>
