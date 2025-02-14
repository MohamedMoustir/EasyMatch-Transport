<?php
// require_once __DIR__.'./../../Core/Database.php';


require_once __DIR__ . '/../../framework/Controller.php';

class AnnonceController extends Controller {
    private $db;

    public function __construct() {
         $this->setModelInstance('annonce');
    }


    
public function index(){
      $annonce = new Annonce('','','','','');
    $annonce = $annonce->paginationAnnonce();
    
    require_once 'C:\wamp64\www\EasyMatch_Transports\app\View\admin\annonces.php';

}


public function getAllannoces(){
    $annonce = new Annonce('','','','','');
  $annonce = $annonce->paginationAnnonce();
//   $this->loadView('admin'.DS.'',[]);

}
public function getAllannocesAdmin(){
    
  $listAnnonces = $this->modelInstance->getListAnnoncesAdmin();
  $this->loadView('admin'.DS.'annonces',$listAnnonces);

}

public function delete($id){
    $annonce = new Annonce('','','','','');
    $annonce->deleteAnnonce($id);

    header("Location: /EasyMatch_Transports/public/AnnonceController/getAllannocesAdmin");
}





}
//     // Ajouter une annonce
//     public function ajouterAnnonce($titre, $description, $prix, $conducteur_id) {
//         $stmt = $this->db->prepare("INSERT INTO annonces (titre, description, prix, conducteur_id, date_creation) VALUES (?, ?, ?, ?, NOW())");
//         return $stmt->execute([$titre, $description, $prix, $conducteur_id]);
//     }

//     // Récupérer toutes les annonces
//     public function getAnnonces() {
//         $stmt = $this->db->query("SELECT * FROM annonces ORDER BY date_publication DESC");
//         return $stmt->fetchAll(PDO::FETCH_ASSOC);
//     }
// }


// // Ajouter une annonce via POST
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouterAnnonce'])) {
//     $controller->ajouterAnnonce($_POST['titre'], $_POST['description'], $_POST['prix'], $_POST['conducteur_id']);
//     header("Location: ../views/annonces.php");
// }


