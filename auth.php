<?php
require_once "koneksi.php";

$username = $password = "";

if (empty(trim($_POST["username"])) AND empty(trim($_POST["password"]))) {
  echo "<script>alert('Tidak Boleh Ada Yang Kosong!');</script>";
  echo "<script>location='index.php';</script>";
}
  else {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $sql = "SELECT id, username, password FROM admin WHERE username = ?";
        
    if($stmt = mysqli_prepare($connect, $sql)){

        mysqli_stmt_bind_param($stmt, "s", $param_username);
        
        $param_username = $username;
        
        if(mysqli_stmt_execute($stmt)){

            mysqli_stmt_store_result($stmt);
            

            if(mysqli_stmt_num_rows($stmt) == 1){                    

                mysqli_stmt_bind_result($stmt, $id, $username, $password);
                if(mysqli_stmt_fetch($stmt)){
                  session_start();
                        
                  $_SESSION["loggedin"] = true;
                  $_SESSION["id"] = $id;
                  $_SESSION["username"] = $username;
                  
                  header('location:admin/index.php');
                }
            } else{
              echo "<script>alert('Error! Silahkan Periksa kembali username dan password anda!');</script>";
              echo "<script>location='index.php';</script>";
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        mysqli_stmt_close($stmt);
    }
  }
?>