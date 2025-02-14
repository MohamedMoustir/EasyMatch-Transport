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

    public function getEtapeById($id_expediteur){
        try {

            $qeury = 'SELECT 
    c.id_commande,
    vdp.nom AS ville_depart,
    vdp.lat AS ville_depart_lat,
    vdp.lon AS ville_depart_lon,
    var.nom AS ville_arrivee,
    var.lat AS ville_arrivee_lat,
    var.lon AS ville_arrivee_lon,
    u.nom AS expediteur_nom,
    u.prenom AS expediteur_prenom,
    u.phone AS expediteur_phone
FROM 
    commandes c
JOIN 
    villes vdp ON c.ville_depart_cmd = vdp.id_ville
JOIN 
    villes var ON c.ville_arrivee_cmd = var.id_ville
JOIN 
    marchandises m ON c.id_marchandise = m.id_marchandise
JOIN 
    users u ON m.id_expediteur = u.id_user
WHERE 
    m.id_expediteur = :id_expediteur ;  
';
            $stmt = $this->pdo->prepare($qeury);
            $stmt->bindParam(':id_expediteur', $id_expediteur, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        } catch (\Throwable $e) {
            error_log("Error creating medecin profile: " . $e->getMessage());
            return false;
        } 
    }
}
?>