<?php 

    /*
     * Base Controller
     * Loads the models and views
    */
    
    class Controller {
        
        //load model
        public function model($model){
            // Require Model File
            require_once '../app/models/' . $model . '.php';
            
            // Instatiate Model
            return new $model();
        }
        
        //load view
        public function view($view, $data = []){
           
           // Check for view file
           if(file_exists('../app/views' . $view . '.php')){
               // Require View File
            require_once '../app/views/' . $view . '.php';
           } else {
               // View Does Not Exists
               die('View does not exist');
           }
        }
    }