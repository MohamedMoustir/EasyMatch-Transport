<?php
require_once  '../../Core/Database.php';

class User {
    private $pdo;

    public function __construct() {
        $database = Database::getInstance();
        // $this->pdo = $database->getConnection();
        $this->pdo = Database::getInstance();
    }

    public function register($nom, $prenom, $phone, $email, $password, $role) {
        try {
            $sql = "INSERT INTO users (nom, prenom, phone, email, password, role)VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $params = [$nom, $prenom, $phone, $email, $hashedPassword, $role];

            return $stmt->execute($params);

        } catch (PDOException $e) {
            echo ("PDO Exception: " . $e->getMessage());
            return false;
        }
    }
    public function login($email, $password){
        try {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            if ($user && password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo ("PDO Exception: " . $e->getMessage());
            return false;
        }
    }
    
}
?>