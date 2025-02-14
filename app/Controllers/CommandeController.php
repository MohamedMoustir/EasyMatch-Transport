<?php
require_once __DIR__ . '/../Model/Commande.php'; 
require_once __DIR__ . '/../../Core/Database.php';
require_once __DIR__ . '/../../Core/Controller.php';
require_once __DIR__ . '/../../Core/Router.php';

class CommandeController {
    public function affichageCommandes() {
        $commandes = Commande::getAllCommandes(); // Récupération des commandes

        // Assurez-vous que la variable est bien un tableau pour éviter les erreurs
        if (empty($commandes)) {
            $commandes = [];
        }

        require_once __DIR__ . '/../View/conducteur/dashboard.php';
    }

    public function updateStatus($id_commande, $status) {
        $commande = new Commande($id_commande, null, $status);
        if ($commande->updateStatus($id_commande, $status)) {
            header("Location: /conducteur/dashboard");
            exit();
        } else {
            echo "Erreur lors de la mise à jour du statut.";
        }
    }

    public function createCommande($id_marchandise, $id_etape, $status) {
        $commande = new Commande($id_marchandise, $id_etape, $status);
        if ($commande->save()) {
            header("Location: /conducteur/dashboard");
            exit();
        } else {
            echo "Erreur lors de la création de la commande.";
        }
    }
}

?>