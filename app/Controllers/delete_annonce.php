<?php
require_once __DIR__ . '/../../../Core/config.php';
require_once FRAMEWK_PATH . DS . 'Controller.php';
require_once APPLICATION_PATH . DS . 'Model' . DS . 'Annonce.php';

// Vérifier si l'ID est passé
if (isset($_GET['id'])) {
    $id_annonce = $_GET['id'];
    $annonce = new Annonce(); // Créer une instance de la classe Annonce
    
    if ($annonce->deleteAnnonce($id_annonce)) {
        header('Location: ' . URLROOT . 'admin/annonces.php?success=deleted');
        exit();
    } else {
        header('Location: ' . URLROOT . 'admin/annonces.php?error=notdeleted');
        exit();
    }
} else {
    header('Location: ' . URLROOT . 'admin/annonces.php?error=noid');
    exit();
}
