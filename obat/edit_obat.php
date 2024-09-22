<?php
include("../conn.php");
$id = $_GET['id_obat'];
$result = mysqli_query($conn, "SELECT tb_obat.*, tb_supplier.perusahaan AS perusahaan FROM tb_obat INNER JOIN tb_supplier ON tb_obat.id_supplier=tb_supplier.id_supplier WHERE id_obat = '$id'") or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($result)) {
    $perusahaan = $row["perusahaan"];
    $nama_obat = $row["nama_obat"];
    $kategori = $row["kategori"];
    $harga_jual = $row["harga_jual"];
    $harga_beli = $row["harga_beli"];
    $stok_obat = $row["stok_obat"];
    $keterangan = $row["keterangan_obat"];
}
?>
<?php
if (isset($_POST['submit'])) {
    $nama_obat = $_POST['nama_obat'];
    $kategori_obat = $_POST['kategori_obat'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok_obat = $_POST['stok_obat'];
    $stok_obat = $_POST['stok_obat'];
    $perusahaan = $_POST['id_supplier'];
    $keterangan = $_POST['keterangan'];

    $supplier = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_supplier FROM tb_supplier WHERE perusahaan='$perusahaan'"));
    $id_supplier = $supplier['id_supplier'];
    $queryUpdate = mysqli_query($conn, "UPDATE tb_obat SET nama_obat= '$nama_obat', kategori= '$kategori_obat',harga_beli='$harga_beli',harga_jual='$harga_jual',stok_obat='$stok_obat',keterangan_obat='$keterangan',id_supplier='$id_supplier'  WHERE id_obat=$id ");

    if ($queryUpdate) {
?>
        <h1>Berhasil</h1>
        <meta http-equiv="refresh" content="2; url=tampil_obat.php" />
<?php
    } else {
        echo mysqli_error($conn);
    }
}
?>

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
                            <h5 class="card-title fw-semibold mb-4">Edit Obat</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="post">
                                        <datalist id="id_supplier">
                                            <?php
                                            include("../conn.php");
                                            $list = mysqli_query($conn, "SELECT perusahaan FROM tb_supplier");
                                            while ($row = mysqli_fetch_assoc($list)) {
                                            ?>
                                                <option value="<?= $row['perusahaan'] ?>"></option>
                                            <?php
                                            }
                                            ?>
                                        </datalist>
                                        <div class="mb-3">
                                            <label class="form-label">Nama Supplier</label>
                                            <input type="text" name="id_supplier" list="id_supplier" class="form-control" value="<?= $perusahaan ?>" autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nama Obat</label>
                                            <input type="text" name="nama_obat" class="form-control" value="<?= $nama_obat ?>" autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kategori Obat</label>
                                            <input type="text" name="kategori_obat" class="form-control" value="<?= $kategori ?>" autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Harga Jual Obat</label>
                                            <input type="number" name="harga_jual" class="form-control" value="<?= $harga_jual ?>" autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Harga Beli Obat</label>
                                            <input type="number" name="harga_beli" class="form-control" value="<?= $harga_beli ?>" autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Stok Obat</label>
                                            <input type="number" name="stok_obat" class="form-control" value="<?= $stok_obat ?>" autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Keterangan Obat</label>
                                            <input type="text" name="keterangan" class="form-control" value="<?= $keterangan ?>" autocomplete="off">
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