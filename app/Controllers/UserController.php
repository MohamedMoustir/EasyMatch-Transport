<?php
require_once __DIR__ . '/../../framework/Controller.php';
require_once __DIR__ . '/../Model/User.php'; // Include the User model
require_once __DIR__ . '/../Model/Evaluation.php'; // Include the User model

class UserController extends Controller {
    private $userModel;
    private $evaluationModel;

    public function __construct() {
        parent::__construct(); 
        $this->userModel = new User(); // Initialize the User model
        $this->evaluationModel = new Evaluation(); // Initialize the User model
    }

    public function index() {
        $users = $this->userModel->getAllUsers(); // Use the model instance to get all users
        require_once VIEWS_PATH . DS . 'admin' . DS . 'users.php'; // Correct the path to the view file
    }
    public function viewEvaluations($userId) {
        $evaluations = $this->evaluationModel->getEvaluationsByUserId($userId);
        require_once __DIR__.'/../View/admin/ervaluation.php'; // Load the view for evaluations
    }

    public function deleteUser($userId) {
        $this->userModel->deleteUser($userId); 
        header("Location: /EasyMatch_Transports/public/UserController/index"); 
    }

    public function suspendUser($userId) {
        $this->userModel->suspendUser($userId); 
        header("Location: /EasyMatch_Transports/public/UserController/index");
    }

    public function validateUser($userId) {
        $this->userModel->validateUser($userId); 
        header("Location: /EasyMatch_Transports/public/UserController/index");
    }

    public function verifyUser($userId) {
        $this->userModel->verifyUser($userId); 
        header("Location: /EasyMatch_Transports/public/UserController/index");
    }

    public function checkUser($userId) {
        $user = $this->userModel->checkUser($userId); 
        echo $user; 
    }
    
}
?>