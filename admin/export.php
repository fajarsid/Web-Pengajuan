<?php
 include "../koneksi.php";
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
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			
				<div class="data-tables datatable-dark">
					
                <table id="filtertable" class="table cust-datatable dataTable no-footer">
                <thead>
                  <tr>
                    <th >No</th>
                    <th >Nama</th>
                    <th >NIK</th>
                    <th >Email</th>
                    <th >No Handphone</th>
                    <th >Alamat</th>
                    <th >Jenis Kelamin</th>
                    <th >Jenis Surat</th>
     
                  </tr>
                </thead>
                
                <?php
                include "../koneksi.php";
                $no=1;
                $ambildata = mysqli_query($connect, "select * from pengajuan");
                while ($tampil = mysqli_fetch_array($ambildata)){
                  echo "
                  <tr>
                      <td>$no</td>
                      <td>$tampil[nama]</td>
                      <td>$tampil[nik]</td>
                      <td>$tampil[email]</td>
                      <td>$tampil[hp]</td>
                      <td>$tampil[alamat]</td>
                      <td>$tampil[jk]</td>
                      <td>$tampil[jsurat]</td>
                                      

                  </tr>";

                  $no++;
                }
                ?>
              </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#filtertable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

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