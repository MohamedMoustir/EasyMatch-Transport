<?php 
 define('DS', DIRECTORY_SEPARATOR);
require_once "../Core/Router.php";
require_once "../app/Controllers/ConducteurController.php";
require_once '../app/Controllers/HomeController.php';
require_once '../app/Controllers/AnnonceController.php';

require_once '../Core/config.php';
require_once '../framework/Controller.php';
$Router = new Router;
$Router->loadController();

