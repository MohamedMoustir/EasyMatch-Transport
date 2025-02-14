<?php
class Router {

    private $controller = 'HomeController'; 
    private $method = 'index';    

    public function splitURL() {
        $URL = $_GET['url'] ?? ''; 
        $URL = explode("/", trim($URL, "/"));
        return $URL;
    }

    public function loadController() {
        $URL = $this->splitURL();

        $filename = "../app/Controllers/" . ucfirst($URL[0]) . ".php";
        if (file_exists($filename)) {
            require_once  $filename;
            $this->controller = ucfirst($URL[0]);
            unset($URL[0]); 
        } else {
            require_once  "../app/Controllers/_404.php";
            $this->controller = "_404";
        }
        $controller = new $this->controller;
        print_r($controller) ;

        if (!empty($URL[1]) && method_exists($controller, $URL[1])) {
            $this->method = $URL[1];
            unset($URL[1]);
        }

        call_user_func_array([$controller, $this->method], $URL);
    }
}
