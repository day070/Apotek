<?php
include("conn.php");


if (@$_POST['signUp']) {
    $nama_karyawan = $_POST['nama_karyawan'];
    $id_karyawan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_karyawan FROM tb_karyawan WHERE nama_karyawan = '$nama_karyawan'"));
    $id_karyawan = $id_karyawan["id_karyawan"];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "INSERT INTO tb_login VALUES (NULL,'$username','$password','admin','$id_karyawan')");

    if ($query) {
        echo "<script>alert('Akun Sudah Berhasil dibuat silahkan Login')</script>";
        echo "<script>window.location='index.php'</script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="assets/images/logos/dark-logo.svg" width="180" alt="">
                                </a>
                                <p class="text-center">Your Social Campaigns</p>
                                <form action="" method="post">
                                    <datalist id="nama_karyawan">
                                        <?php
                                        include("../conn.php");
                                        $list = mysqli_query($conn, "SELECT nama_karyawan FROM tb_karyawan");
                                        while ($row = mysqli_fetch_assoc($list)) {
                                        ?>
                                            <option value="<?= $row['nama_karyawan'] ?>"></option>
                                        <?php
                                        }
                                        ?>
                                    </datalist>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Karyawan</label>
                                        <input type="text" class="form-control" name="nama_karyawan" list="nama_karyawan" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <input type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" name="signUp"></input>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Sudah Punya Akun?</p>
                                        <a class="text-primary fw-bold ms-2" href="index.php">Sign In</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>