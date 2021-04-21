<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../css/style.css" />

    <title>Form Pengajuan</title>
  </head>
  <body>
    <!-- Form -->
    <div class="container-form" id="form-pengajun">
      <div class="title">Form Pengajuan</div>
      <div class="content">
        <form action="#" class="form-surat" method="POST">
          <div class="user-details">
            <div class="input-box js">
              <span class="details">Jenis Surat</span>
              <select name="jk" class="jk-details">
                <option value="">Jenis Surat</option>
                <option value="Skck">Permohonan Rekomendasi SKCK</option>
                <option value="Pin">Surat Keterangan Pindah</option>
                <option value="Rt">Surat Pengantar RT/RW</option>
                <option value="dom">Surat Keterangan Domisili</option>
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
              <input type="text" placeholder="Masukan email" name="email" />
            </div>
            <div class="input-box">
              <span class="details">No Handphone</span>
              <input type="text" placeholder="Masukan no telpon" name="hp" />
            </div>
          </div>
          <div class="input-box">
            <span class="details">Alamat</span>
            <textarea type="textarea" name="alamat"></textarea>
          </div>
          <div class="jk-details">
            <input type="radio" name="jk" id="dot-1" />
            <input type="radio" name="jk" id="dot-2" />
            <span class="jk-title" name="jk">Jenis Kelamin</span>
            <div class="category">
              <label for="dot-1">
                <span class="dot one"></span>
                <span class="jk">Laki-Laki</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="jk">Perempuan</span>
              </label>
            </div>
          </div>
          <div class="button">
            <input type="submit" value="Simpan" name="proses" />
          </div>
        </form>
      </div>
    </div>
    <!-- Akhir Form -->

  <!-- <?php
  include "koneksi.php";

  if(isset($_POST['proses'])){
    mysqli_query($koneksi, "insert into pengajuan set 
    nama = '$_POST[nama]',
    nik = '$_POST[nik]',
    email = '$_POST[email]',
    hp = '$_POST[hp]',
    alamat = '$_POST[alamat]',
    jk = '$_POST[jk]'
    ");

    echo 'Pengajuan telah tersimpan';
  }


  ?> -->
  </body>
</html>
