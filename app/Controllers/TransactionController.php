<?php
require_once '../config/database.php';

class TransactionController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Récupérer toutes les transactions
    public function getTransactions() {
        $stmt = $this->db->query("SELECT * FROM transactions ORDER BY date_transaction DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$controller = new TransactionController($db);
?>


