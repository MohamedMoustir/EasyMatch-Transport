<?php
require_once __DIR__ . '/../../Core/Database.php';

class Statistiques {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    public function getStats() {
        try {
            $stats = [];

            $stmt = $this->pdo->prepare("SELECT COUNT(*) as total_ads FROM annonces");
            $stmt->execute();
            $stats['total_ads'] = $stmt->fetch(PDO::FETCH_ASSOC)['total_ads'];

           
            $stmt = $this->pdo->prepare("SELECT COUNT(*) as total_requests FROM demandes");
            $stmt->execute();
            $stats['total_requests'] = $stmt->fetch(PDO::FETCH_ASSOC)['total_requests'];

         
            $stmt = $this->pdo->prepare("SELECT COUNT(*) as total_transactions FROM transactions WHERE status = 'success'");
            $stmt->execute();
            $stats['total_transactions'] = $stmt->fetch(PDO::FETCH_ASSOC)['total_transactions'];

            return $stats;
        } catch (PDOException $e) {
            echo ("PDO Exception: " . $e->getMessage());
            return false;
        }
    }
}
?>