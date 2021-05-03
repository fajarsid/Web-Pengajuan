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

  $nos = str_replace(" ", "_", strtolower($_POST['nos']));
  $ls = !empty($_POST['ls']) ? $_POST['ls'] : "-";
  $date = date("d M Y");
  $no = !empty($_POST['nos']) ? $_POST['nos'] . date(" / Y") : "-";
  $nama = $data['nama'];
  $jk = $data['jk'];
  $nik = $data['nik'];
  $alamat = $data['alamat'];
  $email = $data['email'];

require_once("dompdf/dompdf_config.inc.php");

$html =
  '<html><style>
  #judul{
      text-align:center;
      padding-top: 40px;
    padding-bottom: 40px;
  }

  #halaman{
      width: auto; 
      height: auto; 
      position: center; 
      padding-left: 30px; 
      padding-right: 30px; 
      padding-bottom: 80px;
  }

  #bott{
    padding-top: 30px;
    padding-bottom: 30px;
  }

</style><body>'.
    '<div id=halaman class="container">'.
    '<h2 id=judul><u>SURAT PERMOHONAN</u></h2>'.
    '<p style="text-align:right">Sukabumi, '.$date.'</p>'.
    '<table style="width: 80%;">'.
    '<tr>'.
    '<td style="width: 25%;">No</td>'.
    '<td>: '.$no.'</td>'.
    '</tr>'.
    '<tr>'.
    '<td>Lampiran</td>'.
    '<td>: '.$ls.'</td>'.
    '</tr>'.
    '<tr>'.
    '<td>Perihal</td>'.
    '<td>: Permohonan Rekomendasi</td>'.
    '</tr>'.
    '</table>'.
    '<br>'.
    '<table style="width: 80%;">'.
    '<tr>'.
    '<td style="width: 25%;">Nama Lengkap</td>'.
    '<td>: '.$nama.'</td>'.
    '</tr>'.
    '<tr>'.
    '<td>Jenis Kelamin</td>'.
    '<td>: '.$jk.'</td>'.
    '</tr>'.
    '<tr>'.
    '<td>NIK</td>'.
    '<td>: '.$nik.'</td>'.
    '</tr>'.
    '<tr>'.
    '<td>Alamat</td>'.
    '<td>: '.$alamat.'</td>'.
    '</tr>'.
    '<tr>'.
    '<td>Email</td>'.
    '<td>: '.$email.'</td>'.
    '</tr>'.
    '<tr>'.
    '<td>Jenis Surat</td>'.
    '<td>: '.$ketSurat.'</td>'.
    '</tr>'.
    '</table>'.
    '<br>'.
    '<br>'.
    '<p>Demikian permohonan ini saya buat dengan sebenarnya, apabila terjadi kesalahan data, maka menjadi tanggung jawab saya di daerah / alamat tujuan.</p>'.
    '<br>'.
    '<p style="text-align:right">Sukabumi, '.$date.'</p>'.
    '<p style="text-align:right; padding-bottom:70px">Permohonan</p>'.
    '<p style="text-align:right"><u>'.$nama.'</u></p>'.
    '</div>'.
    '</body></html>';

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
ob_end_clean();
$dompdf->stream(''.$ketSurat.' Atas Nama '.$nama.'.pdf');
?>