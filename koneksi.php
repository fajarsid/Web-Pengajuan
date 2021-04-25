<?php
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 

// koneksi ke database
$connect = mysqli_connect("localhost","root","","dbpengajuan" );
//   if($connect){
//         echo 'Berhasil';
//     }
?>