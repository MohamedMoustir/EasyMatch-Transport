<?php
require_once __DIR__ . '/../../Core/Database.php';

class Annonce
{
    private $id_annonce;
    private $titre;
    private $description;
    private $couverture;
    private $status;
    private $date_publication;
    private $id_conducteur;
    private $pdo;


    // Constructor
    public function __construct($titre, $description, $couverture, $status, $id_conducteur)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->couverture = $couverture;
        $this->status = $status;
        $this->id_conducteur = $id_conducteur;
        $this->date_publication = date('Y-m-d H:i:s');
        $this->pdo = Database::getInstance();

    }

    // Getters
    public function getIdAnnonce()
    {
        return $this->id_annonce;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCouverture()
    {
        return $this->couverture;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getDatePublication()
    {
        return $this->date_publication;
    }

    public function getIdConducteur()
    {
        return $this->id_conducteur;
    }

    // Setters
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setDescription($description)
    {
        $this->description = $description;

    }

    public function setCouverture($couverture)
    {
        $this->couverture = $couverture;

    }


    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function CreateAnnonce($Annonce)
    {
        try {

            $query = "INSERT INTO annonces (titre, description, couverture, id_conducteur)
                          VALUES (:titre, :description, :couverture, :id_conducteur)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                ':titre' => $Annonce->getTitre(),
                ':description' => $Annonce->getDescription(),
                ':couverture' => $Annonce->getCouverture(),
                ':id_conducteur' => $Annonce->getIdConducteur()
            ]);

            return true;
        } catch (Exception $e) {
            error_log("Erreur lors de la création de l'annonce: " . $e->getMessage());
            return false;
        }
    }
}


