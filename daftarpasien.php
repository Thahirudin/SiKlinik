<?php 
error_reporting(0);
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
} 
include 'koneksi.php';
include 'function.php';
if (isset($_POST['submit'])) {
    if (tambahpasien($_POST) > 0) {
      echo "
          <script>
            alert('Data Pasien Berhasil Ditambahkan!');
            document.location.href = 'datapasien.php';
          </script>
      ";
    }
    else {
      echo "
          <script>
            alert('Data Gagal Ditambahkan!');
            document.location.href = 'daftarpasien.php';
          </script>
      ";
    }
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Input Pasien - SiKlinik</title>
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
            <form method="post">
                <div class="container">
                    <h2>Daftar Pasien</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3"><label for="namapasien">Nama Pasien</label>
                                <input type="text" class="form-control" id="namapasien" placeholder="silahkan isi"
                                    name="namapasien" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="tanggallahir">Tanggal lahir</label>
                                <input type="date" class="form-control" id="tanggallahir" placeholder="a"
                                    name="tanggallahir" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="keluhanutama">Keluhan Utama</label>
                                <input type="text" class="form-control" id="keluhanutama" placeholder="silahkan isi"
                                    name="keluhanutama" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="riwayatsebelumnya">Riwayat Kesehatan
                                    sebelumnya</label>
                                <input type="text" class="form-control" id="riwayatsebelumnya"
                                    placeholder="silahkan isi" name="riwayatsebelumnya" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="tinggibadan">Tinggi Badan</label>
                                <input type="number" class="form-control" id="tinggibadan" placeholder="silahkan isi"
                                    name="tinggibadan" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" placeholder="silahkan isi"
                                    name="alamat" autocomplete="off" required>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3"><label for="umur">Umur</label>
                                <input type="number" class="form-control" id="umur" placeholder="silahkan isi"
                                    name="umur" autocomplete="off" required>

                            </div>
                            <div class="mb-3">
                                <label for="">Jenis Kelamin</label>
                                <select class="form-control" aria-label=".form-select-lg example" name="jeniskelamin">
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>

                            <div class="form-floating mb-3"><label for="riwayatpenyakitsaatini">Riwayat Penyakit saat
                                    Ini</label>
                                <input type="text" class="form-control" id="riwayatpenyakitsaatini"
                                    placeholder="silahkan isi" name="riwayatpenyakitsaatini" autocomplete="off"
                                    required>

                            </div>
                            <div class="form-floating mb-3"><label for="beratbadan">Berat Badan</label>
                                <input type="number" class="form-control" id="beratbadan" placeholder="silahkan isi"
                                    name="beratbadan" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="nomotelepon">Nomor Telepon</label>
                                <input type="number" class="form-control" id="nomotelepon" placeholder="silahkan isi"
                                    name="nomortelepon" autocomplete="off" required>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <h2>Pengkajian Fisik</h2>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-floating mb-3"><label for="rambut_kulitkepala">Rambut dan Kulit
                                    Kepala</label>
                                <input type="text" class="form-control" id="rambut_kulitkepala"
                                    placeholder="silahkan isi" name="rambutkulitkepala" autocomplete="off " required>

                            </div>
                            <div class="form-floating mb-3"><label for="mata">Mata</label>
                                <input type="text" class="form-control" id="mata" placeholder="silahkan isi" name="mata"
                                    autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="hidung">Hidung</label>
                                <input type="text" class="form-control" id="hidung" placeholder="silahkan isi"
                                    name="hidung" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="leher">Leher</label>
                                <input type="text" class="form-control" id="leher" placeholder="silahkan isi"
                                    name="leher" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="jantung">Jantung</label>
                                <input type="text" class="form-control" id="jantung" placeholder="silahkan isi"
                                    name="jantung" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="payudara_aksila">payudara dan aksila</label>
                                <input type="text" class="form-control" id="payudara_aksila" placeholder="silahkan isi"
                                    name="payudara_aksila" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="genitalia_perkemihan">genitalia dan
                                    perkemihan</label>
                                <input type="text" class="form-control" id="genitalia_perkemihan"
                                    placeholder="silahkan isi" name="genitalia_perkemihan" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"> <label for="kaki">kaki</label>
                                <input type="text" class="form-control" id="kaki" placeholder="silahkan isi" name="kaki"
                                    autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="pola_istirahat_tidur">pola istirahat dan
                                    tidur</label>
                                <input type="text" class="form-control" id="pola_istirahat_tidur"
                                    placeholder="silahkan isi" name="pola_istirahat_tidur" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="hasil_pemeriksaan">Hasil Pemeriksaan
                                    laboratorium dan Diagnostik</label>
                                <input type="text" class="form-control" id="hasil_pemeriksaan"
                                    placeholder="silahkan isi" name="hasil_pemeriksaan" autocomplete="off" required>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3"><label for="telinga">Telinga</label>
                                <input type="text" class="form-control" id="telinga" placeholder="name@example.com"
                                    name="telinga" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="mulut">Mulut</label>
                                <input type="text" class="form-control" id="mulut" placeholder="silahkan isi"
                                    name="mulut" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="paruparu">Paru-Paru</label>
                                <input type="text" class="form-control" id="paruparu" placeholder="silahkan isi"
                                    placeholder="silahkan isi" name="paruparu" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"> <label for="abdomen">Abdomen</label>
                                <input type="text" class="form-control" id="abdomen" placeholder="silahkan isi"
                                    name="abdomen" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="tangan">Tangan</label>
                                <input type="text" class="form-control" id="tangan" placeholder="silahkan isi"
                                    name="tangan" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="rektum_anus">rektum dan anus</label>
                                <input type="text" class="form-control" id="rektum_anus" placeholder="silahkan isi"
                                    name="rektum_anus" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="punggung">punggung</label>
                                <input type="text" class="form-control" id="punggung" placeholder="silahkan isi"
                                    name="punggung" autocomplete="off" required>

                            </div>
                            <div class="form-floating mb-3"><label for="polaaktivitasharian">pola aktivitas
                                    harian</label>
                                <input type="text" class="form-control" id="polaaktivitasharian"
                                    placeholder="silahkan isi" name="polaaktivitasharian" autocomplete="off" required>

                            </div>
                        </div>
                    </div>
                    <div class="pb-3"> <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
            </form>
            <!-- #/ container -->
        </div>

        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a>
                    2018</p>
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