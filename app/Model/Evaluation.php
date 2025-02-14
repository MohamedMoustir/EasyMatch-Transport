<?php
require_once __DIR__ . '/../../Core/Database.php';

class Evaluation {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    public function getEvaluationsByUserId($userId) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM reviews WHERE id_expediteur = :user_id OR id_conducteur = :user_id");
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo ("PDO Exception: " . $e->getMessage());
            return false;
        }
    }
}
?>