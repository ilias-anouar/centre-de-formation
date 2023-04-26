<?php

class User
{

  public $name;
  public $prenom;
  public $email;
  public $password;

  public function signup($name, $prenom, $email, $password)
  {
    $this->name = $name;
    $this->prenom = $prenom;
    $this->email = $email;
    $this->password = $password;
    $hashpass = $this->password($this->password);
    $this->save($this->name,$this->prenom,$this->email,$hashpass);
  }

  public function signin($email, $password)
  {
    $this->email = $email;
    $this->password = $password;
  }


  public function password($password)
  {
    $hashvalue = password_hash($password, PASSWORD_DEFAULT);
    return $hashvalue;
  }


  public function save($name, $prenom, $email, $password)
  {
    $sql = "INSERT INTO `apprenant_` ('name','prenom','email', 'password') VALUES ('$name','$prenom','$email','$password')";
    echo $sql;
    // $stmt = $conn->query($sql);
  }
}
