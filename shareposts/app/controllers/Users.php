<?php

    class Users extends Controller {
        
        public function __construct(){
            $this->userModel = $this->model('User');
            
        }
        
        public function register(){
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process The Form
                
                // Sanatize Post Data
                
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                // Init Data
                 $data = [
                    'name'                  => trim($_POST['name']),
                    'email'                 => trim($_POST['email']),
                    'password'              => trim($_POST['password']),
                    'confirm_password'      => trim($_POST['confirm_password']),
                    'name_err'              => '',
                    'email_err'             => '',
                    'password_err'          => '',
                    'confirm_password_err'  => ''
                ];
                
                // Validate Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please Enter Email';
                }else {
                    // Check Email
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email is already taken';
                    }
                }
                
                // Validate Name
                if(empty($data['name'])){
                    $data['name_err'] = 'Please Enter Name';
                }
                
                // Validate Password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please Enter Password';
                } elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password Must Be At Least 6 Characters';
                }
                
                // Validate Confrim Password
                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please Confirm Password';
                } else{
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Passwords Do Not Match';
                    }
                }
                
                // Make sure errors are empty
                
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    
                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    
                    // Register User
                    if($this->userModel->register($data)){
                        redirect('users/login');
                    }else{
                        die('Something Went Wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('users/register', $data);
                }
                
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
        
        public function login(){
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process The Form
                
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                // Init Data
                 $data = [
                    
                    'email'                 => trim($_POST['email']),
                    'password'              => trim($_POST['password']),
                    'email_err'             => '',
                    'password_err'          => '',

                ];
                
                
                // Validate Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please Enter Email';
                }
                
                // Validate Password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please Enter Password';
                }
                
                
                //Make Sure The Errors Are Empty
                if(empty($data['email_err']) && empty($data['password_err'])){
                    
                    die('SUCCESS');
                } else {
                    // Load view with errors
                    $this->view('users/login', $data);
                }
                
            } else {
                // Init Data
                $data = [
                    'email'                 => '',
                    'password'              => '',
                    'email_err'             => '',
                    'password_err'          => '',
                ];
                
                // Load View
                $this->view('users/login', $data);
                
                
            }
        }
    }