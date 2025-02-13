<?php 
require_once __DIR__ . '/../Model/Commande.php';
require_once __DIR__ . '/../Model/Marchandise.php';
require_once __DIR__ . '/../Model/Notification.php';


class Commande {
    public function createCommande()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["city"]) {
            session_start();


            $ville_depart = isset($_POST["Ville_départ"]) ? $_POST["Ville_départ"] : null;
            $Ville_arrivee = isset($_POST["Ville_arrivee"]) ? $_POST["Ville_arrivee"] : null;
            $driver_id = isset($_POST["driver_id"]) ? $_POST["driver_id"] : null;
            $Dimensions = isset($_POST["Dimensions"]) ? $_POST["Dimensions"] : null;



    //         $conducteur_id = isset($_SESSION["id"]) ? $_SESSION["id"] : 2;

    //         $parts = explode(",", $ville_depart);
    //         $ville_depart_lat = $parts[0];
    //         $ville_depart_lon = $parts[1];
    //         $ville_depart_nom = $parts[2];
    //         $id_parts = $parts[3];


    //         $partss = explode(",", $ville_arrivee);
    //         $ville_arrivee_lat = $partss[0];
    //         $ville_arrivee_lon = $partss[1];
    //         $ville_arrivee_nom = $partss[2];
    //         $id_partss = $partss[3];

    //         $Trajet = new Trajet('', $id_parts, $id_partss, $date_depart, $date_arrivee, $conducteur_id);

    //         $lastInsertId = $Trajet->CreateTrajet($Trajet);

            
    //         $etapes = explode(";", $ville_etape);

    //         foreach ($etapes as $etape) {
    //             $etapeDetails = explode(",", $etape);

    //             if (count($etapeDetails) >= 4) {

    //                 $ville_etape_lat = $etapeDetails[0];
    //                 $ville_etape_lon = $etapeDetails[1];
    //                 $ville_etape_nom = $etapeDetails[2];
    //                 $id_etape = $etapeDetails[3];

    //                 $Etape = new Etape('', $lastInsertId, $id_etape, $ordre);
    //                 $Etape->CreateEtape($Etape);


    //                 $etapeVille = new Ville($id_etape, $ville_etape_nom, '', $ville_etape_lat, $ville_etape_lon);
    //                 $etapeVille->CreateVille($etapeVille);

    //             }
    //         }

    //         $depart = new Ville($id_parts, $ville_depart_nom, '', $ville_depart_lat, $ville_depart_lon);
    //         $arrivee = new Ville($id_partss, $ville_arrivee_nom, '', $ville_arrivee_lat, $ville_arrivee_lon);
    //         $depart->CreateVille($depart);
    //         $arrivee->CreateVille($arrivee);

    //         // $Etape = new Etape('', $lastInsertId, $id_etape, $ordre);
    //         // $Etape->CreateEtape($Etape);

    //         $etape = new Ville($id_etape, $ville_etape_nom, '', $ville_etape_lat, $ville_etape_lon);





    //         $Annonce = new Annonce($tilte, $description, $avatar, '', $conducteur_id);

    //         if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {

    //             $permited = ['jpg', 'png', 'jpeg', 'gif'];
    //             $file_name = $_FILES['avatar']['name'];
    //             $file_temp = $_FILES['avatar']['tmp_name'];
    //             $div = explode('.', $file_name);
    //             $file_ext = strtolower(end($div));

    //             if (!in_array($file_ext, $permited)) {
    //                 throw new Exception("Format de fichier non autorisé.");
    //             }

    //             $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    //             $imageCours = "../public/assets/images/" . $unique_image;

    //             if (move_uploaded_file($file_temp, $imageCours)) {
    //                 $Annonce->setCouverture($imageCours);
    //             } else {
    //                 throw new Exception("Erreur lors du téléchargement de l'image.");
    //             }
    //         } else {
    //             throw new Exception("Aucune image téléchargée.");
    //         }


    //         $ee = $Annonce->CreateAnnonce($Annonce);

    //         //    echo '<pre>';
    //         //    var_dump($etape);
    //         //    echo '</pre>';

    //         require "../app/View/conducteur/dashbard.php";

    //         // header("Location: " . $_SERVER['PHP_SELF']);

    //     }
    //     exit();
    // }
 
        }}
}