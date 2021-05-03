<link rel="stylesheet" href="../css/style.css" />
<title>Form Pengajuan</title>

  <?php
  include "../koneksi.php";
    $sql=mysqli_query($connect, "SELECT * FROM pengajuan WHERE id ='$_GET[id]'");
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
                <option value="<?php echo $data['jsurat']; ?>"><?php echo $data['jsurat']; ?></option>
                <option value="SKTP">Surat Keterangan KTP</option>
                <option value="SKP">Surat Keterangan Pindah</option>
                <option value="SKD">Surat Keterangan Domisili</option>
                <option value="KK">Kartu Keluarga</option>
                <option value="AL">Akta Kelahiran</option>
                <option value="AK">Akta Kematian</option>
              </select>
            </div>
            <div class="input-box js">
              <span class="details">Jenis Kelamin</span>
              <select name="jk" class="jk-details" value="<?php echo $data['jk']; ?>">
                <option value="<?php echo $data['jk']; ?>"><?php echo $data['jk']; ?></option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="input-box">
              <span class="details">Nama Lengkap</span>
              <input type="text" placeholder="Masukan nama anda" name="nama" value="<?php echo $data['nama']; ?>"/>
            </div>
            <div class="input-box">
              <span class="details">NIK</span>
              <input disabled type="number" placeholder="Masukan NIK" name="nik" value="<?php echo $data['nik']; ?>"/>
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
            <textarea type="textarea" rows="5" cols="80" name="alamat" value="<?php echo $data['alamat']; ?>"><?php echo $data['alamat']; ?></textarea>
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
    mysqli_query($connect, "UPDATE pengajuan SET 
    nama = '$_POST[nama]',
    email = '$_POST[email]',
    hp = '$_POST[hp]',
    alamat = '$_POST[alamat]',
    jk = '$_POST[jk]',
    jsurat = '$_POST[jsurat]'
    where id = '$_GET[id]'
    ");

    echo 'Pengajuan telah diedit';
    echo "<meta http-equiv=refresh content=1;URL='index.php'>";
  }
  ?> 
