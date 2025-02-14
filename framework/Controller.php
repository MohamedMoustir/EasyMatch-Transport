<?php

  /**
   * Controller class : base controller
   */
  class Controller{

    protected $modelInstance = null;
    function __construct(){

    }
    
    /**
     * Instantiate model
     * 
     * @param string $model
     * @return void
     * 
     */

    public function setModelInstance($model){
      if(file_exists(APPLICATION_PATH.DS.'Model'.DS.ucwords($model).'.php')){
        require_once APPLICATION_PATH.DS.'Model'.DS.ucwords($model).'.php';
        $this->modelInstance = new $model();
      }else die("Err : model '$model' does not exist <br><a href='".URLROOT."'>Go back</a>");
    }

    /**
     * Load view
     * 
     * @param string $viewName
     * @param array $data : data comes from db
     * 
     */

    // public function loadView($viewName,$data = []){
    //   // --
    //   if(file_exists(APPLICATION_PATH.DS.'View'.DS.$viewName.'.php')) 
    //   require_once APPLICATION_PATH.DS.'View'.DS.$viewName.'.php';
    //   else die("Err : view '$viewName' does not exist <br><a href='".URLROOT."'>Go back</a>");
    //   //--
    // }

    public function loadView($viewName, $data = []) {
      // Use APPLICATION_PATH constant that points to the app directory
      $viewPath = APPLICATION_PATH . DS . 'View' . DS . $viewName . '.php';
      
      // Debug path (you can remove this later)
      if (!file_exists($viewPath)) {
          die("Error: Cannot find view at: " . $viewPath . 
              "<br>Current APPLICATION_PATH: " . APPLICATION_PATH .
              "<br><a href='" . URLROOT . "'>Go back</a>");
      }
      
      // Extract data if any
      if (!empty($data)) {
          extract($data);
      }
      
      require_once $viewPath;
  }

    /**
     * Redirect method
     * @param $path to redirect to
     * 
     */
     public function redirect($path){
      if (!empty($path)) {
        header('location:'.$path);
      }
    }


  

    
  }
