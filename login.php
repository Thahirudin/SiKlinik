<?php 
include "koneksi.php";
error_reporting(0);

session_start();
 
if (isset($_SESSION['login'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $iduser = $_POST['iduser'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM petugas WHERE id_petugas = '$iduser' ";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    $password1 = $row['password'];

    if (password_verify($password, $password1)) { //memverifikasi apakah enkripsi password login sesuai
          session_start();
          $_SESSION['login'] = true;
          $_SESSION['nama'] = $row['nama'];
          $_SESSION['iduser'] = $row['iduser'];
          $_SESSION['jabatan'] = $row['jabatan'];
           header("Location: index.php");
    }else {
        echo "<script>alert('Id User atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style type="text/css">
    .login {
        background-color: #C600FF;
        width: 300px;
        margin: 100px auto;
        padding: 30px;
    }
    </style>
</head>

<body>
    <div class="container">
        <form class="login rounded" method="post">

            <div>
                <h1 style="color: white;">Login</h1>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="iduser" required>

                <label for="floatingInput">ID USER</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingInput" placeholder="password" name="password"
                    required>

                <label for="floatingInput">Password</label>
            </div>
            <div>
                <button type="submit" class="btn btn-success" name="submit">Submit</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>