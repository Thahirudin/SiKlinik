<?php 
error_reporting(0);
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
$id = $_GET['id_petugas'];
include 'koneksi.php';
include 'function.php';
$a = mysqli_query($koneksi, "select * from petugas where id_petugas = '$id'");
$petugas = mysqli_fetch_assoc($a);
if (isset($_POST['submit'])) {
    if (editpetugas($_POST) > 0) {
      echo "
          <script>
            alert('Data Perawat Berhasil Diedit!');
            document.location.href = 'dataperawat.php';
          </script>
      ";
    }
    else {
      echo "
          <script>
            alert('Data Gagal Diedit!');
            document.location.href = 'dataperawat.php';
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
    <title>Edit Perawat- SiKlinik</title>
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
            <div class="container">
                <form method="post">
                    <div class="container rounded p-4" style="background-color: white;">
                        <h1>Edit Perawat</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3"><label for="namapetugas">Nama petugas</label>
                                    <input type="text" class="form-control" id="namapetugas"
                                        placeholder="name@example.com" name="namapetugas" autocomplete="off" required
                                        value="<?php echo $petugas['nama'] ?>">

                                </div>
                                <div class="form-floating mb-3" hidden> <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" placeholder="name@example.com"
                                        name="jabatan" autocomplete="off" required value="Perawat">

                                </div>
                                <div class="form-floating mb-3" hidden><label for="idpetugas">idpetugas</label>
                                    <input type="text" class="form-control" id="idpetugas"
                                        placeholder="name@example.com" name="idpetugas" autocomplete="off" required
                                        value="<?php echo $petugas['id_petugas'] ?>">

                                </div>
                                <div class="form-floating mb-3"><label for="tanggallahir">Tanggal lahir</label>
                                    <input type="date" class="form-control" id="tanggallahir" placeholder="a"
                                        name="tanggallahir" autocomplete="off" required
                                        value="<?php echo $petugas['tanggal_lahir'] ?>">

                                </div>
                                <div class="mb-3">
                                    <label for="">Jenis Kelamin</label>
                                    <select class="form-control" aria-label=".form-select-lg example"
                                        name="jeniskelamin">
                                        <?php $jeniskelamin = $petugas['jenis_kelamin'] ;
                                    if ($jeniskelamin == "Pria") {
                                        echo "<option selected value=Pria>Pria</option>
                                        <option value=Wanita>Wanita</option>";
                                    } else {
                                        echo "<option value=Pria>Pria</option>
                                        <option selected value=Wanita>Wanita</option>";
                                    }?>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3"><label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" placeholder="name@example.com"
                                        name="alamat" autocomplete="off" required
                                        value="<?php echo $petugas['alamat'] ?>">

                                </div>
                                <div class="form-floating mb-3"><label for="nomotelepon">Nomor Telepon</label>
                                    <input type="number" class="form-control" id="nomotelepon"
                                        placeholder="name@example.com" name="nomortelepon" autocomplete="off" required
                                        value="<?php echo $petugas['nomor_telepon'] ?>">

                                </div>
                            </div>
                        </div>
                        <div class="pb-3"> <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
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