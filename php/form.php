
<?php

  session_start();
  $_SESSION['message'] = '';
  $mysqli = new mysqli('us-cdbr-iron-east-01.cleardb.net', 'b47d0a6ca77bf1', '765b9438', 'heroku_8f1bb9bec0ac613');

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
    else {
      $_SESSION['message'] = 'Request error';
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

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="/stylesheets/form.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


    <div class="container" align="center">
      <!-- <div class="wrapper"> -->
      <form action="form.php" method="post" class="login">
        <div class="alert alert-error">
          <?= $_SESSION['message'] ?>
        </div>
        <!-- <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button> -->
          <!-- <form class="login"> -->
          <p class="title">Log in</p>
            <input type="text" placeholder="Username" name="username" autofocus/>
              <i class="fa fa-user"></i>
            <input type="password" placeholder="Password" name="password"/>
              <i class="fa fa-key"></i>
            <!-- <a href="#">Forgot your password?</a> -->
            <button type="submit">
              <!-- <i class="spinner"></i> -->
              <span class="state">Log in</span>
            </button>
          <!-- </form> -->
          <!-- <footer><a target="blank" href="http://boudra.me/">boudra.me</a></footer> -->
          </p>

      </form>
    <!-- </div> -->

    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">

    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->

  </body>
</html>
