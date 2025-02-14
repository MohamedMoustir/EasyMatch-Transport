<?php

require_once __DIR__ . '/../Model/Trajet.php';
require_once __DIR__ . '/../Model/Etapes.php';
require_once __DIR__ . '/../Model/Ville.php';
require_once __DIR__ . '/../Model/Annonce.php';

require_once __DIR__ . '/../../Core/Database.php';



class ConducteurController
{


    public function createVilleandEtap()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["city"]) {
            session_start();

            $ville_depart = isset($_POST["city"]) ? $_POST["city"] : null;
            $tilte = isset($_POST["tilte"]) ? $_POST["tilte"] : null;
            $description = isset($_POST["description"]) ? $_POST["description"] : null;
            $avatar = isset($_FILES["avatar"]) ? $_FILES["avatar"] : null;
            $date_depart = isset($_POST["date_depart"]) ? $_POST["date_depart"] : null;
            $date_arrivee = isset($_POST["date_arrivee"]) ? $_POST["date_arrivee"] : null;
            $type_colis = isset($_POST["type"]) ? $_POST["type"] : null;
            $vehicule = isset($_POST["véhicule"]) ? $_POST["véhicule"] : null;
            $ville_etape = isset($_POST["destination"]) ? $_POST["destination"] : null;
            // $ordre = isset($_POST["ordre"]) ? intval($_POST["ordre"]) : null;
            $ville_arrivee = isset($_POST["ville_arrivee"]) ? $_POST["ville_arrivee"] : null;
            $conducteur_id = isset($_SESSION["id"]) ? $_SESSION["id"] : 3;

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

            $Trajet = new Trajet('', $id_parts, $id_partss, $date_depart, $date_arrivee, $conducteur_id);

            $lastInsertId = $Trajet->CreateTrajet($Trajet);

            foreach ($ville_etape as $etape) {
                $etapeDetails = explode(",", $etape);

                if (count($etapeDetails) ) {
                    $ville_etape_lat = $etapeDetails[0];
                    $ville_etape_lon = $etapeDetails[1];
                    $ville_etape_nom = $etapeDetails[2];
                    $id_etape = $etapeDetails[3];

                    $Etape = new Etape($id_etape, $lastInsertId, $id_etape);
                    $Etape->CreateEtape($Etape);

                    $etapeVille = new Ville($id_etape, $ville_etape_nom, '', $ville_etape_lat, $ville_etape_lon);
                    $etapeVille->CreateVille($etapeVille);
                } else {
                    error_log("Erreur: Format d'étape incorrect - " . json_encode($etapeDetails));
                }
            }


            $depart = new Ville($id_parts, $ville_depart_nom, '', $ville_depart_lat, $ville_depart_lon);
            $arrivee = new Ville($id_partss, $ville_arrivee_nom, '', $ville_arrivee_lat, $ville_arrivee_lon);
            $depart->CreateVille($depart);
            $arrivee->CreateVille($arrivee);








            $Annonce = new Annonce($tilte, $description, $avatar, '', $conducteur_id);

            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {

                $permited = ['jpg', 'png', 'jpeg', 'gif'];
                $file_name = $_FILES['avatar']['name'];
                $file_temp = $_FILES['avatar']['tmp_name'];
                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));

                if (!in_array($file_ext, $permited)) {
                    throw new Exception("Format de fichier non autorisé.");
                }

                $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                $imageCours = "../public/assets/images/" . $unique_image;

                if (move_uploaded_file($file_temp, $imageCours)) {
                    $Annonce->setCouverture($imageCours);
                } else {
                    throw new Exception("Erreur lors du téléchargement de l'image.");
                }
            } else {
                throw new Exception("Aucune image téléchargée.");
            }


            $ee = $Annonce->CreateAnnonce($Annonce);

            require "../app/View/conducteur/dashbard.php";

            // header("Location: " . $_SERVER['PHP_SELF']);

        }
        exit();
    }

    public function stepper()
    {
        header('Content-Type: application/json');
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $driver_id = isset($_SESSION["id"]) ? $_SESSION["id"] : 3;

        $afficheAnnonce = new Annonce('', '', '', '', '');
        $gridAnnonce = $afficheAnnonce->paginationAnnonce($driver_id);

        if (!is_array($gridAnnonce)) {
            echo json_encode(['success' => false, 'message' => 'Invalid data format from paginationAnnonce']);
            exit;
        }

        echo json_encode(['success' => true, 'data' => $gridAnnonce]);
        exit;
    }

    public function index()
    {
        require '../app/View/conducteur/steppper.php';
    }

    {
        $afficheAnnonce = new Annonce('','','','','');
        $gridAnnonce = $afficheAnnonce->paginationAnnonce();

        // header('Content-Type: application/json');
        echo json_encode(['success' => true, 'data' => $gridAnnonce]);

    }

