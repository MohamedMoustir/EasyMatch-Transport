<?php
require_once __DIR__ . '/../../Core/Database.php';

class User {
    protected $pdo;
<<<<<<< HEAD
    protected ?int $id_user;
    protected ?string $nom;
    protected ?string $prenom;
    protected ?string $email;
    protected ?string $phone;
    protected ?string $password;
    protected ?string $role;
    protected ?string $date_creation;
    protected ?string $status = 'Actif';
    protected ?bool $isVerified = false;

//constructor
    public function __construct($id_user, $nom, $prenom, $phone, $email, $password, $role, $date_creation, $status, $isVerified) {
=======
    private $id_user;
    private $nom;
    private $prenom;
    private $phone;
    private $email;
    private $password;
    private $role;
    private $date_creation;
    private $status;
    private $isVerified;

    // Constructeur
    public function __construct($nom, $prenom, $phone, $email, $password, $role, $date_creation = null, $status = 1, $isVerified = 0, $id_user = null) {
>>>>>>> 92a25483c26eca48e0f3bb9052a9b2c5f7daef76
        $this->pdo = Database::getInstance();
        $this->id_user = $id_user;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
<<<<<<< HEAD
        $this->date_creation = $date_creation;
=======
        $this->date_creation = $date_creation ?? date('Y-m-d H:i:s');
>>>>>>> 92a25483c26eca48e0f3bb9052a9b2c5f7daef76
        $this->status = $status;
        $this->isVerified = $isVerified;
    }

<<<<<<< HEAD
//getter
    public function getId_user() {
        return $this->id_user;
    }
    public function getNom() {
        return $this->nom;
    }
    public function getPrenom() {
        return $this->prenom;
    }
    public function getPhone() {
        return $this->phone;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getRole() {
        return $this->role;
    }
    public function getDate_creation() {
        return $this->date_creation;
    }
    public function getStatus() {
        return $this->status;
    }
    public function getIsVerified() {
        return $this->isVerified;
    }
    //setter
    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    public function setPhone($phone) {
        $this->phone = $phone;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function setRole($role) {
        $this->role = $role;
    }
    public function setDate_creation($date_creation) {
        $this->date_creation = $date_creation;
    }
    public function setStatus($status) {
        $this->status = $status;
    }
    public function setIsVerified($isVerified) {
        $this->isVerified = $isVerified;
    }
    //method

    public function register($nom, $prenom, $phone, $email, $password, $role) {
=======
    // Getters
    public function getId_user() { return $this->id_user; }
    public function getNom() { return $this->nom; }
    public function getPrenom() { return $this->prenom; }
    public function getPhone() { return $this->phone; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
    public function getRole() { return $this->role; }
    public function getDate_creation() { return $this->date_creation; }
    public function getStatus() { return $this->status; }
    public function getIsVerified() { return $this->isVerified; }

    // Méthodes
    public function register() {
>>>>>>> 92a25483c26eca48e0f3bb9052a9b2c5f7daef76
        try {
            $sql = "INSERT INTO users (nom, prenom, phone, email, password, role, date_creation, status, isVerified) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                $this->nom, $this->prenom, $this->phone, $this->email, 
                $this->password, $this->role, $this->date_creation, 
                $this->status, $this->isVerified
            ]);
        } catch (PDOException $e) {
            error_log("PDO Exception: " . $e->getMessage());
            return false;
        }
    }
<<<<<<< HEAD
=======

>>>>>>> 92a25483c26eca48e0f3bb9052a9b2c5f7daef76
    public function login($email, $password) {
        try {
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
<<<<<<< HEAD
    
=======
>>>>>>> 92a25483c26eca48e0f3bb9052a9b2c5f7daef76
            if ($user && password_verify($password, $user['password'])) {
                return $user;
            }
            return false;
        } catch (PDOException $e) {
<<<<<<< HEAD
            echo "Erreur PDO: " . $e->getMessage();
            return false;
        }
    }    
=======
            error_log("Erreur PDO: " . $e->getMessage());
            return false;
        }
    }
>>>>>>> 92a25483c26eca48e0f3bb9052a9b2c5f7daef76
}
?>
