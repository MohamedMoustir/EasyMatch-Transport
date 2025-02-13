<?php 

require_once "../Core/Router.php";
require_once "../app/Controllers/ConducteurController.php";
require_once '../app/controllers/HomeController.php';
require_once '../app/Controllers/AnnonceController.php';

$Router = new Router;
$Router->loadController();