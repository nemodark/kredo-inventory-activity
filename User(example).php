<?php
include "Profile.php";

//extends - can use methods and properties from the other class
class User extends Profile{

    //Property
    public $username = 'johndoe';
    private $firstName = 'John';
    public $lastName = 'Doe';
    public $single;
    
    // methods
    public function __construct($par1, $par2){
        $this->single = $par1;
        $this->username = $par2;
    }

    public function display(){
        // call a private function from other class
        
        $this->generate();

        // data1 is from Profile class
        return $this->data1;
    }

    public function hello_world(){
        return $this->single;
    }

    public function find_user($name){
        $userFound = $name;
        return "The name of the user is ".$userFound;
    }
    
}
?>