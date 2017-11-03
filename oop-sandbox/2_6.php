<?php

    class User {
        protected $name;
        protected $age = 31;
        
        public function __construct($name, $age){
            $this->name = $name;
            $this->age = $age;
        }
    }
    
    class Customer extends User{
        
        private $balance;
        
        public function __construct($name, $age, $balance){
            
            parent::__construct($name, $age);
            $this->balance = $balance;
        }
        
        public function pay($amount){
            return $this->name . ' paid $' . $amount;
        }
        
        public function __getBalance(){
            return $this->balance;
        }
        
        public function remainingBalance($amount){
            return $this->balance - $amount;
        }
    }
    
    $customer1 = new Customer('Amber', 33, 500);
    
    
    $amount = 100;
    
    echo 'Starting Balance: $' . $customer1->__getBalance();
    echo '<br>';
    echo $customer1->pay($amount);
    echo '<br>';
    echo 'Remaining Balance: $' . $customer1->remainingBalance($amount);