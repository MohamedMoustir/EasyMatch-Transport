<?php
require_once __DIR__ . '/../../framework/Controller.php';
require_once __DIR__ . '/../Model/Statistiques.php'; // Include the Statistiques model

class StatistiquesController extends Controller {
    private $statistiquesModel;

    public function __construct() {
        parent::__construct(); 
        $this->statistiquesModel = new Statistiques(); // Initialize the Statistiques model
    }

    public function index() {
        // $data = $this->statistiquesModel->getStats();
        require_once __DIR__ .'/../View/admin/statistiques.php'; // Fetch statistics data
         // Load the view
    }
}
?>

