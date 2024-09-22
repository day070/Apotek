<?php
include("../conn.php");
$id = $_GET['id_obat'];
$result = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE id_karyawan = '$id'") or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($result)) {
    $nama_karyawan = $row["nama_karyawan"];
    $alamat = $row["alamat"];
    $telp = $row["telp"];
}
?>
<?php
if (isset($_POST['submit'])) {
    $nama_karyawan = $_POST['nama_karyawan'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $telp_karyawan = $_POST['nomor_hp_pengawai'];

    $queryUpdate = mysqli_query($conn, "UPDATE tb_karyawan SET nama_karyawan= '$nama_karyawan', alamat = '$alamat',telp='$telp' WHERE id_karyawan=$id ");

    if ($queryUpdate) {
?>
        <h1>Berhasil</h1>
        <meta http-equiv="refresh" content="2; url=tampil_karyawan.php" />
<?php
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!-- </body>

</html> -->
<?php
include("../session.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <?php include("../component/sidebar.php") ?>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <?php include("../component/header.php") ?>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Edit Karyawan</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Karyawan</label>
                                            <input type="text" name="nama_karyawan" class="form-control" value="<?= $nama_karyawan ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" value="<?= $alamat ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nomor Telepon</label>
                                            <input type="number" name="telp" class="form-control" value="<?= $telp ?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>