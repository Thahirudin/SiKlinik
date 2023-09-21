<?php 
error_reporting(0);
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
include 'koneksi.php';
$id_pasien   = $_GET['id_pasien'];
$a = mysqli_query($koneksi, "select * from pasien where id_pasien = '$id_pasien' ");
$row = mysqli_fetch_assoc($a);
$i = 1;
include 'function.php';
if (isset($_POST['submit'])) {
    if (editpasien($_POST) > 0) {
      echo "
          <script>
            alert('Data Pasien Berhasil Diedit!');
            document.location.href = 'datapasien.php';
          </script>
      ";
    }
    else {
      echo "
          <script>
            alert('Data Gagal Diedit!');
            document.location.href = 'datapasien.php';
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
    <title>Edit Pasien - SiKlinik</title>
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
                            <li><a href="./index.php">Home </a></li>
                            <li><a href="./logout.php">logout</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
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
                    <h1>Edit Pasien</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="namapasien" placeholder="name@example.com"
                                    name="namapasien" autocomplete="off" required
                                    value="<?php echo $row['nama_pasien'] ?>">
                                <label for="namapasien">Nama Pasien</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="tanggallahir" placeholder="a"
                                    name="tanggallahir" autocomplete="off" required
                                    value="<?php echo $row['tanggal_lahir'] ?>">
                                <label for="tanggallahir">Tanggal lahir</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="keluhanutama" placeholder="name@example.com"
                                    name="keluhanutama" autocomplete="off" required
                                    value="<?php echo $row['keluhan_utama'] ?>">
                                <label for="keluhanutama">Keluhan Utama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="riwayatsebelumnya"
                                    placeholder="name@example.com" name="riwayatsebelumnya" autocomplete="off" required
                                    value="<?php echo $row['riwayat_sebelumnya'] ?>">
                                <label for="riwayatsebelumnya">Riwayat Kesehatan sebelumnya</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="tinggibadan"
                                    placeholder="name@example.com" name="tinggibadan" autocomplete="off" required
                                    value="<?php echo $row['tinggi_badan'] ?>">
                                <label for="tinggibadan">Tinggi Badan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="alamat" placeholder="name@example.com"
                                    name="alamat" autocomplete="off" required value="<?php echo $row['alamat'] ?>">
                                <label for="alamat">Alamat</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="umur" placeholder="name@example.com"
                                    name="umur" autocomplete="off" required value="<?php echo $row['umur'] ?>">
                                <label for="umur">Umur</label>
                            </div>
                            <div class="mb-3">
                                <label for="">Jenis Kelamin</label>
                                <select class="form-control" aria-label=".form-select-lg example" name="jeniskelamin">
                                    <?php $jeniskelamin = $row['jenis_kelamin'] ;
                                    if ($jeniskelamin == "Pria") {
                                        echo "<option selected value=Pria>Pria</option>
                                        <option value=Wanita>Wanita</option>";
                                    } else {
                                        echo "<option value=Pria>Pria</option>
                                        <option selected value=Wanita>Wanita</option>";
                                    }?>

                                </select>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="riwayatpenyakitsaatini"
                                    placeholder="name@example.com" name="riwayatpenyakitsaatini" autocomplete="off"
                                    required value="<?php echo $row['riwayat_sekarang'] ?>">
                                <label for="riwayatpenyakitsaatini">Riwayat Penyakit saat Ini</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="beratbadan" placeholder="name@example.com"
                                    name="beratbadan" autocomplete="off" required
                                    value="<?php echo $row['berat_badan'] ?>">
                                <label for="beratbadan">Berat Badan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="nomotelepon"
                                    placeholder="name@example.com" name="nomortelepon" autocomplete="off" required
                                    value="<?php echo $row['nomor_telepon'] ?>">
                                <label for="nomotelepon">Nomor Telepon</label>
                            </div>
                            <div class="form-floating mb-3" hidden>
                                <input type="number" class="form-control" id="nomotelepon"
                                    placeholder="name@example.com" name="id_pasien" autocomplete="off" required
                                    value="<?php echo $id_pasien ?>" hidden>
                                <label for="nomotelepon">Id Pasien</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <h2>Pengkajian Fisik</h2>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="rambut_kulitkepala"
                                    placeholder="name@example.com" name="rambutkulitkepala" autocomplete="off " required
                                    value="<?php echo $row['rambut_kulit_kepala'] ?>">
                                <label for="rambut_kulitkepala">Rambut dan Kulit Kepala</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="mata" placeholder="a" name="mata"
                                    autocomplete="off" required value="<?php echo $row['mata'] ?>">
                                <label for="mata">Mata</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="hidung" placeholder="a" name="hidung"
                                    autocomplete="off" required value="<?php echo $row['hidung'] ?>">
                                <label for="hidung">Hidung</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="leher" placeholder="a" name="leher"
                                    autocomplete="off" required value="<?php echo $row['leher'] ?>">
                                <label for="leher">Leher</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="jantung" placeholder="a" name="jantung"
                                    autocomplete="off" required value="<?php echo $row['jantung'] ?>">
                                <label for="jantung">Jantung</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="payudara_aksila" placeholder="a"
                                    name="payudara_aksila" autocomplete="off" required
                                    value="<?php echo $row['payudara_aksila'] ?>">
                                <label for="payudara_aksila">payudara dan aksila</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="genitalia_perkemihan" placeholder="a"
                                    name="genitalia_perkemihan" autocomplete="off" required
                                    value="<?php echo $row['genitilia_perkemihan'] ?>">
                                <label for="genitalia_perkemihan">genitalia dan perkemihan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="kaki" placeholder="a" name="kaki"
                                    autocomplete="off" required value="<?php echo $row['kaki'] ?>">
                                <label for=" kaki">kaki</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="pola_istirahat_tidur" placeholder="a"
                                    name="pola_istirahat_tidur" autocomplete="off" required
                                    value="<?php echo $row['pola_istirahat_tidur'] ?>">
                                <label for="pola_istirahat_tidur">pola istirahat dan tidur</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="hasil_pemeriksaan" placeholder="a"
                                    name="hasil_pemeriksaan" autocomplete="off" required
                                    value="<?php echo $row['hasil_pemeriksaan'] ?>">
                                <label for="hasil_pemeriksaan">Hasil Pemeriksaan laboratorium dan Diagnostik</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="telinga" placeholder="name@example.com"
                                    name="telinga" autocomplete="off" required value="<?php echo $row['telinga'] ?>">
                                <label for="telinga">Telinga</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="mulut" placeholder="name@example.com"
                                    name="mulut" autocomplete="off" required value="<?php echo $row['mulut'] ?>">
                                <label for="mulut">Mulut</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="paruparu" placeholder="name@example.com"
                                    name="paruparu" autocomplete="off" required value="<?php echo $row['paru_paru'] ?>">
                                <label for="paruparu">Paru-Paru</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="abdomen" placeholder="name@example.com"
                                    name="abdomen" autocomplete="off" required value="<?php echo $row['abdomen'] ?>">
                                <label for="abdomen">Abdomen</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="tangan" placeholder="name@example.com"
                                    name="tangan" autocomplete="off" required value="<?php echo $row['tangan'] ?>">
                                <label for="tangan">Tangan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="rektum_anus" placeholder="name@example.com"
                                    name="rektum_anus" autocomplete="off" required
                                    value="<?php echo $row['rektum_anus'] ?>">
                                <label for="rektum_anus">rektum dan anus</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="punggung" placeholder="name@example.com"
                                    name="punggung" autocomplete="off" required value="<?php echo $row['punggung'] ?>">
                                <label for="punggung">punggung</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="polaaktivitasharian"
                                    placeholder="name@example.com" name="polaaktivitasharian" autocomplete="off"
                                    required value="<?php echo $row['pola_aktivitas_harian'] ?>">
                                <label for="polaaktivitasharian">pola aktivitas harian</label>
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
                <p>Copyright &copy; SiKLINIK</p>
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