<?php

class Commande {
    private $id_commande;
    private $id_marchandise;
    private $id_etape;
    private $status;
    private $pdo;

    // 🔹 Constructeur
    public function __construct($id_marchandise, $id_etape, $status = "En attente") {
        $this->id_marchandise = $id_marchandise;
        $this->id_etape = $id_etape;
        $this->status = $status;

    }

    // 🔹 Getters
    public function getIdCommande() {
        return $this->id_commande;
    }

    public function getIdMarchandise() {
        return $this->id_marchandise;
    }

    public function getIdEtape() {
        return $this->id_etape;
    }

    public function getStatus() {
        return $this->status;
    }

    public function Commande($Commande)
    {
        try {

            $query = "INSERT INTO public.commandes(id_marchandise, id_etape)
	        VALUES (:id_marchandise, :id_etape);";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                ':id_marchandise' => $Commande->getIdMarchandise(),
                ':id_etape' => $Commande->getIdEtape()
            ]);

            return true;
        } catch (Exception $e) {
            error_log("Erreur lors de la création de l'annonce: " . $e->getMessage());
            return false;
        }
    }

  




  
}
