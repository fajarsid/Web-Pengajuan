<?php
  include "../koneksi.php";
    $sql=mysqli_query($connect, "SELECT * FROM pengajuan WHERE id ='$_GET[id]'");
    $data=mysqli_fetch_array($sql);

    $ketSurat = '';
    if(!empty($data['jsurat'])) {
        if ($data['jsurat'] == 'SKTP') {
          $ketSurat = "Surat Keterangan KTP";
        } else if ($data['jsurat'] == 'SKP') {
          $ketSurat = "Surat Keterangan Pindah";
        } else if ($data['jsurat'] == 'SKD') {
          $ketSurat = "Surat Keterangan Domisili";
        } else if ($data['jsurat'] == 'KK') {
          $ketSurat = "Kartu Keluarga";
        } else if ($data['jsurat'] == 'AL') {
          $ketSurat = "Akta Lahir";
        } else if ($data['jsurat'] == 'AK') {
          $ketSurat = "Akta Kematian";
        }
    } else {
      echo 'kosong';
    }
      
  ?>

<html>
<head>
  <title>Data Pemohon</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <style>
        #judul{
            text-align:center;
            padding-top: 40px;
          padding-bottom: 40px;
        }

        #halaman{
            width: 800px; 
            height: auto; 
            position: center; 
            border: 1px solid; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px;
        }

        #bott{
          padding-top: 30px;
          padding-bottom: 30px;
        }

    </style>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container" style='position: center; width: 800px; height: auto; '>
<h4>Data Pemohon Pengajuan</h4>
		<p>Silahkan masukkan No dan Lampiran surat</p>
		<form action='expdf.php?id=<?php echo $data['id']?>' method="POST">
		<label>No &nbsp </label><input type="number" name="nos" />
		<label>Lampiran &nbsp </label><input type="text" name="ls" />
		<input type="submit" name="kirim" value="Cetak Surat!" />
		</form>
</div>
<div id=halaman class="container">
  <h3 id=judul><u>SURAT PERMOHONAN</u></h3>
  <p style='text-align:right'>
    Sukabumi, <?php echo date("d M Y");?>
  </p>

<table style="width: 80%;">
    <tr>
        <td style="width: 25%;">No</td>
        <td>: &nbsp <?php echo "- " . date("/ Y");?></td>
    </tr>
    <tr>
        <td>Lampiran</td>
        <td>: &nbsp -</td>
    </tr>
    <tr>
        <td>Perihal</td>
        <td>: &nbsp Permohonan Rekomendasi</td>
    </tr>
</table>
<p></p>
<table style="width: 80%;">
    <tr>
        <td style="width: 25%;">Nama Lengkap</td>
        <td>: &nbsp <?php echo $data['nama']; ?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>: &nbsp <?php echo $data['jk']; ?></td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>: &nbsp <?php echo $data['nik']; ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: &nbsp <?php echo $data['alamat']; ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td>: &nbsp <?php echo $data['email']; ?></td>
    </tr>
    <tr>
        <td>Jenis Surat</td>
        <td>: &nbsp <?php echo $ketSurat; ?></td>
    </tr>
</table>
<p></p>

<p>Demikian permohonan ini saya buat dengan sebenarnya, apabila terjadi kesalahan data, maka menjadi tanggung jawab saya di daerah / alamat tujuan.
</p>
<div style="width: 50%; text-align: right; float: right;">Sukabumi, <?php echo date("d M Y");?></div><br>
<div style="width: 50%; text-align: right; float: right;">Pemohon</div><br><br><br><br><br>
<div style="width: 50%; text-align: right; float: right;"><u>Arbrian Abdul Jamal</u></div>
</div>
<div id=bott></div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>