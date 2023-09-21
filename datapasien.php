<?php 
error_reporting(0);
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
include 'koneksi.php';
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	$a = mysqli_query($koneksi, "select * from pasien where nama_pasien like '%".$cari."%'"); 
}else{
    $a = mysqli_query($koneksi, "select * from pasien"); 
} $i =1;?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Data Pasien - SiKlinik</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/LOGO STMIK BARU.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.php">
                    <span style="color: white;">SiKlinik</span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>

            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Menu</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./index.php">Home 1</a></li>
                            <li><a href="./logout.php">logout</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Pasien</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./daftarpasien.php">Daftar Pasien</a></li>
                            <li><a href="./datapasien.php">Data Pasien</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Pelayanan Rawat</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./rawatjalan.php">Rawat Jalan</a></li>
                            <li><a href="./datarawatjalan.php">Data Rawat Jalan</a></li>
                            <li><a href="./rawatinap.php">Rawat Inap</a></li>
                            <li><a href="./datarawatinap.php">Rawat Inap</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Petugas</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./perawat.php">Perawat</a></li>
                            <li><a href="./dataperawat.php">Data Perawat</a></li>
                            <li><a href="./dokter.php">Dokter</a></li>
                            <li><a href="./datadokter.php">Data Dokter</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Obat</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./obat.php">Obat</a></li>
                            <li><a href="./dataobat.php">Data Obat</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row mb-3">
                <div class="col-md-8">
                    <form class="d-flex" role="search" action="datapasien.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Cari Nama Mahasiswa"
                            aria-label="Search" name="cari">
                        <button class="btn btn-outline-success" type="submit">Cari </button>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <h1>Data Pasien</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="align-top">NO</th>
                            <th scope="col" class="align-top">Id Pasien</th>
                            <th scope="col" class="align-top">Nama Pasien</th>
                            <th scope="col" class="align-top">Tanggal Lahir</th>
                            <th scope="col" class="align-top">Umur</th>
                            <th scope="col" class="align-top">Tinggi Badan</th>
                            <th scope="col" class="align-top">Jenis Kelamin</th>
                            <th scope="col" class="align-top">Alamat</th>
                            <th scope="col" class="align-top">Keluhan Utama</th>
                            <th scope="col" class="align-top">Riwayat Kesehatan Sebelumnya</th>
                            <th scope="col" class="align-top">Riwayat Penyakit yang dideita saat ini</th>
                            <th scope="col" class="align-top">Berat Badan</th>
                            <th scope="col" class="align-top">Nomor Telepon</th>
                            <th scope="col" class="align-top">Rambut dan Kulit kepala</th>
                            <th scope="col" class="align-top">Mata</th>
                            <th scope="col" class="align-top">Hidung</th>
                            <th scope="col" class="align-top">Leher</th>
                            <th scope="col" class="align-top">Jantung</th>
                            <th scope="col" class="align-top">Payudara dan Aksila</th>
                            <th scope="col" class="align-top">Genitalia dan Perkemihan</th>
                            <th scope="col" class="align-top">Kaki</th>
                            <th scope="col" class="align-top">Pola Istirahat dan Tidur</th>
                            <th scope="col" class="align-top">Telinga</th>
                            <th scope="col" class="align-top">Mulut</th>
                            <th scope="col" class="align-top">Paru Paru</th>
                            <th scope="col" class="align-top">Abdomen</th>
                            <th scope="col" class="align-top">Tangan</th>
                            <th scope="col" class="align-top">Rektum Anus</th>
                            <th scope="col" class="align-top">Punggung</th>
                            <th scope="col" class="align-top">Pola Aktivitas Harian</th>
                            <th scope="col" class="align-top">Hasil Pemeriksaan dan Diagnostik</th>
                            <th scope="col" class="align-top">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while( $row = mysqli_fetch_assoc($a)) :?>
                        <tr>
                            <th scope=" row"><?php echo $i ?></th>
                            <td><?php echo $row["id_pasien"];  ?></td>
                            <td><?php echo $row["nama_pasien"];  ?></td>
                            <td><?php echo $row["tanggal_lahir"];  ?></td>
                            <td><?php echo $row["umur"];  ?></td>
                            <td><?php echo $row["tinggi_badan"];  ?></td>
                            <td><?php echo $row["jenis_kelamin"];  ?></td>
                            <td><?php echo $row["alamat"];  ?></td>
                            <td><?php echo $row["keluhan_utama"];  ?></td>
                            <td><?php echo $row["riwayat_sebelumnya"];  ?></td>
                            <td><?php echo $row["riwayat_sekarang"];  ?></td>
                            <td><?php echo $row["berat_badan"];  ?></td>
                            <td><?php echo $row["nomor_telepon"];  ?></td>
                            <td><?php echo $row["rambut_kulit_kepala"];  ?></td>
                            <td><?php echo $row["mata"];  ?></td>
                            <td><?php echo $row["hidung"];  ?></td>
                            <td><?php echo $row["leher"];  ?></td>
                            <td><?php echo $row["jantung"];  ?></td>
                            <td><?php echo $row["payudara_aksila"];  ?></td>
                            <td><?php echo $row["genitilia_perkemihan"];  ?></td>
                            <td><?php echo $row["kaki"];  ?></td>
                            <td><?php echo $row["pola_istirahat_tidur"];  ?></td>
                            <td><?php echo $row["telinga"];  ?></td>
                            <td><?php echo $row["mulut"];  ?></td>
                            <td><?php echo $row["paru_paru"];  ?></td>
                            <td><?php echo $row["abdomen"];  ?></td>
                            <td><?php echo $row["tangan"];  ?></td>
                            <td><?php echo $row["rektum_anus"];  ?></td>
                            <td><?php echo $row["punggung"];  ?></td>
                            <td><?php echo $row["pola_aktivitas_harian"];  ?></td>
                            <td><?php echo $row["hasil_pemeriksaan"];  ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="editpasien.php?id_pasien=<?php echo $row["id_pasien"]?>"
                                        class="btn btn-warning "><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                            viewBox="0 0 512 512">
                                            <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path
                                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                        </svg></a>
                                    <a href="cetakdatapasien.php?id_pasien=<?php echo $row["id_pasien"]?>"
                                        class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                            viewBox="0 0 512 512">
                                            <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path
                                                d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                                        </svg></a>
                                    <a href="hapuspasien.php?id_pasien=<?php echo $row["id_pasien"]?>"
                                        class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                            viewBox="0 0 448 512">
                                            <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path
                                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                        </svg></a>
                                </div>
                            </td>
                        </tr>
                        <?php $i++ ;?>
                        <?php endwhile;?>
                    </tbody>
                </table>


            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; SiKULI</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="./plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="./plugins/d3v3/index.js"></script>
    <script src="./plugins/topojson/topojson.min.js"></script>
    <script src="./plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="./plugins/raphael/raphael.min.js"></script>
    <script src="./plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="./plugins/chartist/js/chartist.min.js"></script>
    <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



    <script src="./js/dashboard/dashboard-1.js"></script>

</body>

</html>