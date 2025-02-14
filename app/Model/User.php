<?php
require_once __DIR__ . '/../../Core/Database.php';

class User {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    public function register($nom, $prenom, $phone, $email, $password, $role) {
        try {
            $sql = "INSERT INTO users (nom, prenom, phone, email, password, role) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $params = [$nom, $prenom, $phone, $email, $hashedPassword, $role];

            return $stmt->execute($params);
        } catch (PDOException $e) {
            echo ("PDO Exception: " . $e->getMessage());
            return false;
        }
    }

    public function login($email, $password) {
        try {
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

    public function suspendUser($userId) {
        try {
            $sql = "UPDATE users SET status = 'Suspendu' WHERE id_user = :id_user";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_user', $userId, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            return "Erreur lors de la suspension de l'utilisateur : " . $e->getMessage();
        }
    }

    public function validateUser($userId) {
        try {
            $sql = "UPDATE users SET status = 'Validé' WHERE id_user = :id_user";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_user', $userId, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            return "Erreur lors de la validation de l'utilisateur : " . $e->getMessage();
        }
    }

    public function verifyUser($userId) {
        try {
            $sql = "UPDATE users SET isVerified = TRUE WHERE id_user = :id_user";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_user', $userId, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            return "Erreur lors de la vérification de l'utilisateur : " . $e->getMessage();
        }
    }

    public function checkUser($userId) {
        try {
            $sql = "SELECT * FROM users WHERE id_user = :id_user";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_user', $userId, PDO::PARAM_INT);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                return "L'utilisateur avec l'ID $userId existe : " . print_r($user, true);
            } else {
                return "Aucun utilisateur trouvé avec l'ID $userId.";
            }
        } catch (PDOException $e) {
            return "Erreur lors de la vérification de l'utilisateur : " . $e->getMessage();
        }
    }

    public function deleteUser($userId) {
        try {
            $sql = "DELETE FROM users WHERE id_user = :id_user";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_user', $userId, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            return "Erreur lors de la suppression de l'utilisateur : " . $e->getMessage();
        }
    }

    public function getAllUsers() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM users");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo ("PDO Exception: " . $e->getMessage());
            return false;
        }
    }
}
?>