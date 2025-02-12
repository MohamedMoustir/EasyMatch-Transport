<?php
require_once  '../../Core/Database.php';

class User {
    private $pdo;

    public function __construct() {
        $database = Database::getInstance();
        $this->pdo = $database->getConnection();
    }

    public function register($nom, $prenom, $phone, $email, $password, $role) {
        try {
            $sql = "INSERT INTO users (nom, prenom, phone, email, password, role)VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $params = [$nom, $prenom, $phone, $email, $hashedPassword, $role];

            if ($stmt->execute($params)) {
                error_log("Inscription réussie pour ");
            } else {
                error_log("Échec d'insertion: " . json_encode($stmt->errorInfo()));
            }

        } catch (PDOException $e) {
            error_log("PDO Exception: " . $e->getMessage());
            return false;
        }
    }
    
}
?>