<link rel="stylesheet" href="../css/style.css" />
<title>Form Pengajuan</title>

  <?php
  include "../koneksi.php";
    $sql=mysqli_query($connect, "select * from pengajuan where nik='$_GET[nik]'");
    $data=mysqli_fetch_array($sql);
  ?>

    <!-- Form -->
    <div class="container-form" id="form-pengajun">
      <div class="title">Form Pengajuan</div>
      <div class="content">
        <form action="#" class="form-surat" method="POST">
          <div class="user-details">
            <div class="input-box js">
              <span class="details">Jenis Surat</span>
              <select name="jsurat" class="jk-details" value="<?php echo $data['jsurat']; ?>">
                <option value="">Jenis Surat</option>
                <option value="Skck">Surat Keterangan KTP</option>
                <option value="Pin">Surat Keterangan Pindah</option>
                <option value="dom">Surat Keterangan Domisili</option>
                <option value="Rt">Kartu Keluarga</option>
                <option value="Rt">Akta Kelahiran</option>
                <option value="Rt">Akta Kematian</option>
              </select>
            </div>
            <div class="input-box">
              <span class="details">Nama Lengkap</span>
              <input type="text" placeholder="Masukan nama anda" name="nama" value="<?php echo $data['nama']; ?>"/>
            </div>
            <div class="input-box">
              <span class="details">NIK</span>
              <input type="number" placeholder="Masukan NIK" name="nik" value="<?php echo $data['nik']; ?>"/>
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="text" placeholder="Masukan email" name="email" value="<?php echo $data['email']; ?>"/>
            </div>
            <div class="input-box">
              <span class="details">No Handphone</span>
              <input type="text" placeholder="Masukan no telpon" name="hp" value="<?php echo $data['hp']; ?>" />
            </div>
          </div>
          <div class="input-box">
            <span class="details">Alamat</span>
            <textarea type="textarea" name="alamat" value="<?php echo $data['alamat']; ?>"></textarea>
          </div>
          <div class="jk-details">
            <input type="radio" id="dot-1" />
            <input type="radio" id="dot-2" />
            <span class="jk-title" name="jk" value="<?php echo $data['jk']; ?>">Jenis Kelamin</span>
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


 <?php
  include "../koneksi.php";

  if(isset($_POST['proses'])){
    mysqli_query($connect, "update into pengajuan set 
    nama = '$_POST[nama]',
    email = '$_POST[email]',
    hp = '$_POST[hp]',
    alamat = '$_POST[alamat]',
    jk = '$_POST[jk]',
    jsurat = '$_POST[jsurat]'
    where nik = '$_GET[nik]'
    ");

    echo 'Pengajuan telah diedit';
    echo "<meta http-equiv=refresh content=1;URL='list_pengajuan.php'>";
  }
  ?> 
