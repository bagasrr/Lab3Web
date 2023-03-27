<?php
$host = 'localhost';
$user = 'root';
$pw   = '';
$db   = 'latihan1';
$conn = mysqli_connect($host, $user, $pw, $db);
//   if($conn){
//      cho "koneksi berhasil";
//   }

mysqli_select_db($conn,$db);
?>