<?php

class Marchandise
{
    private $id_marchandise;
    private $dimension;
    private $id_expediteur;
    private $pdo;


    public function __construct($dimension, $id_expediteur)
    {
        $this->dimension = $dimension;
        $this->id_expediteur = $id_expediteur;
        $this->pdo = Database::getInstance();

    }

    // 🔹 Getters
    public function getIdMarchandise()
    {
        return $this->id_marchandise;
    }

    public function getDimension()
    {
        return $this->dimension;
    }

    public function getIdExpediteur()
    {
        return $this->id_expediteur;
    }

    // 🔹 Setters


    public function setDimension($dimension)
    {

        $this->dimension = $dimension;

    }


    public function Marchandise($Marchandise)
    {
        try {

            $query = "INSERT INTO marchandises( dimension, id_expediteur)
	          VALUES ( :dimension, :id_expediteur);";

            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                ':dimension' => $Marchandise->getDimension(),
                ':id_expediteur' => $Marchandise->getIdExpediteur()
            ]);

            return $this->pdo->lastInsertId();

        } catch (Exception $e) {
            error_log("Erreur lors de la création de l'annonce: " . $e->getMessage());
            return false;
        }
    }
}
