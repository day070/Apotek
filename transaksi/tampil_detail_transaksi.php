<?php
include("../conn.php");
include("../session.php");
$id_transaksi = $_GET['id_transaksi'];
$queryDetail = mysqli_query($conn, "SELECT o.nama_obat, dt.harga_satuan,dt.total_harga,dt.jumlah FROM tb_detail_transaksi dt INNER JOIN tb_obat o ON o.id_obat = dt.id_obat WHERE id_transaksi = '$id_transaksi'");
$queryBayar = mysqli_fetch_row(mysqli_query($conn, "SELECT SUM(total_harga) FROM tb_detail_transaksi WHERE id_transaksi = '$id_transaksi'"));
$harga = $queryBayar[0];;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Deatail Transaksi</title>
    <link rel="shortcut icon" href="../assets/images/logos/favicon.png">
    <link rel="stylesheet" href="../assets/css/styles.min.css">
</head>

<body>
    <div class="container">
        <h2 class="my-4">Detail Transaksi</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Harga Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_array($queryDetail)) {

                ?>
                    <tr>
                        <th scope="row"><?= $no ?></th>
                        <td><?= $row['nama_obat'] ?></td>
                        <td><?= $row['jumlah'] ?></td>
                        <td>
                        <td>
                            <?= number_format($row['harga_satuan'], 0, ',', '.') ?>
                        </td>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span" class="bg-primary badge rounded-3 fw-semibold"><?= number_format($row['total_harga'], 0, ',', '.') ?></span>
                            </div>
                        </td>
                    </tr>

                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>


        <button class="btn btn-primary w-25 float-end">
            Total Bayar <h3 class="text-bg-secondary rounded"><?= number_format($harga) ?></h3>
        </button>
    </div>

</body>

</html>