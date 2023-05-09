<?php

use LDAP\Result;

class User
{

  public $name;
  public $prenom;
  public $email;
  public $password;


  //  take the informations of the app + connection db, it generates a hashed password using the password() method,
  //  then  checks if the email is already exist   using  check_user method  ,
  // and finally    saves the app infos  to the database using the save() method 
  public function signup($name, $prenom, $email, $password, $conn)

  {
    $this->name = $name;
    $this->prenom = $prenom;
    $this->email = $email;
    $this->password = $password;
    $hashpass = $this->password($this->password);
    $user = $this->check_user($this->email, $conn);
    if ($user == false) {
      $this->save($this->name, $this->prenom, $this->email, $hashpass, $conn);
      $succes = "welcom to EduSphere comunity <br/> your account was created succefly ,sign in now !!";
      return $succes;
    } else {
      $error = "This email is already used <br/> can you try to sign in to your account please !";
      return $error;
    }
  }

  // if the email il existe it compare the using password with the entred with the stored password by calling test_pass method 
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
        $_SESSION['Id_apprenant_'] = $user['Id_apprenant_'];
        header("Location: apphome.php");
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




  public function check_user_session($id_user, $conn, $nd_session)
  {
    $new_session = "SELECT * FROM session WHERE Id_session = $nd_session";
    $new_session = $conn->query($new_session);
    $new_session = $new_session->fetch(PDO::FETCH_ASSOC);

    $nb_sessions = "SELECT *,COUNT(*) AS nb_sessions
    FROM inscription
    WHERE Id_apprenant_ =  $id_user";
    $nb_sessions = $conn->query($nb_sessions);
    $nb_sessions = $nb_sessions->fetch(PDO::FETCH_ASSOC);

    $count = $nb_sessions['nb_sessions'];

    $id_old_session = $nb_sessions['Id_session'];
    $old_session = "SELECT * FROM session WHERE Id_session = $id_old_session";
    $old_session = $conn->query($old_session);
    $old_session = $old_session->fetch(PDO::FETCH_ASSOC);

    // return [$old_session, $new_session];
    if ($count < 2) {
      if ($new_session['Date_debut'] > $old_session['Date_fin']) {
        return true;
      }
    } else {
      return false;
    }
  }
  public function user_info($conn, $id_user)
  {
    $sql = "SELECT * FROM apprenant_ WHERE Id_apprenant_ = $id_user";
    $stmt = $conn->query($sql);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
  }

  public function Update_info($conn, $first_name, $last_name, $email, $id_user)
  {
    $sql = "UPDATE `apprenant_` SET `nom_`='$last_name',`prenom`='$first_name',`email`='$email' WHERE Id_apprenant_ = $id_user";
    if ($stmt = $conn->query($sql)) {
      $stmt->execute();
    }
  }

  public function update_pass($conn, $id_user, $old_pass, $new_pass, $c_new_pass)
  {
    $sql = "SELECT * FROM apprenant_ WHERE Id_apprenant_ = $id_user";
    $stmt = $conn->query($sql);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $ex_pass = $user['password'];
    if ($this->test_pass($old_pass, $ex_pass)) {
      if ($new_pass == $c_new_pass) {
        $pass = $this->password($new_pass);
        $sql = "UPDATE `apprenant_` SET `password`='$pass' WHERE Id_apprenant_ = $id_user";
        $stmt = $conn->query($sql);
        $succes = "your password updated seccusfuly...!";
        return $succes;
      } else {
        $error = "check the password you enter it's looks like the confirmation password is not correct";
        return $error;
      }
    } else {
      $warning = "the pasword you enterd looks to be not valid enter youe current password";
      return $warning;
    }
  }
  public function User_inscription($conn, $id_user)
  {
    $result = array();
    $sql = "SELECT * FROM inscription WHERE Id_apprenant_ = $id_user";
    $resul = $conn->query($sql);
    // $resul = $resul->fetch(PDO::FETCH_ASSOC);
    while ($test = $resul->fetch(PDO::FETCH_ASSOC)) {
      array_push($result, $test);
    }
    return $result;
  }

  public function user_history($conn, $id_user)
  {
    $result = array();

    $sql = "SELECT s.*, i.evaluation, f.sujet,fo.nom
    FROM session s
    JOIN inscription i ON s.Id_session = i.Id_session
    JOIN formation_ f ON s.Id_formation_ = f.Id_formation_
    JOIN formateur fo ON s.Id_Formateur = fo.Id_Formateur
    WHERE i.Id_apprenant_ = $id_user
    AND s.Date_fin < NOW();";
    $stmt = $conn->query($sql);
    // $resul = $stmt->fetch(PDO::FETCH_ASSOC);
    while ($test = $stmt->fetch(PDO::FETCH_ASSOC)) {
      array_push($result, $test);
    }

    return $result;
  }
  public function show_history($val)
  {
?>
    <tr>
      <td>
        <?php echo $val['sujet'] ?>
      </td>
      <td>
        <?php echo $val['Date_debut'] ?>
      </td>
      <td>
        <?php echo $val['Date_fin'] ?>
      </td>
      <td>
        <?php echo $val['nom'] ?>
      </td>
      <td>
        <?php
        echo $val['evaluation'];
        ?>
      </td>
    </tr>
  <?php
  }
  public function show_table($val, $insc, $t_name, $f_name)
  {
  ?>
    <tr>
      <td>
        <?php echo $f_name ?>
      </td>
      <td>
        <?php echo $val['Date_debut'] ?>
      </td>
      <td>
        <?php echo $val['Date_fin'] ?>
      </td>
      <td>
        <?php echo $t_name ?>
      </td>
      <td>
        <?php
        echo $insc['evaluation'];
        ?>
      </td>
    </tr>
    <?php
  }
}

