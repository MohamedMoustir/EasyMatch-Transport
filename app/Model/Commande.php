<?php
require_once __DIR__ . '/../../Core/Database.php';

class Commande {
    private $id_commande;
    private $id_marchandise;
    private $id_etape;
    private $status;
    private $date_soumission;
    private $pdo;

    public function __construct($id_marchandise, $id_etape, $status, $date_soumission = null)
    {
        $this->id_marchandise = $id_marchandise;
        $this->id_etape = $id_etape;
        $this->status = $status;
        $this->date_soumission = $date_soumission ?? date('Y-m-d H:i:s');
        $this->pdo = Database::getInstance();
    }

    public function getIdCommande() { return $this->id_commande; }
    public function getIdMarchandise() { return $this->id_marchandise; }
    public function getIdEtape() { return $this->id_etape; }
    public function getStatus() { return $this->status; }
    public function getDateSoumission() { return $this->date_soumission; }

    public function setIdMarchandise($id_marchandise) { $this->id_marchandise = $id_marchandise; }
    public function setIdEtape($id_etape) { $this->id_etape = $id_etape; }
    public function setStatus($status) { $this->status = $status; }
    public function setDateSoumission($date_soumission) { $this->date_soumission = $date_soumission; }

    public function getDetails() {
        try {
            $sql = "SELECT c.*, 
            m.dimension, 
            v_depart.nom AS origine, 
            v_arrivee.nom AS destination, 
            t.date_depart, 
            t.date_arrivee 
            FROM commandes c 
            JOIN marchandises m ON c.id_marchandise = m.id_marchandise 
            JOIN etapes e ON c.id_etape = e.id_etape
            JOIN trajets t ON e.id_trajet = t.id_trajet
            JOIN villes v_depart ON t.ville_depart = v_depart.id_ville
            JOIN villes v_arrivee ON t.ville_arrivee = v_arrivee.id_ville
            WHERE c.id_commande = :id_commande";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id_commande' => $this->id_commande]);
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }

    public function updateStatus($status) {
        try {
            $sql = "UPDATE commandes SET status = :status WHERE id_commande = :id_commande";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'status' => $status,
                'id_commande' => $this->id_commande
            ]);
            $this->status = $status;
            return true;
            
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public static function getAllCommandes() {
        try {
            $pdo = Database::getInstance();
            $sql = "SELECT c.*, 
                           v_depart.nom AS origine, 
                           v_arrivee.nom AS destination, 
                           m.dimension, 
                           t.date_depart, 
                           t.date_arrivee 
                    FROM commandes c 
                    JOIN marchandises m ON c.id_marchandise = m.id_marchandise 
                    JOIN etapes e ON c.id_etape = e.id_etape
                    JOIN trajets t ON e.id_trajet = t.id_trajet
                    JOIN villes v_depart ON t.ville_depart = v_depart.id_ville
                    JOIN villes v_arrivee ON t.ville_arrivee = v_arrivee.id_ville
                    ORDER BY c.date_soumission DESC";
            
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);            
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }
}
?>
