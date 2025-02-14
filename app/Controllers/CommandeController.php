<?php
require_once __DIR__ . '/../Model/Commande.php';
require_once __DIR__ . '/../Model/Marchandise.php';
require_once __DIR__ . '/../Model/Notification.php';


class CommandeController
{
    public function createCommande()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();


            $ville_depart_cmd = isset($_POST["Ville_départ"]) ? $_POST["Ville_départ"] : null;
            $ville_arrivee_cmd = isset($_POST["Ville_arrivee"]) ? $_POST["Ville_arrivee"] : null;
            $id_conducteur = isset($_POST["driver_id"]) ? $_POST["driver_id"] : null;
            $Dimensions = isset($_POST["Dimensions"]) ? $_POST["Dimensions"] : null;
            $id_expediteur = isset($_SESSION["id"]) ? $_SESSION["id"] : 4;


            $Marchandise = new Marchandise($Dimensions, $id_expediteur);
            $id_marchandise = $Marchandise->Marchandise($Marchandise);

            $createCommande = new Commande($id_marchandise, $ville_depart_cmd, $ville_arrivee_cmd, $id_conducteur);
            $createCommande->createCommande($createCommande);

            $Notification = new Notification('Votre commande a été expédiée', 'Votre commande a été expédiée', $id_conducteur);
            $Notification->Notification($Notification);
          
           

            require_once __DIR__ . "/../View/Expediteur/details.php";



        }
    }


}
