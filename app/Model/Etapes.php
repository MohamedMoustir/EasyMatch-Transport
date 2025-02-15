<?php
require_once __DIR__ . '/../../Core/Database.php';

class Etape
{
    private $conn;
    private $table = "etapes";
    private $id_etape;
    private $id_trajet;
    private $ville_etape;
    private $pdo;


    public function __construct($id_etape, $id_trajet, $ville_etape)
    {
        $this->id_etape = $id_etape;
        $this->id_trajet = $id_trajet;
        $this->ville_etape = $ville_etape;

        $this->pdo = Database::getInstance();

    }

    // Getters
    public function getIdEtape()
    {
        return $this->id_etape;
    }

    public function getIdTrajet()
    {
        return $this->id_trajet;
    }

    public function getVilleEtape()
    {
        return $this->ville_etape;
    }



    public function setVilleEtape($ville_etape)
    {
        $this->ville_etape = $ville_etape;
    }

    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    }

    public function CreateEtape(Etape $Etape)
    {
        try {
            $query = 'INSERT INTO public.etapes( id_trajet, ville_etape)
	       VALUES (:id_trajet, :ville_etape )';

            $stmt = $this->pdo->prepare($query);

          $stmt->execute([
                'id_trajet'=>$Etape->getIdTrajet(),
                'ville_etape' => $Etape->getVilleEtape()
            ]);
            
            return true;

        } catch (PDOException $e) {
            error_log("Error creating medecin profile: " . $e->getMessage());
            return false;
        }
    }

    public function AllEtapes($id)
    {
        try{
            $query = "SELECT * 
                    FROM etapes E
                        JOIN villes V ON E.ville_etape = V.id_ville
                    WHERE id_trajet = :id_trajet
                    ORDER BY ordre ASC";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['id_trajet' => $id]);
            $etapes = $stmt->fetchAll();
            return $etapes;
        }catch (PDOException $e){
            error_log("Error getting etapes: " . $e->getMessage());
        }
    }
}
?>