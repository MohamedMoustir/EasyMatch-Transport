<?php

require_once __DIR__ . '/../../Core/Database.php';
require_once __DIR__ . '/../Model/alert.php';


class Trajet {
    private $id;
    private $ville_depart;
    private $ville_arrivee;
    private $date_depart;
    private $date_arrivee;
    private $id_conducteur;
    protected $pdo;

   
    
    
    public function __construct($id, $ville_depart, $ville_arrivee, $date_depart, $date_arrivee, $id_conducteur) {
        $this->id = $id;
        $this->ville_depart = $ville_depart;
        $this->ville_arrivee = $ville_arrivee;
        $this->date_depart = $date_depart;
        $this->date_arrivee = $date_arrivee;
        $this->id_conducteur = $id_conducteur;
        $this->pdo = Database::getInstance();

    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getVilleDepart() {
        return $this->ville_depart;
    }

    public function getVilleArrivee() {
        return $this->ville_arrivee;
    }

    public function getDateDepart() {
        return $this->date_depart;
    }

    public function getDateArrivee() {
        return $this->date_arrivee;
    }

    public function getIdConducteur() {
        return $this->id_conducteur;
    }

    // Setters
    public function setVilleDepart($ville_depart) {
        $this->ville_depart = $ville_depart;
    }

    public function setVilleArrivee($ville_arrivee) {
        $this->ville_arrivee = $ville_arrivee;
    }

    public function setDateDepart($date_depart) {
        $this->date_depart = $date_depart;
    }

    public function setDateArrivee($date_arrivee) {
        $this->date_arrivee = $date_arrivee;
    }

    public function setIdConducteur($id_conducteur) {
        $this->id_conducteur = $id_conducteur;
    }


    public function CreateTrajet($Trajet)
{
    try {
        $query = 'INSERT INTO public.trajets(ville_depart, ville_arrivee, date_depart, date_arrivee, id_conducteur)
                  VALUES (:ville_depart, :ville_arrivee, :date_depart, :date_arrivee, :id_conducteur)';

        $stmt = $this->pdo->prepare($query);


    $exit=$stmt->execute([
            'ville_depart' => $Trajet->getVilleDepart(),
            'ville_arrivee' => $Trajet->getVilleArrivee(),
            'date_depart' => $Trajet->getDateDepart(),
            'date_arrivee' => $Trajet->getDateArrivee(),
            'id_conducteur' => $Trajet->getIdConducteur()
        ]);

//   Alert::alerts($exit);
  $lastInsertId = $this->pdo->query("SELECT MAX(id_trajet) FROM trajets")->fetchColumn();

            return $lastInsertId;
            
          

    } catch (PDOException $e) {
        error_log("Error creating trajet: " . $e->getMessage());
        return false;
    }
}

}