class Formation
{
  public function sort($conn, $cat)
  {
    $sql = "SELECT * FROM formation_ WHERE categorie='$cat'";
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function searsh_subject($conn, $value)
  {
    $sql = "SELECT * FROM formation_ WHERE sujet LIKE '%$value%'";
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function formation($conn)
  {
    $sql = "SELECT * FROM formation_";
    $stmt = $conn->query($sql);
    $Result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $Result;
  }
  public function Creat_card($formations)
  {
    foreach ($formations as $formation) {
    ?>
      <a class="none" href="<?php echo "formation.php?Id_formation_=" . $formation['Id_formation_'] ?>">
        <div class="card-cont">
          <div class="box">
            <span class="title">
              <?php echo $formation['sujet'] ?>
            </span>
            <div>
              <strong>
                <?php echo $formation['categorie'] ?>
              </strong>
              <p>
                <?php $formation['masse_horaire'] ?>
              </p>
            </div>
          </div>
        </div>
      </a>
    <?php
    }
  }
  public function details($conn, $id)
  {
    $det = "SELECT * FROM formation_ WHERE Id_formation_ = $id";
    $det = $conn->query($det);
    $result = $det->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  public function show_details($var)
  {
    ?>
    <div>
      <h1 class="display-1 fw-bold">
        <?php echo $var['sujet'] ?>
      </h1>
      <div class="text-center p-5">
        <p class="fw-bold p-5">
          <?php echo $var['discription'] ?>
        </p>
      </div>
    </div>
  <?php
  }
}

class Session
{
  public function sessin($conn, $id)
  {
    $sessions = "SELECT * FROM session WHERE Id_formation_ = $id";
    $sessions = $conn->query($sessions);
    $result = $sessions->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function show_session($val, $insc_num, $t_name, $id_app)
  {
  ?>
    <table class="table table-hover text-center">
      <thead>
        <tr>
          <th>Place number</th>
          <th>Starting date</th>
          <th>Finishing date</th>
          <th>Teacher</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($val as $session) {
        ?>
          <tr>
            <td>
              <?php echo $insc_num . "/" . $session['Places_max'] ?>
            </td>
            <td>
              <?php echo $session['Date_debut'] ?>
            </td>
            <td>
              <?php echo $session['Date_fin'] ?>
            </td>
            <td>
              <?php echo $t_name ?>
            </td>
            <td>
              <?php
              if ($insc_num == $session['Places_max']) {
              ?>
                <a class="btn btn-danger" type="submit" name="inscription" disabled>Inscription</a>
              <?php
              } else {
              ?>
                <a href="<?php echo "formation.php?Id_formation_=" . $session['Id_formation_'] . "&id_session=" . $session['Id_session'] . "&Id_apprenant_=" . $_SESSION['Id_apprenant_'] . "&Id_Formateur=" . $session['Id_Formateur'] ?>" class="btn btn-success" type="submit" name="inscription">Inscription</a>
              <?php
              }
              ?>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
<?php
  }
}


class Inscription
{
  public $id_session;
  public function __construct($id_session)
  {
    $this->id_session = $id_session;
  }
  public function Inscription_number($conn)
  {
    $id_session = $this->id_session;
    $sql = "SELECT COUNT(Id_session) FROM inscription WHERE Id_session = $id_session";
    $resul = $conn->query($sql);
    $resul = $resul->fetch(PDO::FETCH_ASSOC);
    // echo "<pre>";
    // echo "the number of inscriptions in the session N " . $id_session . " is " . $resul['COUNT(Id_session)'];
    // echo "</pre>";
    $insc_num = $resul['COUNT(Id_session)'];
    return $insc_num;
  }

  public function inscription($conn, $Id_session, $Id_apprenant_)
  {
    $sql = "INSERT INTO `inscription`(`Id_session`, `Id_apprenant_`) VALUES ('$Id_session','$Id_apprenant_')";
    $sql = $conn->query($sql);
    $succes = "your inscription to this session is done perfectly";
    return $succes;
  }
}

class Formateur
{
  public $id_formateur;
  public function __construct($id_formateur)
  {
    $this->id_formateur = $id_formateur;
  }

  public function formatuer_data($conn)
  {
    $id_formateur = $this->id_formateur;
    $sql = "SELECT * FROM formateur WHERE Id_Formateur = $id_formateur";
    $resul = $conn->query($sql);
    $resul = $resul->fetch(PDO::FETCH_ASSOC);
    return $resul;
  }
}
