<?php
public function index(){

   
$controller = new Annonce();
$annonces = $controller->getAnnonces();

 require_once __DIR__ . '../../View/admin/annonces.php';
} 