<?php
include("../session.php");
include("../conn.php");
$karyawan = $_SESSION['session_username'];

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
                <!--  Row 1 -->
                <div class="row">
                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-semibold mb-1">Halaman Dashboard</h5>
                                <div class="container">
                                    <div class="row mt-6">

                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body text-center bg-white rounded d-flex justify-content-around">
                                                    <div class="d-flex justify-content-center align-items-center ">
                                                        <i class="ti ti-pill icon d-flex align-items-center justify-content-center text-indigo bg-light-info" style="font-size :30px;"></i>
                                                    </div>
                                                    <div class="div w-50 d-flex justify-content-center flex-column">
                                                        <h2>
                                                            <?php
                                                            $result = mysqli_query($conn, "SELECT * FROM tb_obat");
                                                            $totalCount = mysqli_num_rows($result);
                                                            echo "<h2>$totalCount</h2>";
                                                            ?>
                                                        </h2>
                                                        <h5>Jenis Obat</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body text-center bg-white rounded d-flex justify-content-around">
                                                    <div class="d-flex justify-content-center align-items-center ">
                                                        <i class="ti ti-user icon d-flex align-items-center justify-content-center text-indigo bg-light-info" style="font-size :30px;"></i>
                                                    </div>
                                                    <div class="div w-50 d-flex justify-content-center flex-column">
                                                        <h2>
                                                            <?php
                                                            $result = mysqli_query($conn, "SELECT * FROM tb_karyawan");
                                                            $totalCount = mysqli_num_rows($result);
                                                            echo "<h2>$totalCount</h2>";
                                                            ?>
                                                        </h2>
                                                        <h5>Total Karyawan</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body text-center bg-white rounded d-flex justify-content-around">
                                                    <div class="d-flex justify-content-center align-items-center ">
                                                        <i class="ti ti-building-skyscraper icon d-flex align-items-center justify-content-center text-indigo bg-light-info" style="font-size :30px;"></i>
                                                    </div>
                                                    <div class="div w-50 d-flex justify-content-center flex-column">
                                                        <h2>
                                                            <?php
                                                            $result = mysqli_query($conn, "SELECT * FROM tb_supplier");
                                                            $totalCount = mysqli_num_rows($result);
                                                            echo "<h2>$totalCount</h2>";
                                                            ?>
                                                        </h2>
                                                        <h5>Total Supplier</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Audit -->
                                <div class="container">
                                    <div class="big-card">
                                        <div class="title">
                                            <h4 class="text-primary">Pemberitahuan stok obat</h4>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama Obat</th>
                                                    <th scope="col">Katgori</th>
                                                    <th scope="col">Stok Obat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $queryStok = mysqli_query($conn, "SELECT * FROM tb_obat WHERE stok_obat <= 20");
                                                $no = 1;
                                                while ($row = mysqli_fetch_array($queryStok)) {

                                                ?>
                                                    <tr>
                                                        <th scope="row"><?= $no ?></th>
                                                        <td><?= $row['nama_obat'] ?></td>
                                                        <td><?= $row['kategori'] ?></td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <span style="background-color: red;" class="badge rounded-3 fw-semibold"><?= $row['stok_obat'] ?></span>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                <?php
                                                    $no++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-6 px-6 text-center">
                    <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
                            class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a
                            href="https://themewagon.com">ThemeWagon</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>
</body>

</html>