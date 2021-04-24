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

<link rel="stylesheet" href="../css/style.css" />
<title>Form Pengajuan</title>

    <!-- Form -->
    <div class="container-form" id="form-pengajun">
      <div class="title">Form Pengajuan</div>
      <div class="content">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-surat" method="post">
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
          <!-- <div class="jk-details">
            <input type="radio" name="jk" id="dot-1" value="Laki-Laki"/>
            <input type="radio" name="jk" id="dot-2" value="Perempuan"/>
            <span class="jk-title">Jenis Kelamin</span>
            <div class="category">
              <label for="dot-1">
                <span class="dot one"></span>
                <span>Laki-Laki</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span>Perempuan</span>
              </label>
            </div>
          </div> -->
          <div class="button">
            <input type="submit" value="Simpan" />
          </div>
        </form>
      </div>
    </div>
    <!-- Akhir Form -->
