<?php

class User
{
  public $name;
  public $prenom;
  public $email;
  public $password;

  public function signup($name, $prenom, $email, $password, $conn)
  {
    $this->name = $name;
    $this->prenom = $prenom;
    $this->email = $email;
    $this->password = $password;
    $hashpass = $this->password($this->password);
    $user = $this->check_user($this->email, $conn);
    // echo "<pre>";
    // var_dump($user);
    // echo "<pre/>";
    if ($user == false) {
      $this->save($this->name, $this->prenom, $this->email, $hashpass, $conn);
      $succes = "welcom to EduSphere comunity <br/> your account was created succefly ,sign in now !!";
      return $succes;
    } else {
      $error = "This email is already used <br/> can you try to sign in to your account please !";
      return $error;
    }
  }

  public function signin($email, $password, $conn)
  {
    $this->email = $email;
    $this->password = $password;
    $user = $this->check_user($this->email, $conn);
    if ($user == false) {
      $error = "This account is not exist <br> try to create an account if you  want to join the community ";
      return $error;
    } else {
      $ex_pass = $user['password'];
      $test = $this->test_pass($this->password, $ex_pass);
      if ($test) {
        session_start();
        $_SESSION['id'] = $user['Id_apprenant_'];
        header("Location: apphome.html");
      }
    }
  }


  public function password($password)
  {
    $hashvalue = password_hash($password, PASSWORD_DEFAULT);
    return $hashvalue;
  }

  public function test_pass($password, $ex_pass)
  {
      $result = password_verify($password, $ex_pass);
      return $result;
  }
  
  public function check_user($email, $conn)
  {
    $sql = "SELECT * FROM `apprenant_` WHERE `email` = '$email'";
    $user = $conn->query($sql);
    $user = $user->fetch(PDO::FETCH_ASSOC);
    return $user;
  }

  public function save($name, $prenom, $email, $password, $conn)
  {
    $sql = "INSERT INTO `apprenant_` (`nom_`,`prenom`,`email`, `password`) VALUES ('$name','$prenom','$email','$password')";
    $conn->query($sql);
  }
}
