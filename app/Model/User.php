<?php
require_once __DIR__ . '/../../Core/Database.php';

class User {
    protected $pdo;
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
        $this->pdo = Database::getInstance();
        $this->id_user = $id_user;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->date_creation = $date_creation ?? date('Y-m-d H:i:s');
        $this->status = $status;
        $this->isVerified = $isVerified;
    }

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

    public function login($email, $password) {
        try {
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($password, $user['password'])) {
                return $user;
            }
            return false;
        } catch (PDOException $e) {
            error_log("Erreur PDO: " . $e->getMessage());
            return false;
        }
    }
}
?>
