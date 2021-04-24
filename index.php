<?php
// Initialize the session
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header('location:admin/index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="css/style.css" />
    <title>Login</title>
  </head>
  <body>

    <!-- Form Login -->
    <section>
      <div class="container">
        <div class="login-content">
          <form action="auth.php" method="post">
            <img src="img/users.png" />
            <h2 class="title">Selamat Datang</h2>
            <div class="input-div one">
              <div class="i">
                <i class="fas fa-user"></i>
              </div>
              <div class="div">
                <h5>Username</h5>
                <input type="text" name="username" class="input" />
              </div>
            </div>
            <div class="input-div pass">
              <div class="i">
                <i class="fas fa-lock"></i>
              </div>
              <div class="div">
                <h5>Password</h5>
                <input type="password" name="password" class="input" />
              </div>
            </div>
            <a href="#">Lupa Password?</a>
            <input type="submit" class="btn" value="Login" />
          </form>
        </div>
      </div>
    </section>
    <!-- Akhir Login -->

    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
  </body>
</html>
