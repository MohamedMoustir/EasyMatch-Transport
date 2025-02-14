<?php

class Test extends Controller {

    public function __construct() {
    }

    public function index() {
// $this->loadView('admin'.DS.'dashboard',[]);
// require_once './testView.php';
require __DIR__ . '/testView.php';
    }

}