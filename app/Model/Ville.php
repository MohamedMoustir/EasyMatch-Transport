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

    public function getAllville($id_ville)
    {
        try {

            $qeury = 'SELECT u.id_conducteur ,vd.lat  as ville_depart_lat ,vd.lon as ville_depart_lon ,
vr.lat  as ville_arrivee_lat ,vr.lon as ville_arrivee_lon,
vd.nom as depart , vr.nom as arrivee, v.nom as etape ,v.lat as lat_etape , v.lon as lon_etape 
from public.conducteurs u
JOIN trajets s ON u.id_conducteur = s.id_conducteur
Join villes vd on s.ville_depart = vd.id_ville
Join villes vr on s.ville_arrivee = vr.id_ville
join etapes e on e.id_trajet = s.id_trajet
Join villes v on e.ville_etape = v.id_ville
where u.id_conducteur= :id_ville';
            $stmt = $this->pdo->prepare($qeury);
            $stmt->bindParam(':id_ville', $id_ville, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        } catch (\Throwable $e) {
            error_log("Error creating medecin profile: " . $e->getMessage());
            return false;
        }
    }

    public function CreateVille(ville $ville)
    {
        try {

            $query = 'INSERT INTO public.villes(id_ville, nom, region, lat, lon)
	VALUES (:id_ville, :nom, :region, :lat, :lon)';

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
