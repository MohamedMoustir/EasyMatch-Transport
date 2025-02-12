
<?php 

spl_autoload_register(function($classname){

    require $filename = "../app/model/".ucfirst($classname).".php";
});

require 'config.php';
require 'init.php';
require 'Database.php';
require 'Model.php';
require 'Router.php';
require 'App.php';