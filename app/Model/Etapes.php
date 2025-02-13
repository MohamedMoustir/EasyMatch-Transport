<?php
require_once __DIR__ . '/../../Core/Database.php';

class Etape
{
    private $conn;
    private $table = "etapes";

    private $id_etape;
    private $id_trajet;
    private $ville_etape;
    private $ordre;
    private $pdo;


    public function __construct($id_etape, $id_trajet, $ville_etape, $ordre)
    {
        $this->id_etape = $id_etape;
        $this->id_trajet = $id_trajet;
        $this->ville_etape = $ville_etape;
        $this->ordre = $ordre;
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

    public function getOrdre()
    {
        return $this->ordre;
    }



    public function setVilleEtape($ville_etape)
    {
        $this->ville_etape = $ville_etape;
    }

    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    }

    public function CreateEtape( $Etape)
    {
        try {
            $query = 'INSERT INTO public.etapes( id_trajet, ville_etape, ordre)
	       VALUES (:id_trajet, :ville_etape, :ordre);';

            $stmt = $this->pdo->prepare($query);

          $stmt->execute([
                'id_trajet'=>$Etape->getIdTrajet(),
                'ville_etape' => $Etape->getVilleEtape(),
                'ordre' => $Etape->getOrdre()
            ]);
            
            return true;

        } catch (PDOException $e) {
            error_log("Error creating medecin profile: " . $e->getMessage());
            return false;
        }
    }
}
?>