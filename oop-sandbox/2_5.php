<?php 

    class User{
        private $name;
        private $age;
        
        public function __construct($name, $age){
            $this->name = $name;
            $this->age = $age;
        }
        
        public function getName(){
            return $this->name;
        }
        
        public function setName($name){
            $this->name = $name;
        }
        
        // __get MAGIC METHOD
        
        public function __get($property){
            if(property_exists($this, $property)){
                return $this->$property;
            }
        }
        
        // _set MAGIC METHOD
        
        public function __set($property, $value){
            if(property_exists($this, $property)){
                 $this->$property = $value;
            }
            return $this;
        } 
    }
    
    $user1 = new User('Brandon', 31);
    
    // echo $user1->getName();
    // echo '<br>';
    
    // $user1->setName('Amber');
    
    // echo $user1->getName();
    // echo '<br>';
    
    echo $user1->__get('name');
    echo '<br>';
    echo $user1->__get('age');
    echo '<br>';
    $user1->__set('age', 89);
    echo $user1->__get('age');
    echo '<br>';
    