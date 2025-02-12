<?php
define('BASEURL', '/EasyMatch-Transport');
define('ROOT', dirname(__FILE__));

require_once 'Core/Router.php';

$router = new Router();
$router->loadController();