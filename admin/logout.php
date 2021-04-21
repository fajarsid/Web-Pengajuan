<?php

session_start();
 
$_SESSION = array();
 
session_destroy();
 
header("location: \Web-Pengajuan\index.php");
exit;
?>