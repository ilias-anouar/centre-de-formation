<?php

class User 
{

public $name;
public $prenom;
public $email;
public $password;

public function __construct($name, $prenom,$email, $password) {
  $this->name = $name;
  $this->prenom=$prenom; 
  $this->email = $email;
  $this->password = $password;

}


}

?>