<?php

class DetailsController{
    public function get($id){
        $annonce = new Annonce('', '', '', '', '');
        $annonces = $annonce->getAnnonce($id);
        $etape = new Etape('', '', '', '');
        $etapes = $etape->AllEtapes($annonces["id_trajet"]);
        require_once __DIR__ .'/../View/expediteur/details.php';
    }
}