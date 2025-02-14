<?php

require_once 'User.php';

class Conducteur extends User{
    private $permis;

    public function __construct($id_user, $nom, $prenom, $phone, $email, $password, $role, $date_creation, $status, $isVerified,$permis){
        parent::__construct($id_user, $nom, $prenom, $phone, $email, $password, $role, $date_creation, $status, $isVerified);
        $this->permis = $permis;
    }
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

    public function get($id){
        try{
            $query = "SELECT *
                    FROM conducteurs C 
                    JOIN users U ON U.id_user = C.id_conducteur
                    WHERE id_conducteur = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $conducteur = new Self($result['id_conducteur'],$result['nom'],$result['prenom'],$result['phone'],$result['email'],$result['password'],$result['role'],$result['date_creation'],$result['status'],$result['isVerified'],$result['permis']);
            return $conducteur ;
        }catch(Exception $e){
            error_log("Erreur lors de la récupération de l'annonce: " . $e->getMessage());
        }
    }
}




