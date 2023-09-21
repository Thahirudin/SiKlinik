<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
include 'koneksi.php';
$id = $_GET['id_pasien'];
$query="DELETE from rawat_inap where id_pasien ='$id'";
$query1="DELETE from rawat_jalan where id_pasien ='$id'";
$query2="DELETE from pasien where id_pasien ='$id'";
mysqli_query($koneksi, $query1);
mysqli_query($koneksi, $query);
mysqli_query($koneksi, $query2);
// mengalihkan ke halaman index.php
header("location:datapasien.php");
 ?>