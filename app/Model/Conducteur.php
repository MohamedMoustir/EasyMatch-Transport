<?php

require_once 'User.php';

class Conducteur extends User{
    
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

    public function getConducteur($id){
        try{
            $query = "SELECT *
                    FROM conducteurs
                    WHERE id_conducteur = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->execute();
            $stmt->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            error_log("Erreur lors de la récupération de l'annonce: " . $e->getMessage());
        }
    }
}




