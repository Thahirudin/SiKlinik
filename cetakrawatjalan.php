<?php 
error_reporting(0);
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
include 'koneksi.php';
$id  = $_GET['id'];
$a = mysqli_query($koneksi, "select * from rawat_jalan where id = '$id' ");
$rawatjalan = mysqli_fetch_assoc($a);
$id_pasien = $rawatjalan['id_pasien'];
$id_obat = $rawatjalan['id_obat'];
$id_petugas = $rawatjalan['id_petugas'];
$c = mysqli_query($koneksi, "select * from pasien where id_pasien = '$id_pasien'");
$b = mysqli_query($koneksi, "select * from petugas where id_petugas = '$id_petugas'");
$d = mysqli_query($koneksi, "select * from obat where id_obat = '$id_obat'");
$rowpasien = mysqli_fetch_assoc($c);
$rowpetugas = mysqli_fetch_assoc($b);
$rowobat = mysqli_fetch_assoc($d);
$i = 1;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
    .col-5 {
        font-weight: 700;


    }

    .row {
        padding-bottom: 2px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <h1 style="text-align: center;">Data Rawat Jalan</h1>
        </div>
        <div class="row">
            <div class="col-2">Nomor</div>
            <div class="col-1">:</div>
            <div class="col"><?php echo $rawatjalan['id'] ?></div>
        </div>
        <div class="row">
            <div class="col-2">Tahun Masuk</div>
            <div class="col-1">:</div>
            <div class="col"><?php echo $rawatjalan['tahun_masuk'] ?></div>
        </div>
        <div class="row">
            <div class="col-2">Nama Pasien</div>
            <div class="col-1">:</div>
            <div class="col"><?php echo $rowpasien['nama_pasien'] ?></div>
        </div>
        <div class="row">
            <div class="col-2">Nama Dokter</div>
            <div class="col-1">:</div>
            <div class="col"><?php echo $rowpetugas['nama'] ?></div>
        </div>
        <div class="row">
            <div class="col-2">Nama Obat</div>
            <div class="col-1">:</div>
            <div class="col"><?php echo $rowobat['nama_obat'] ?></div>
        </div>
    </div>
    <script>
    window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>