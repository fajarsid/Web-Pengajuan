<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
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
   <title>Administator</title>
 </head>
 <body>
   <!-- Welcome Text -->
   <main>
      <div class="main__container">
        <div class="main__title">
          <div class="main__greeting">
            <h1>Hello Administator</h1>
            <p>Selamat datang di admin dashboard</p>
          </div>
        </div>
      </div>
    </main>
    <!-- AKhir Welcome -->


    <!-- Sidebar -->
    <!-- <div class="area"></div> -->
    <nav class="main-menu">
      <ul>
          <li>
              <a href="#">
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

    <!-- Tabels -->
        <div class="container-tabels p-30" id="list">
            <div class="row">
              <div class="col-11 main-datatable">
                <div class="card_body">
                  <div class="row d-flex">
                    <div class="col-11 createSegment">
                      <a href="form_pengajuan.php"class="dim_button create_new"><i class="fas fa-user-plus"></i>Tambah Data</a>
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
                            <td><a href='form_edit.php?id=$tampil[id]'> <span class='actionCust'>
                            <i class='far fa-edit'></i></>
                            </span></a></td>
                            <td><a href='?id=$tampil[id]'><span class='actionCust'>
                            <i class='far fa-trash-alt'></i>
                            </span></a></td>
                            <td><a href='export.php?id=$tampil[id]'><span class='actionCust'>
                            <i class='fas fa-file-export'></i>  
                            </span></a></>
                                          

                        </tr>";

                        $no++;
                      }
                      ?>
                    </table>
                      <?php
                      if(isset($_GET['id'])){
                        mysqli_query($connect, "delete from pengajuan where id ='$_GET[id]'");

                        echo 'Data terhapus';
                        echo "<meta http-equiv=refresh content=2;URL='index.php'>";
                      }
                      ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Akhir Tabels -->
 </body>
</html>
    