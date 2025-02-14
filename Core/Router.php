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
        
        if (empty($URL[0])) {
            $URL[0] = 'Home';
        }
    
        $filename = "../app/Controllers/" . ucfirst($URL[0]) . "Controller.php";
        if (file_exists($filename)) {
            require_once $filename;
            $this->controller = ucfirst($URL[0]) . "Controller";
            unset($URL[0]); 
        } else {
            require_once "../app/Controllers/_404.php";
            $this->controller = "_404";
        }
    
        try {
            $controller = new $this->controller();
            
            if (!empty($URL[1]) && method_exists($controller, $URL[1])) {
                $this->method = $URL[1];
                unset($URL[1]);
            }
    
            call_user_func_array([$controller, $this->method], array_values($URL));
        } catch (Exception $e) {
            error_log($e->getMessage());
            require_once "../app/Controllers/_404.php";
        }
    }
}
