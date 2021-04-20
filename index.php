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
    <?php
    if(isset($_GET['pesan'])){
      if($_GET['pesan'] == "gagal"){
      echo "Login gagal! username dan password salah!";
      }else if($_GET['pesan'] == "logout"){
      echo "Anda telah berhasil logout";
      }else if($_GET['pesan'] == "belum_login"){
      echo "Anda harus login untuk mengakses halaman admin";
      }
    }
    ?>

    <!-- Form Login -->
    <section>
      <div class="container">
        <div class="login-content">
          <form action="auth.php" method="post" onSubmit="return validasi ()">
            <img src="img/users.png" />
            <h2 class="title">Selamat Datang</h2>
            <div class="input-div one">
              <div class="i">
                <i class="fas fa-user"></i>
              </div>
              <div class="div">
                <h5>Username</h5>
                <input type="text" class="input" />
              </div>
            </div>
            <div class="input-div pass">
              <div class="i">
                <i class="fas fa-lock"></i>
              </div>
              <div class="div">
                <h5>Password</h5>
                <input type="password" class="input" />
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