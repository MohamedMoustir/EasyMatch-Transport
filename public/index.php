<<<<<<< .merge_file_wK0iaM
<?php
define('BASEURL', '/EasyMatch-Transport');
define('ROOT', dirname(__FILE__));

require_once 'Core/Router.php';

$router = new Router();
$router->loadController();
=======
<?php 
require_once '../Core/Router.php';
require_once '../Core/init.php';

$Router = new Router;
$Router->loadController();
>>>>>>> .merge_file_yovIQo
