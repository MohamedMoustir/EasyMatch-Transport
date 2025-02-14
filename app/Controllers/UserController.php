<?php
require_once __DIR__ . '/../../framework/Controller.php';
require_once __DIR__ . '/../Model/User.php'; // Correct the path to the User model

class UserController extends Controller {
    private $db;

    public function __construct() {
        parent::__construct(); 
    }

    public function index() {
        $utilisateur = new User();
        $users = $utilisateur->getAllUsers();
        require_once __DIR__. '/../View/admin/users.php';
    }

    public function deleteUser($userId) {

        $this->modelInstance->deleteUser($userId); 
        header("Location: /EasyMatch_Transports/public/UserController/index"); 
    }

    public function suspendUser($userId) {
        $this->modelInstance->suspendUser($userId); 
        header("Location: /EasyMatch_Transports/public/UserController/index");
    }

    public function checkUser($userId) {
        $user = $this->modelInstance->checkUser($userId); 
        echo $user; 
    }
}

?>