<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: \Web-Pengajuan\index.php");
    exit;
}
?>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/home.css">
    <title>Administator</title>
    <div class="container">
        <nav class="navbar">
          <div class="nav_icon" onclick="toggleSidebar()">
            <i class="fa fa-bars" aria-hidden="true"></i>
          </div>
          <div class="navbar__left">
            <a class="active_link" href="#">Admin</a>
          </div>
          <div class="navbar__right">
            <a href="#">
              <i class="fa fa-search" aria-hidden="true"></i>
            </a>
            <a href="#">
              <img width="30" src="../img/admin.svg" alt="" />
            </a>
          </div>
        </nav>
        <main>
          <div class="main__container">
            <div class="main__title">
              <img src="../img/hello.svg" alt="" />
              <div class="main__greeting">
                <h1>Hello Administator</h1>
                <p>Selamat datang di admin dashboard</p>
              </div>
            </div>
            <!-- CARDS-->
            <div class="main__cards">
              <div class="card">
                <i
                  class="fa fa-user-o fa-2x text-lightblue"
                  aria-hidden="true"
                ></i>
                <div class="card_inner">
                  <p class="text-primary-p">Jumlah Pemohon</p>
                  <span class="font-bold text-title">578</span>
                </div>
              </div> 
            <!-- Akhir CARDS -->
          </div>
        </main>

        <!-- Sidebar -->
        <div id="sidebar">
          <div class="sidebar__title">
            <div class="sidebar__img">
              <!-- <img src="../img/logo.png" alt="logo" /> -->
              <h1>Web Permohonan Surat</h1>
            </div>
            <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
          </div>
  
          <div class="sidebar__menu">
            <div class="sidebar__link active_menu_link">
              <i class="fa fa-home"></i>
              <a href="#">Dashboard</a>
            </div>
            <h2>Form</h2>
            <div class="sidebar__link">
              <i class="fa fa-user-secret" aria-hidden="true"></i>
              <a href="list_pengajuan.php">List Pengajuan</a>
            </div>
            <div class="sidebar__link">
              <i class="fa fa-building-o"></i>
              <a href="form_pengajuan.php">Form Pengajuan</a>
            </div>
            <div class="sidebar__logout">
              <i class="fa fa-power-off"></i>
              <a href="logout.php">Log out</a>
            </div>
          </div>
        </div>
        <!-- Akhir Sidebar -->
        </div>
      </div>
    </div>