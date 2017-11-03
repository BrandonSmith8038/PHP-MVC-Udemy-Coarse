<?php

class User {
    public $name;
    public $age;

    // Runs when a object is created
    public function __construct($name, $age){
        echo 'Class ' . __CLASS__ . ' instantiated<br>';
        $this->name = $name;
        $this->age = $age;
    }
    
    public function sayHello(){
        return $this->name . ' Says hello';
    }
    
    // Called when no other references to a certain object
    // Used for clean up, closing conections, etc.
    public function __destruct(){
        
    }
    
    
}

$user1 = new User('Brandon', 31);

echo $user1->name . ' is ' . $user1->age . ' years old!';
echo '<br>';
echo $user1->sayHello();
echo '<br>';

$user2 = new User('Amber', 32);

echo $user2->name . ' is ' . $user2->age . ' years old!';
echo '<br>';
echo $user2->sayHello();
echo '<br>';

