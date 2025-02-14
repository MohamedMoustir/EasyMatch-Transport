<!-- <?php
// session_start();
// require_once '../../Core/Controller.php';
// require_once  '../Model/User.php';
// require_once '../../Core/Database.php';
// class UserController {
//     use Controller;
//     private User $userModel;

//     public function add() {
//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//             $nom = ($_POST['nom']);
//             $prenom = ($_POST['prenom']);
//             $phone = ($_POST['phone']);
//             $email = ($_POST['email']);
//             $password = $_POST['password']; 
//             $role = $_POST['role'];
//             $this->userModel = new User();
//             header('location:../../View/auth/login.html');
    
            
//             if ($this->userModel->register($nom, $prenom, $phone, $email, $password, $role)) {
//                 $_SESSION['success'] = "Inscription réussie !";
//             } else {
//                 $_SESSION['error'] = "Une erreur s'est produite lors de l'inscription";

//             }
//         }
//     }
//     public function  login ($email, $password) {
//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//             $email = ($_POST['email']);
//             $password = $_POST['password'];
//             $this->userModel = new User();
//             $user = $this->userModel->login($email, $password);
//             if ($user) {
//                 $_SESSION['user'] = $user;
//                 header('location:../../View/dashboard.php');
//             } else {
//                 $_SESSION['error'] = "Email ou mot de passe incorrect";
//                 header('location:../../View/auth/login.html');
//             }
//         }
//     }
   
    
//         public function __construct() {
//             $this->userModel = new User();
//         }
    
//         // 🔍 Get all users for admin panel
//         public function index() {
//             $users = $this->userModel->getAllUsers();
//             require_once __DIR__ . '/../View/admin/users.php';
//         }
    
//         // ✅ Verify user (activate)
//         public function verify($id) {
//             $this->userModel->verifyUser($id);
//             header("Location: ../../View/admin/users.php");
//         }
    
//         // 🚫 Suspend user
//         public function suspend($id) {
//             $this->userModel->suspendUser($id);
//             header("Location: ../../View/admin/users.php");
//         }
    
//         // ❌ Delete user
//         public function delete($id) {
//             $this->userModel->deleteUser($id);
//             header("Location: ../../View/admin/users.php");
//         }
//     }
    
//     // Handle admin actions dynamically
//     if (isset($_GET['action']) && isset($_GET['id'])) {
//         $controller = new UserController();
//         $id = $_GET['id'];
    
//         if ($_GET['action'] === 'verify') {
//             $controller->verify($id);
//         } elseif ($_GET['action'] === 'suspend') {
//             $controller->suspend($id);
//         } elseif ($_GET['action'] === 'delete') {
//             $controller->delete($id);
//         }
//     }
    

// $user = new UserController();
// $user->add();

?> -->


