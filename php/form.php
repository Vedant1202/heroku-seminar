
<?php

  session_start();
  $_SESSION['message'] = '';
  $mysqli = new mysqli('us-cdbr-iron-east-01.cleardb.net', 'b47d0a6ca77bf1', '765b9438', 'heroku_8f1bb9bec0ac613');
  // $mysqli = new mysqli('us-cdbr-gcp-east-01.cleardb.net', 'b522da0190b678', 'e63bb678', 'gcp_95016fade37c6a9ab8b4');


  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $mysqli->real_escape_string($_POST['password']);

    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

    $sql = "INSERT INTO userdata (username, password)"
              . "VALUES ('$username', '$password')";

      if($mysqli->query($sql) === true){
          $_SESSION['message'] = 'Succesful';
          header("location: form.php");
        }
      else {
          $_SESSION['message'] = 'Failed';
      }
    }

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Heroku Workshop</title>
    <link rel="shortcut icon" href="https://png.icons8.com/ios/1600/anonymous-mask.png">
  </head>
  <body>

    <link rel="stylesheet" href="/stylesheets/form.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


    <div class="container-fluid" align="center" style="margin-top: 7%;">
      <form action="form.php" method="post" class="login">
        <div class="alert alert-error" style="color: red;">
          <?= $_SESSION['message'] ?>
        </div>
          <p class="title">Log in</p>
            <input type="text" placeholder="Username" name="username" autofocus/>
              <i class="fa fa-user"></i>
            <input type="password" placeholder="Password" name="password"/>
              <i class="fa fa-key"></i>
            <a href="../home.html">Go back</a>
            <button type="submit">
              <span class="state">Log in</span>
            </button>
          </p>
      </form>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


  </body>
</html>
