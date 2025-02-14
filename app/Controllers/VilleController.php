<?php
require_once __DIR__ . '/../Model/Ville.php';

class VilleController
{


    public function getvilles()
    {
        $driver_id = isset($_GET["driver_id"]) ? $_GET["driver_id"] : null;
        $villes = new ville('', '', '', '', '');
        $allvile = $villes->getAllville($driver_id);
        require_once __DIR__ . '/../View/Expediteur/details.php';

    }
}