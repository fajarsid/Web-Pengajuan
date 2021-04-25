<?php
    require 'koneksi.php';
    

    // cek login
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        // mencocokan database ada atau engga
        $cekdatabase = mysqli_query($connect, "SELECT * FROM admin where username ='$username' and password='$password'");

        // hitung jumlah data
        $hitung = mysqli_num_rows($cekdatabase);

        if($hitung > 0){
            $_SESSION['log'] = 'True';
            header('location:admin/index.php');
        } else {
            header('location:index.php');
        }
    }


if(!isset($_SESSION['log'])){

} else{
    header('location:admin/index.php');
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
          <form method="post">
            <h2 class="title">Selamat Datang</h2>
            <div class="input-div one">
              <div class="i">
                <i class="fas fa-user"></i>
              </div>
              <div class="div">
                <input type="text" name="username" class="input" />
              </div>
            </div>
            <div class="input-div pass">
              <div class="i">
                <i class="fas fa-lock"></i>
              </div>
              <div class="div">
                <input type="password" name="password" class="input" />
              </div>
            </div>
            <input type="submit" class="btn" value="Login" name="login" />
          </form>
        </div>
      </div>
    </section>
    <!-- Akhir Login -->
  </body>
</html>
