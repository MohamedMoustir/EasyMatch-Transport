<?php 
class HomeController
{
    public function index()
    {
        $afficheAnnonce = new Annonce( '','','','','');
        $gridAnnonce = $afficheAnnonce->paginationAnnonce();

        $pages = $afficheAnnonce->getPages();

        require_once  __DIR__ . '/../../public/assets/index.php';

    }
}