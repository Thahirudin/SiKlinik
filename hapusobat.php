<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
include 'koneksi.php';
$id = $_GET['id'];
$query="DELETE from obat where id_obat ='$id'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:dataobat.php");
 ?>