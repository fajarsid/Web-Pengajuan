
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.14/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>List Pengajuan</title>

    <div class="container p-30" id="list">
      <div class="row">
        <div class="col-12 main-datatable">
          <div class="card_body">
            <div class="row d-flex">
              <div class="col-sm-4 createSegment">
                <a href='form_pengajuan.php' class="btn dim_button create_new"> <span class="glyphicon glyphicon-plus"></span>Tambah Data</a>
              </div>
              <div class="col-sm-8 add_flex">
                <div class="form-group searchInput">
                  <label for="email">Cari:</label>
                  <input type="search" class="form-control" id="filterbox" placeholder=" " />
                </div>
              </div>
            </div>
            <div class="overflow-x">
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
                    <th colspan ="3">Aksi</th>
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
                      <td><a href='form_edit.php?nik=$tampil[nik]'> <span class='actionCust'>
                      <i class='far fa-edit'></i></>
                      </span></a></td>
                      <td><a href='?nik=$tampil[nik]'><span class='actionCust'>
                      <i class='far fa-trash-alt'></a></i>
                      </span></td>
                      <td>Pdf</>                 

                  </tr>";

                  $no++;
                }
                ?>
              </table>
                <?php
                if(isset($_GET['nik'])){
                  mysqli_query($connect, "delete from pengajuan where nik='$_GET[nik]'");

                  echo 'Data terhapus';
                  echo "<meta http-equiv=refresh content=2;URL='list_pengajuan.php'>";
                }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>

              