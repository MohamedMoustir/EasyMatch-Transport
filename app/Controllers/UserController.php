<?php
session_start();
require_once __DIR__ . '/../Model/User.php'; 
require_once __DIR__ . '/../../Core/Database.php';
require_once __DIR__ . '/../../Core/Controller.php';
require_once __DIR__ . '/../../Core/Router.php';

class UserController {
    use Controller;
    private User $userModel;

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nom']);
            $prenom = trim($_POST['prenom']);
            $phone = trim($_POST['phone']);
            $email = trim($_POST['email']);
            $password = $_POST['password']; 
            $role = $_POST['role'];

            // Vérification des champs vides
            if (empty($nom) || empty($prenom) || empty($phone) || empty($email) || empty($password) || empty($role)) {
                $_SESSION['error'] = "Tous les champs sont obligatoires.";
                header('location: ../../View/auth/register.php');
                exit();
            }

            // Vérification de l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = "Email non valide.";
                header('location: ../../View/auth/register.php');
                exit();
            }

            // Hashage du mot de passe
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Création de l'utilisateur
            $this->userModel = new User($nom, $prenom, $phone, $email, $hashedPassword, $role);
            $this->userModel->register();
            // if ($this->userModel->register()) {
            //     $_SESSION['success'] = "Inscription réussie.";
            //     require_once __DIR__ . '/../View/auth/login.php';
            // } else {
            //     $_SESSION['error'] = "Erreur lors de l'inscription.";
            //     header('location: ../../View/auth/register.php');
            // }
            // exit();
        }
        require_once __DIR__ . '../View/auth/login.php';
    }

    public function login() {  
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            // Vérification des champs
            if (empty($email) || empty($password)) {
                $_SESSION['error'] = "Email et mot de passe sont obligatoires.";
                header('location: ../../View/auth/login.php');
                exit();
            }

            $this->userModel = new User("", "", "", $email, "", "");

            $user = $this->userModel->login($email, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                $_SESSION['nom'] = $user['nom'];
                $_SESSION['prenom'] = $user['prenom'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['phone'] = $user['phone'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['date_creation'] = $user['date_creation'];
                $_SESSION['id'] = $user['id_user'];
                
                switch($user['role']) {
                    case 'Expediteur':
                        header('location: ../HomeController.php');
                        break;
                    case 'Conducteur':
                        header('location: ../../View/conducteur/dashboard.php');
                        break;
                    default:
                        $_SESSION['error'] = "Rôle non valide.";
                        header('location: ../../View/auth/login.php');
                }
            } else {
                $_SESSION['error'] = "Email ou mot de passe incorrect.";
                header('location: ../../View/auth/login.php');
            }
            exit();
        }
        require_once __DIR__ . '/../View/auth/login.php';
    }
}
?>
