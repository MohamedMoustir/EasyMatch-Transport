<?php
require_once __DIR__ . '/../../Core/Database.php';

class Commande {
    private $id_commande;
    private $id_marchandise;
    private $ville_depart_cmd;
    private $ville_arrivee_cmd;
    private $id_conducteur;
    private $status;
    private $date_soumission;
    private $pdo;

    // 🔹 Constructeur
    public function __construct( $id_marchandise, $ville_depart_cmd, $ville_arrivee_cmd, $id_conducteur) {
        $this->id_marchandise = $id_marchandise;
        $this->ville_depart_cmd = $ville_depart_cmd;
        $this->ville_arrivee_cmd = $ville_arrivee_cmd;
        $this->id_conducteur = $id_conducteur;
        $this->pdo = Database::getInstance();
    }

    // 🔹 Getters
    public function getIdCommande() {
        return $this->id_commande;
    }

    public function getIdMarchandise() {
        return $this->id_marchandise;
    }

    public function getVilleDepartCmd() {
        return $this->ville_depart_cmd;
    }

    public function getVilleArriveeCmd() {
        return $this->ville_arrivee_cmd;
    }

    public function getIdConducteur() {
        return $this->id_conducteur;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getDateSoumission() {
        return $this->date_soumission;
    }

    public function createCommande(Commande $Commande) {
        try {

            $query = "INSERT INTO public.commandes (id_marchandise, ville_depart_cmd, ville_arrivee_cmd, id_conducteur)
                      VALUES (:id_marchandise, :ville_depart_cmd, :ville_arrivee_cmd, :id_conducteur)";

            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                ':id_marchandise' => $Commande->getIdMarchandise(),
                ':ville_depart_cmd' => $Commande->getVilleDepartCmd(),
                ':ville_arrivee_cmd' => $Commande->getVilleArriveeCmd(),
                ':id_conducteur' => $Commande->getIdConducteur(),
            ]);

            return true;
        } catch (Exception $e) {
            error_log("Erreur lors de la création de la commande: " . $e->getMessage());
            return false;
        }
    }

    public  function getCommandeById($id_commande) {
        try {
            $query = "SELECT * FROM commandes WHERE id_commande = :id_commande";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([':id_commande' => $id_commande]);
            $commandeData = $stmt->fetch(PDO::FETCH_ASSOC);
          
            return $commandeData;
        } catch (Exception $e) {
            error_log("Erreur lors de la récupération de la commande: " . $e->getMessage());
            return null;
        }
    }







  
}
