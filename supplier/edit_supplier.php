<?php
include("../conn.php");
$id = $_GET['id_supplier'];
$result = mysqli_query($conn, "SELECT * FROM tb_supplier WHERE id_supplier = '$id'") or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($result)) {
    $perusahaan = $row["perusahaan"];
    $alamat = $row["alamat"];
    $telp = $row["telp"];
    $keterangan = $row["keterangan"];
}
?>
<?php
if (isset($_POST['submit'])) {
    $perusahaan = $_POST['perusahaan'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $keterangan = $_POST['keterangan'];

    $queryUpdate = mysqli_query($conn, "UPDATE tb_supplier SET perusahaan= '$perusahaan', alamat = '$alamat',telp='$telp',keterangan='$keterangan' WHERE id_supplier=$id ");

    if ($queryUpdate) {
?>
        <h1>Berhasil</h1>
        <meta http-equiv="refresh" content="2; url=tampil_supplier.php" />
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
                            <h5 class="card-title fw-semibold mb-4">Edit Supplier</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Supplier</label>
                                            <input type="text" name="perusahaan" class="form-control" value="<?= $perusahaan ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" value="<?= $alamat ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nomor Telepon</label>
                                            <input type="number" name="telp" class="form-control" value="<?= $telp ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Keterangan</label>
                                            <input type="textarea" name="keterangan" class="form-control" value="<?= $keterangan ?>">
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