<?php

    class Users extends Controller {
        
        public function __constuct(){
            
        }
        
        public function register(){
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process The Form
            } else {
                // Init Data
                $data = [
                    'name'                  => '',
                    'email'                 => '',
                    'password'              => '',
                    'confirm_password'      => '',
                    'name_err'              => '',
                    'email_err'             => '',
                    'password_err'          => '',
                    'confirm_password_err'  => ''
                ];
                
                // Load View
                $this->view('users/register', $data);
                
                
            }
        }
    }