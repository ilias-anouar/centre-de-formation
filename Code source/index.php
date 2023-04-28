<?php
require "connect.php";
include "class.php";
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if (isset($_POST['sign_up'])) {
  $name = test_input($_POST['name']);
  $prenom = test_input($_POST['prenom']);
  $mail = test_input($_POST['emaile']);
  $password = test_input($_POST['passwrd']);
  $signup = new User();
  $result = $signup->signup($name, $prenom, $mail, $password, $conn);
  // echo $signup->signup($name, $prenom, $mail, $password);
}

if (isset($_POST['sign_in'])) {
  $email = test_input(($_POST['email']));
  $password = test_input(($_POST['password']));
  $signin = new User();
  $result = $signin->signin($email, $password, $conn);
}

?>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="apprenant.CSS">
  <title>Sign up</title>
</head>

<body>
  <?php
  if (isset($result)) {
  ?>
    <div class="alert alert-warning text-center text-dark" role="alert">
    <?php
    echo $result;
  }
    ?>
    </div>
    <div class="form">
      <form action="" method="post">
        <input id="noaccount" name="radioaccount" type="radio" class="radio radio--invisible" checked />
        <input id="account" name="radioaccount" type="radio" class="radio radio--invisible" />
        <div class="form_background">
          <div class="form-group form-group--account">
            <h3 class="form-group_title">sign in</h3>
            <input class="form-group_input" type="email" name="email" placeholder="Email" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
            <input class="form-group_input" type="password" name="password" placeholder="Password" required="" >
            <button name="sign_in" class="button button--form" type="submit">Sign in</button>
          </div>
      </form>
      <form action="" method="post">
        <div class="form-group form-group--noaccount">
          <h3 class="form-group_title">Sign up</h3>
          <input class="form-group_input" type="text" name="name" placeholder="First Name" required="">
          <input class="form-group_input" type="text" name="prenom" placeholder="last Name" required="">
          <input class="form-group_input" type="email" name="emaile" placeholder="Email" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
          <!-- * Pa$$w0rd!  T1s1s@s3cur3 -->
          <input class="form-group_input" type="password" name="passwrd" placeholder="Password" required="">
          <button class="button button--form" type="submit" name="sign_up">Sign up</button>
        </div>
      </form>
    </div>

    <fieldset class="fieldset">
      <h2>Don't have an account ?</h2>
      <p>Are you looking for a way to improve your education and training? If so, then you need to check out our center of formation!.So what are you waiting for?
        Sign up today and start your journey to success!</p>
      <div class="form_content form_content--noaccount">

      </div>
      <label for="noaccount" class="button">Signup</label>
    </fieldset>
    <fieldset class="fieldset">
      <h2>Have an account ?</h2>
      <p>Please sign in to access your account.</p>
      <div class="form_content form_content--noaccount">

      </div>
      <label for="account" class="button">sign in</label>
    </fieldset>
    </div>


</body>

</html>