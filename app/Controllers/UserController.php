<?php
session_start();
require_once '../../Core/Controller.php';
require_once  '../Model/User.php';
require_once '../../Core/Database.php';
require_once '../../Core/Router.php';

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
            
            if ($this->userModel->register($nom, $prenom, $phone, $email, $password, $role)) {
                $_SESSION['success'] = "Inscription réussie !";
                header('location:../../View/auth/login.html');
            } else {
                $_SESSION['error'] = "Une erreur s'est produite lors de l'inscription";
                header('location:../../View/auth/register.html');
            }
            exit();
        }
    }

    public function login() {  
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = ($_POST['email']);
            $password = $_POST['password'];
            $this->userModel = new User();
            $user = $this->userModel->login($email, $password);
            
            if ($user) {
                $_SESSION['user'] = $user;
                switch($user['role']) {
                    case 'Expediteur':
                        header('location:../../../index.html');
                        break;
                    case 'Conducteur':
                        header('location:../../../index.html');
                        break;
                }
            } else {
                $_SESSION['error'] = "Email ou mot de passe incorrect";
                header('location:../../View/auth/login.html');
            }
            exit();
        }
    }
}

$userController = new UserController();

if (isset($_POST['action'])) {
    switch($_POST['action']) {
        case 'add':
            $userController->add();
            break;
        case 'login':
            $userController->login();
            break;
    }
}
?>