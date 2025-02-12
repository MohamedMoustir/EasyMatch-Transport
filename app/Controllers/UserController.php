<?php
session_start();
require_once '../../Core/Controller.php';
require_once  '../Model/User.php';
require_once '../../Core/Database.php';
class UserController {
    use Controller;
    private User $userModel;

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = ($_POST['nom']);
            $prenom = ($_POST['prenom']);
            $phone = ($_POST['phone']);
            $email = ($_POST['email']);
            $password = $_POST['password']; 
            $role = $_POST['role'];
            $this->userModel = new User();
            
            error_log("Données reçues: " . json_encode($_POST));
    
            
            if ($this->userModel->register($nom, $prenom, $phone, $email, $password, $role)) {
                $_SESSION['success'] = "Inscription réussie !";
                error_log("Inscription réussie ");
            } else {
                $_SESSION['error'] = "Une erreur s'est produite lors de l'inscription";
                error_log("Échec de l'inscription pour $email");

            }
        }
    }
}
$user = new UserController();
$user->add();
?>