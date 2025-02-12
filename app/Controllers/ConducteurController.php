<?php

require_once __DIR__ . '/../Model/Trajet.php';
require_once __DIR__ . '/../Model/Etapes.php';
require_once __DIR__ . '/../Model/Ville.php';
require_once __DIR__ . '/../../Core/Database.php';



class ConducteurController
{


    public function createVilleandEtap()
    {
// header('Content-Type: application/json');
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['Terminer'] ) {
              session_start();
            $ville_depart = isset($_POST["city"]) ? $_POST["city"] : null;
            $date_depart = isset($_POST["date_depart"]) ? $_POST["date_depart"] : null;
            $date_arrivee = isset($_POST["date_arrivee"]) ? $_POST["date_arrivee"] : null;
            $type_colis = isset($_POST["type"]) ? $_POST["type"] : null;
            $vehicule = isset($_POST["véhicule"]) ? $_POST["véhicule"] : null;
            $ville_etape = isset($_POST["destination"]) ? $_POST["destination"] : null;
            $ordre = isset($_POST["ordre"]) ? intval($_POST["ordre"]) : null;
            $ville_arrivee = isset($_POST["ville_arrivee"]) ? $_POST["ville_arrivee"] : null;
            $conducteur_id = isset($_SESSION["id"]) ? $_SESSION["id"] : 2;

            $parts = explode(",", $ville_depart);
            $ville_depart_lat = $parts[0];
            $ville_depart_lon = $parts[1];
            $ville_depart_nom = $parts[2];
            $id_parts = $parts[3];

          
            $partss = explode(",", $ville_arrivee);
            $ville_arrivee_lat = $partss[0];
            $ville_arrivee_lon = $partss[1];
            $ville_arrivee_nom = $partss[2];
            $id_partss = $partss[3];
           
            $etape = explode(",", $ville_etape);
            $ville_etape_lat = $etape[0];
            $ville_etape_lon = $etape[1];
            $ville_etape_nom = $etape[2];
            $id_etape = $etape[3];


            $Trajet = new Trajet('', $id_parts, $id_partss, $date_depart, $date_arrivee, $conducteur_id);

           
            $lastInsertId = $Trajet->CreateTrajet($Trajet);
 echo "<pre>";
            print_r($lastInsertId);
            echo "</pre>";

            $Etape = new Etape('', $lastInsertId, $id_etape, $ordre);
            $Etape->CreateEtape($Etape);

            $depart = new Ville($id_parts, $ville_depart_nom, '', $ville_depart_lat, $ville_depart_lon);
            $arrivee = new Ville($id_partss, $ville_arrivee_nom, '', $ville_arrivee_lat, $ville_arrivee_lon);
            $etape = new Ville($id_etape, $ville_etape_nom, '', $ville_etape_lat, $ville_etape_lon);


            $depart->CreateVille($depart);
            $arrivee->CreateVille($arrivee);
            $etape->CreateVille($etape);
            
            // echo "<pre>";
            // print_r($lastInsertId);
            // echo "</pre>";
            require "../app/View/conducteur/dashbard.php";
        }
    }
    public function add()
    {
        echo "Ajout d'un conducteur";
    }
}
