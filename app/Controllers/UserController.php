<?php
<<<<<<< .merge_file_m5Yv51
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
    public function  login ($email, $password) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = ($_POST['email']);
            $password = $_POST['password'];
            $this->userModel = new User();
            $user = $this->userModel->login($email, $password);
            if ($user) {
                $_SESSION['user'] = $user;
                header('location:../../View/dashboard.php');
            } else {
                $_SESSION['error'] = "Email ou mot de passe incorrect";
                header('location:../../View/auth/login.html');
            }
        }
    }
}
$user = new UserController();
$user->add();
?>
=======


class 
>>>>>>> .merge_file_GCtona
