<?php

    class Pages extends Controller {
        
        public function __construct(){
            
        }
        
        public function index(){
            $this->view('Hello');
        }
        
        public function about($name){
            echo 'Hello ' . $name . ' This is the About Page';
        }
    }