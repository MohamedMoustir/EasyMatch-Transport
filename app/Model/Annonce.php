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
    private $pages;



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

    public function getPages()
    {
        return $this->pages;
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

    public function paginationAnnonce()
    {
        try {


            $starts = 0;
            $rows_pre_page = 6;

            $recordQuery = "SELECT DISTINCT  COUNT(*)
                FROM public.annonces s
                JOIN conducteurs c ON s.id_conducteur = c.id_conducteur
                JOIN users u ON c.id_conducteur = u.id_user
                JOIN trajets t ON c.id_conducteur = t.id_conducteur
                JOIN villes v ON t.ville_depart = v.id_ville
                JOIN villes v_arrivee ON t.ville_arrivee = v_arrivee.id_ville
                where s.status ='En attente'";


            $filterQuery = "";

            if (isset($_GET['category']) && !empty($_GET['category'])) {
                $filterQuery = " AND categorieNom = :category";
            }




            if (isset($_GET['category']) && empty($_GET['category'])) {
                header('Location: ../pages/grid_cours.php?page-nr=1');
                exit();
            }

            $recordQuery .= $filterQuery;

            $stmt = $this->pdo->prepare($recordQuery);

            if (!empty($filterQuery)) {
                $stmt->bindParam(':category', $_GET['category'], PDO::PARAM_STR);
            }



            $stmt->execute();

            $record = $stmt->fetchColumn();
            $this->pages = ceil($record / $rows_pre_page);

            $page = 0;

            if (isset($_GET['page-nr'])) {
                $page = intval($_GET['page-nr']) - 1;
                $starts = $page * $rows_pre_page;
            }

            $query = " SELECT 
            a.id_annonce,
    u.nom, 
    ville_depart.nom AS ville_depart_nom, 
    v_arrivee.nom AS ville_arrivee_nom, 
    t.date_depart, 
    t.date_arrivee,
	etapes_ville.nom,
	a.couverture,
    ville_depart.lat as ville_departlat,
    ville_depart.lon as ville_departlon,
    v_arrivee.lat as v_arriveelat,
    v_arrivee.lon as v_arriveelon


FROM 
    public.annonces a
JOIN 
    conducteurs c ON a.id_conducteur = c.id_conducteur
JOIN 
    users u ON c.id_conducteur = u.id_user
JOIN 
    trajets t ON c.id_conducteur = t.id_conducteur
JOIN 
    villes ville_depart ON t.ville_depart = ville_depart.id_ville
JOIN 
    villes v_arrivee ON t.ville_arrivee = v_arrivee.id_ville
JOIN 
    etapes e ON t.id_trajet = e.id_trajet
JOIN 
    villes etapes_ville ON etapes_ville.id_ville = e.ville_etape  
WHERE 
    a.status = 'En attente' " . $filterQuery . "
          ORDER BY id_annonce DESC
          LIMIT :rows_pre_page OFFSET :starts";

            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':starts', $starts, PDO::PARAM_INT);
            $stmt->bindParam(':rows_pre_page', $rows_pre_page, PDO::PARAM_INT);

            if (!empty($filterQuery)) {
                $stmt->bindParam(':category', $_GET['category'], PDO::PARAM_STR);
            }


            $stmt->execute();
            $articleapproved = $stmt->fetchAll(PDO::FETCH_ASSOC);


            return $articleapproved;

        } catch (PDOException $e) {
            echo "Errors: " . $e->getMessage();
        }
    }
}


