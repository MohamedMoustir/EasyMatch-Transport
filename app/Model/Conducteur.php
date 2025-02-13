<?php



class Conducteur {
    
    public function index() {
        require_once "../app/view/dashboard.php";
    }

    public function steppper() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $city = $_POST['city'];
            $capacité = $_POST['capacity'];
            $colis_type = $_POST['colis_type'];

            echo "Données enregistrées : " . $city . ", " . $capacité . ", " . $colis_type;
        }
    }
}




