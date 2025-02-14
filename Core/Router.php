    <?php
class Router {
    private $controller = 'HomeController'; 
    private $method = 'index';

    public function splitURL() {
        if (!isset($_GET['url']) || empty($_GET['url'])) {
            return [];
        }
        return explode("/", trim($_GET['url'], "/"));
    }

    public function loadController() {
        $URL = $this->splitURL();

        if (!empty($URL[0])) {
            $filename = "../app/Controllers/" . ucfirst($URL[0]) . ".php";
            if (file_exists($filename)) {
                require_once $filename;
                $this->controller = ucfirst($URL[0]);
                unset($URL[0]); 
            } else {
                require_once "../app/Controllers/_404.php";
                $this->controller = "_404";
            }
        }

        $controller = new $this->controller;

        if (!empty($URL[1]) && method_exists($controller, $URL[1])) {
            $this->method = $URL[1];
            unset($URL[1]);
        }

        call_user_func_array([$controller, $this->method], $URL);
    }
}
