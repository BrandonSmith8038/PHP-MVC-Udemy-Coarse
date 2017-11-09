<?php

    class Posts extends Controller {
        
        public function __construct(){
            print_r(isLoggedIn);
            if(!isLoggedIn()){
                 redirect('users/login');
            }
        }
        
        public function index(){
            $data = [];
            
            $this->view('posts/index', $data);
        }
        
        
    }