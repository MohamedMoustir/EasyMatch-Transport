<?php

require_once __DIR__ . '/../Model/Trajet.php';
require_once __DIR__ . '/../Model/Etapes.php';
require_once __DIR__ . '/../Model/Ville.php';
require_once __DIR__ . '/../Model/Annonce.php';

require_once __DIR__ . '/../../Core/Database.php';



class DetailsController{
      
    
    public function index() {
        require_once __DIR__ . "/../View/Expediteur/details.php";
    }
    
    public function steperDetiles(){
        header('Content-Type: application/json');
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    
        $id_expediteur = $_SESSION["id"] ?? 4;
    
        $Etape = new Etape('', '', '');
        $alletapes = $Etape->getEtapeById($id_expediteur);
    
        if (!is_array($alletapes)) {
            echo json_encode(['success' => false, 'message' => 'Invalid data format from getEtapeById']);
            exit;
        }
    
        echo json_encode(['success' => true, 'data' => $alletapes]);
        exit;
    }
    
}