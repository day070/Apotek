<?php
session_start();
include("conn.php");
$err = '';

if (@$_POST["submit"]) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($username == "" or $password == "") {
        $err .= "<li>Silahkan masukan username dan password</li>";
    } else {
        $sql1 = "SELECT * FROM tb_login WHERE username ='$username'";
        $q1 = mysqli_query($conn, $sql1);
        $r1 = mysqli_fetch_array($q1);
        if ($r1) {
            if (!$r1['username']) {
                $err .= "<li>Username <b>$username</b> tidak tersedia</li>";
            } elseif ($r1['password'] != $password) {
                $err .= '<li>Maaf password tidak cocok</li>';
            }
            if (empty($err)) {
                $_SESSION['session_username'] = $r1['username'];
                $_SESSION['session_passwprd'] = $password;
                $_SESSION['login'] = "true";
                $_SESSION['id_karyawan'] = $r1['id_karyawan'];
                header("Location: obat/tampil_obat.php");
            }
        } else {
            $err .= "<li>Username <b>$username</b> tidak tersedia</li>";
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
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
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" id="nama" name="username" autocomplete="off">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password">
                                    </div>
                                    <a href="register.php">Tidak Punya Akun ?</a>
                            </div>
                            <input type="submit" name="submit" value="Login" class="btn btn-primary w-0">
                            <div>
                                <?php if ($err) { ?>
                                    <div id="login-alert" class="alert alert-danger col-sm-12">
                                        <ul><?php echo $err ?></ul>
                                    </div>
                                <?php } ?>
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