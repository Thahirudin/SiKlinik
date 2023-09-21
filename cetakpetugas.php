<?php 
error_reporting(0);
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
include 'koneksi.php';
$id  = $_GET['id_petugas'];
$a = mysqli_query($koneksi, "select * from petugas where id_petugas = '$id' ");
$rawatjalan = mysqli_fetch_assoc($a);
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
            <h1 style="text-align: center;">Data Petugas</h1>
        </div>
        <div class="row">
            <div class="col-4">Id Petugas</div>
            <div class="col-1">:</div>
            <div class="col"><?php echo $rawatjalan['id_petugas'] ?></div>
        </div>
        <div class="row">
            <div class="col-4">Nama</div>
            <div class="col-1">:</div>
            <div class="col"><?php echo $rawatjalan['nama'] ?></div>
        </div>
        <div class="row">
            <div class="col-4">Jabatan</div>
            <div class="col-1">:</div>
            <div class="col"><?php echo $rawatjalan['jabatan'] ?></div>
        </div>
        <div class="row">
            <div class="col-4">Tanggal lahir</div>
            <div class="col-1">:</div>
            <div class="col"><?php echo $rawatjalan['tanggal_lahir'] ?></div>
        </div>
        <div class="row">
            <div class="col-4">Alamat</div>
            <div class="col-1">:</div>
            <div class="col"><?php echo $rawatjalan['alamat'] ?></div>
        </div>
        <div class="row">
            <div class="col-4">Nomor Telepon</div>
            <div class="col-1">:</div>
            <div class="col"><?php echo $rawatjalan['nomor_telepon'] ?></div>
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