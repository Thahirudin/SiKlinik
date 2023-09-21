<?php 
error_reporting(0);
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
include 'koneksi.php';
$id_pasien = $_GET['id_pasien'];
$a = mysqli_query($koneksi, "select * from pasien where id_pasien = '$id_pasien' ");
$row = mysqli_fetch_assoc($a);
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
            <h1 style="text-align: center;">Data Pasien Klinik</h1>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-5">Nama Pasien</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['nama_pasien'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Tanggal Lahir</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['tanggal_lahir'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Keluhan Utama</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['keluhan_utama'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Riwayat Kesehatan Sebelumnya</div>
                    <div class="col-1">:
                    </div>
                    <div class=" col-6"><?php echo $row['riwayat_sebelumnya'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Tinggi Badan</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['tinggi_badan'] ?></div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-5">Alamat</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['alamat'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Jenis Kelamin</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['jenis_kelamin'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Riwayat Penyakit Saat Ini</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['riwayat_sekarang'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">berat Badan</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['berat_badan'] ?></div>
                </div>
            </div>
        </div>
        <div>
            <h4 style="text-align: center;">Pengkajian Fisik</h4>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-5">Rambut dan Kulit Kepala</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['rambut_kulit_kepala'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Mata</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['mata'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Hidung</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['leher'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Payudara dan Aksila</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['payudara_aksila'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Genitalia dan Perkemihan</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['genitilia_perkemihan'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">kaki</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['kaki'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">pola istirahat dan tidur</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['pola_istirahat_tidur'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Hasil pemeriksaan Laboratorium dan Diagnosis</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['hasil_pemeriksaan'] ?></div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-5">telinga</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['telinga'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Mulut</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['mulut'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Paru - Paru</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['paru_paru'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Abdomen</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['abdomen'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Tangan</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['tangan'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Rektum dan Anus</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['rektum_anus'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">pola Aktivitas harian</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['pola_aktivitas_harian'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Punggung</div>
                    <div class="col-1">:</div>
                    <div class="col-6"><?php echo $row['punggung'] ?></div>
                </div>
            </div>
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