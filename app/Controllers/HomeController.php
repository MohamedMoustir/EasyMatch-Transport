<?php 
class HomeController
{
    public function index()
    {

        $afficheAnnonce = new Annonce( '','','','','');
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $ville_arv=$_POST['ville_arv'];
            $ville_depart =$_POST['ville_depart'];
            $gridAnnonce = $afficheAnnonce->paginationFiltredAnnonce($ville_depart,$ville_arv);
            $pages = $afficheAnnonce->getPages();
    
    
            $showAllCity = new ville('','','','','') ;
            $results= $showAllCity->showAllCity();
    
    
            require_once  __DIR__ . '/../View/expediteur/AdFilter.php';
        } else {
            $gridAnnonce = $afficheAnnonce->paginationAnnonce();
            $pages = $afficheAnnonce->getPages();
            $showAllCity = new ville('','','','','') ;
            $results= $showAllCity->showAllCity();
    
    
            require_once  __DIR__ . '/../View/expediteur/index.php';
    
        }
        
    }
}