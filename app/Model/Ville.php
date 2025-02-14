<?php
require_once __DIR__ . '/../../Core/Database.php';

class Ville
{
    private $idVille;
    private $nom;
    private $region = 'ff';
    private $lat;
    private $lon;
    private $pdo;





    public function __construct($idVille, $nom, $region, $lat, $lon)
    {

        $this->idVille = $idVille;
        $this->nom = $nom;
        $this->region = $region;
        $this->lat = $lat;
        $this->lon = $lon;
        $this->pdo = Database::getInstance();

    }

    // Getters
    public function getIdVille()
    {
        return $this->idVille;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getRegion()
    {
        return $this->region;
    }
    public function getLat()
    {
        return $this->lat;
    }

    public function getLon()
    {
        return $this->lon;
    }

    // Setters
    public function setIdVille($idVille)
    {
        $this->idVille = $idVille;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setRegion($region)
    {
        $this->region = $region;
    }
    public function setLat($lat)
    {
        $this->lat = $lat;
    }
    public function setLon($lon)
    {
        $this->lon = $lon;
    }



    public function CreateVille(ville $ville)
    {
        try {
            $query = 'INSERT INTO public.villes(id_ville, nom, region, lat, lon)
	VALUES (:id_ville, :nom, :region, :lat, :lon);';

            $stmt = $this->pdo->prepare($query);
         
            $stmt->execute([
                'id_ville' => $ville->getIdVille(),
                'nom' => $ville->getNom(),
                'region' => $ville->getRegion(),
                'lat' => $ville->getLat(),
                'lon' => $ville->getLon()
            ]);
            return true;

        } catch (PDOException $e) {
            error_log("Error creating medecin profile: " . $e->getMessage());
            return false;
        }
    }
}
