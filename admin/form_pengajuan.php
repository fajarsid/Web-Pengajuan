<?php

require_once "../koneksi.php";
 
$nama = $nik = $hp = $email = $alamat = $jk = $jsurat = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
  $nama = trim($_POST["nama"]);
  $nik = trim($_POST["nik"]);
  $hp = trim($_POST["hp"]);
  $email = trim($_POST["email"]);
  $alamat = trim($_POST["alamat"]);
  $jk = trim($_POST["jk"]);
  $jsurat = trim($_POST["jsurat"]);

    if($nama && $nik && $hp && $email && $alamat && $jk && $jsurat){
        
      $sql = "INSERT INTO pengajuan set 
      nama = '$_POST[nama]',
      nik = '$_POST[nik]',
      email = '$_POST[email]',
      hp = '$_POST[hp]',
      alamat = '$_POST[alamat]',
      jk = '$_POST[jk]',
      jsurat = '$_POST[jsurat]'
      ";
       
       if($stmt = mysqli_prepare($connect, $sql)){
        mysqli_stmt_bind_param($stmt, "ss", $param_nama, $param_nik, $param_hp, $param_email, $param_alamat, $param_jk, $param_jsurat);
        
        $param_nama = $nama;
        $param_nik = $nik;
        $param_hp = $hp;
        $param_email = $email;
        $param_alamat = $alamat;
        $param_jk = $jk;
        $param_jsurat = $jsurat;
        
        if(mysqli_stmt_execute($stmt)){
          header('location: index.php');
        } else{
            echo "Gagal!";
        }

        mysqli_stmt_close($stmt);
    }
  } else {
    echo "<script>alert('Tidak Boleh Ada Yang Kosong!');</script>";
  }
    
    mysqli_close($connect);
}
?>


<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- css -->
   <link rel="stylesheet" href="../css/style.css">
   
    <!-- Link Tabels -->
   <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.14/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap" rel="stylesheet" />
   <title>Form Pengajuan</title>
 </head>
 <body>
    <!-- Sidebar -->
    <nav class="main-menu">
      <ul>
          <li>
              <a href="index.php">
                  <i class="fa fa-home fa-2x"></i>
                  <span class="nav-text">
                      Dashboard
                  </span>
              </a>
            
          </li>
          <li class="has-subnav">
              <a href="index.php">
                <i class="fa fa-table fa-2x"></i>
                  <span class="nav-text">
                      List Pengajuan
                  </span>
              </a>
          </li>
          <li class="has-subnav">
              <a href="form_pengajuan.php">
                  <i class="fa fa-list fa-2x"></i>
                  <span class="nav-text">
                      Form
                  </span>
              </a>
          </li>
      </ul>
      <ul class="logout">
          <li>
              <a href="logout.php">
                    <i class="fa fa-power-off fa-2x"></i>
                  <span class="nav-text">
                      Logout
                  </span>
              </a>
          </li>  
      </ul>
    </nav>
    <!-- Akhir Sidebar -->

    
    <!-- Form -->
    <div class="container-form" id="form-pengajun">
      <div class="content">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-surat" method="post">
      <div class="title">Form Pengajuan</div>
          <div class="user-details">
            <div class="input-box js">
              <span class="details">Jenis Surat</span>
              <select name="jsurat" class="jk-details">
                <option value="">Jenis Surat</option>
                <option value="Skck">Surat Keterangan KTP</option>
                <option value="Pin">Surat Keterangan Pindah</option>
                <option value="dom">Surat Keterangan Domisili</option>
                <option value="Rt">Kartu Keluarga</option>
                <option value="Rt">Akta Kelahiran</option>
                <option value="Rt">Akta Kematian</option>
              </select>
            </div>
            <div class="input-box js">
              <span class="details">Jenis Kelamin</span>
              <select name="jk" class="jk-details">
                <option value="">Jenis Kelamin</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="input-box">
              <span class="details">Nama Lengkap</span>
              <input type="text" placeholder="Masukan nama anda" name="nama" />
            </div>
            <div class="input-box">
              <span class="details">NIK</span>
              <input type="number" placeholder="Masukan NIK" name="nik" />
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="email" placeholder="Masukan email" name="email" />
            </div>
            <div class="input-box">
              <span class="details">No Handphone</span>
              <input type="number" placeholder="Masukan no telpon" name="hp" />
            </div>
          </div>
          <div class="input-box">
            <span class="details">Alamat</span>
            <textarea rows="5" cols="80" type="textarea" name="alamat"></textarea>
          </div>
          <div class="button">
            <input type="submit" value="Simpan" />
          </div>
        </form>
      </div>
    </div>
    <!-- Akhir Form -->

 </body>
</html>
    