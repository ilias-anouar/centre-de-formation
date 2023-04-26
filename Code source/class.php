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
public function password($password)
{
    $hashvalue = password_hash($password, PASSWORD_DEFAULT);
    return $hashvalue;
}

public function save() {
  $sql = "INSERT INTO `apprenant_` (name,prenom,email, password) VALUES ('$name','$prenom','$email','$password')";
  $stmt = $this->db->prepare($sql);
  $stmt->execute(array($this->name,$this->prenom ,$this->email, $this->password));
}
}

?>