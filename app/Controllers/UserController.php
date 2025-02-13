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
            header('location:../../View/auth/login.html');
    
            
            if ($this->userModel->register($nom, $prenom, $phone, $email, $password, $role)) {
                $_SESSION['success'] = "Inscription réussie !";
            } else {
                $_SESSION['error'] = "Une erreur s'est produite lors de l'inscription";

            }
        }
    }
}
$user = new UserController();
$user->add();
?>