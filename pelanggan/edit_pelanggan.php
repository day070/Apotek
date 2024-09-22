<?php
include("../conn.php");
include("../session.php");

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$id = $_GET['id_pelanggan'];
$result = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$id'") or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($result)) {
    $nama = $row["nama_lengkap"];
    $alamat = $row["alamat"];
    $telp = $row["telp"];
    $usia = $row["usia"];
    $bukti_foto_resep = $row["bukti_foto_resep"];
}
?>
<?php
if (isset($_POST['submit'])) {
    $nama = ($_POST['nama']);
    $alamat = ($_POST['alamat']);
    $usia = ($_POST['usia']);
    if ($_FILES['resep']['error'] == 4) {
        $queryUPDATE = mysqli_query($conn, "UPDATE tb_pelanggan SET nama_lengkap='$nama', alamat='$alamat', telp='$telp', usia='$usia' WHERE id_pelanggan=$id ");
        if ($queryUPDATE) {
?>
            <div class="alert alert-primary mt-3" role="alert">
                Produk berhasil di Simpan!
            </div>
            <meta http-equiv="refresh" content="2; url=tampil_pelanggan.php" />
        <?php
        } else {
            echo mysqli_error($con);
        }
    } else {
        // Batasan ukuran file (4MB)
        if ($_FILES['resep']['size'] > 2000000) {
        ?>
            <div class="alert alert-danger mt-3" role="alert">
                Ukuran file gambar melebihi 2MB. Unggahan tidak berhasil.
            </div>
            <?php
        } else {
            $target_dir = "../image/";
            $nama_file = basename($_FILES["resep"]["name"]);
            $target_file = $target_dir . $nama_file;
            $tipe_file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $randomName = generateRandomString(20);
            $newName = $randomName . "." . $tipe_file;

            if ($tipe_file != 'jpg' && $tipe_file != 'png' && $tipe_file != 'gif' && $tipe_file != 'jpeg') {
            ?>
                <div class="alert alert-danger mt-3" role="alert">
                    Tipe file tidak diperbolehkan. File diluar format 'jpg', 'png', 'gif'.
                </div>
                <?php
            } else {
                move_uploaded_file($_FILES["resep"]["tmp_name"], $target_dir . $newName);
                $queryUPDATE = mysqli_query($conn, "UPDATE tb_pelanggan SET  nama_lengkap='$nama', alamat='$alamat', telp='$telp', usia='$usia', bukti_foto_resep='$newName' WHERE id_pelanggan=$id");
                if ($queryUPDATE) {
                ?>
                    <div class="alert alert-primary mt-3" role="alert">
                        Produk berhasil di Simpan!
                    </div>
                    <meta http-equiv="refresh" content="2; url=tampil.php" />
<?php
                } else {
                    echo mysqli_error($con);
                }
            }
        }
    }
}
?>

<!-- </body>

</html> -->
<?php
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
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Pelanggan</label>
                                            <input type="text" name="nama" class="form-control" value="<?= $nama ?>">
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
                                            <label class="form-label">Usia</label>
                                            <input type="text" name="usia" class="form-control" value="<?= $usia ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Foto</label>
                                            <input type="file" name="resep" class="form-control">
                                            <br>
                                            <p>Foto Saait ini</p>
                                            <img src="../image/<?= $bukti_foto_resep ?>" width="250px">
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