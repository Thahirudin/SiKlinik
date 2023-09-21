<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
include 'koneksi.php';
$id = $_GET['id_petugas'];
$a = mysqli_query($koneksi, "select * from petugas where id_petugas = '$id'"); 
$petugas = mysqli_fetch_assoc($a);
if ($petugas['jabatan']=="dokter") {
    $query="DELETE from petugas where id_petugas ='$id'";
    mysqli_query($koneksi, $query);
    // mengalihkan ke halaman index.php
    header("location:datadokter.php");
}else{
    $query="DELETE from petugas where id_petugas ='$id'";
    mysqli_query($koneksi, $query);
    // mengalihkan ke halaman index.php
    header("location:dataperawat.php");
}


 ?>