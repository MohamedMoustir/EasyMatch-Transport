<?php
require_once '../config/database.php';

class DashboardController {
    public function getStats() {
        global $db; // Connexion à la base de données

        $annoncesCount = $db->query("SELECT COUNT(*) FROM annonces")->fetchColumn();
        $transactionsCount = $db->query("SELECT COUNT(*) FROM transactions")->fetchColumn();
        $usersCount = $db->query("SELECT COUNT(*) FROM users")->fetchColumn();

        echo json_encode([
            'annonces' => $annoncesCount,
            'transactions' => $transactionsCount,
            'users' => $usersCount
        ]);
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'getStats') {
    $controller = new DashboardController();
    $controller->getStats();
}
?>
