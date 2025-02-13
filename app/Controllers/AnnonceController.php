<?php
// require_once __DIR__.'./../../Core/Database.php';
require_once '../../Core/Database.php';

class AnnonceController {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    // Ajouter une annonce
    public function ajouterAnnonce($titre, $description, $prix, $conducteur_id) {
        $stmt = $this->db->prepare("INSERT INTO annonces (titre, description, prix, conducteur_id, date_creation) VALUES (?, ?, ?, ?, NOW())");
        return $stmt->execute([$titre, $description, $prix, $conducteur_id]);
    }

    // Récupérer toutes les annonces
    public function getAnnonces() {
        $stmt = $this->db->query("SELECT * FROM annonces ORDER BY date_publication DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$controller = new AnnonceController();

// Ajouter une annonce via POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouterAnnonce'])) {
    $controller->ajouterAnnonce($_POST['titre'], $_POST['description'], $_POST['prix'], $_POST['conducteur_id']);
    header("Location: ../views/annonces.php");
}
?>
