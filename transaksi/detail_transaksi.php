    <?php
    include("../session.php");
    include("../conn.php");
    $id = $_SESSION['idTransaksi'];
    $query = mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE id_transaksi = '$id'");
    $row = mysqli_fetch_assoc($query);
    $id_pelanggan = $row['id_pelanggan'];
    $queryPelanggan = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$id_pelanggan'");
    $rowPelanggan = mysqli_fetch_assoc($queryPelanggan);

    $id_karyawan = $row['id_karyawan'];
    $queryKaryawan = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE id_karyawan = '$id_karyawan'");
    $rowKaryawan = mysqli_fetch_assoc($queryKaryawan);

    if (@$_POST['more']) {
        $namaobat = $_POST['nama_obat'];
        $queryidObat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_obat, harga_jual, stok_obat FROM tb_obat WHERE nama_obat = '$namaobat'"));
        $idObat = $queryidObat['id_obat'];
        $stokObat = $queryidObat['stok_obat'];
        $jumlah = $_POST['jumlah'];
        $harga_satuan = $queryidObat['harga_jual'];
        $totalHarga = $jumlah * $harga_satuan;

        if ($stokObat >= $jumlah) {

            $insertTransaksi = mysqli_query($conn, "INSERT INTO tb_detail_transaksi VALUES (NULL, '$id', '$idObat', '$jumlah', '$harga_satuan', '$totalHarga')");
            $stokBaru = $stokObat - $jumlah;
            $updateStok = mysqli_query($conn, "UPDATE tb_obat SET stok_obat='$stokBaru' WHERE id_obat = '$idObat'");
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Stok obat Tidak cukup Stok tersisa : " . $stokObat;
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Transaksi</title>
        <link rel="stylesheet" href="../assets/css/styles.min.css">
        <link rel="shortcut icon" href="../assets/images/logos/favicon.png">
        <script>
            function hitungKembalian() {
                var totalBayar = <?= mysqli_fetch_row(mysqli_query($conn, "SELECT SUM(total_harga) FROM tb_detail_transaksi WHERE id_transaksi = '$id'"))[0]; ?>;
                var bayar = document.getElementById("bayar").value;
                var kembalian = bayar - totalBayar;

                if (kembalian >= 0) {
                    document.getElementById("kembalian").innerText = "Total Kembalian: " + kembalian.toLocaleString();
                } else {
                    document.getElementById("kembalian").innerText = "Jumlah bayar kurang dari total bayar.";
                }
            }
        </script>
    </head>

    <body>
        <div class="container">

            <div class="card">

                <div class="card-header bg-primary text-white text-center">
                    <h2 class="text-white">Transaksi Penjualan Obat</h2>
                </div>
                <div class="card-body">

                    <center>
                        <table class="table table-bordered">
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td><?= $row['tanggal_transaksi'] ?></td>
                            </tr>
                            <tr>
                                <td>Nama Pelanggan</td>
                                <td>:</td>
                                <td><?= $rowPelanggan['nama_lengkap'] ?></td>
                            </tr>
                            <tr>
                                <td>Kategori Pelanggan</td>
                                <td>:</td>
                                <td><?= $row['kategori_pelanggan'] ?></td>
                            </tr>
                            <tr>
                                <td>Nama Karyawan</td>
                                <td>:</td>
                                <td><?= $rowKaryawan['nama_karyawan'] ?></td>
                            </tr>
                        </table>

                        <h5>Detail Transaksi</h5>
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nama Obat</th>
                                    <th>Jumlah</th>
                                    <th>Harga Satuan</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $hasilDetail = mysqli_query($conn, "SELECT * FROM tb_detail_transaksi WHERE id_transaksi='$id'");
                                while ($rowDetail = mysqli_fetch_assoc($hasilDetail)) {
                                ?>
                                    <tr>
                                        <td><?php
                                            $rowIdObat = $rowDetail['id_obat'];
                                            $nama_obat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama_obat FROM tb_obat WHERE id_obat ='$rowIdObat' "));
                                            echo $nama_obat['nama_obat'];
                                            ?></td>
                                        <td><?= $rowDetail['jumlah'] ?></td>
                                        <td><?= number_format($rowDetail['harga_satuan'], 0, ',', '.') ?></td>
                                        <td><?= number_format($rowDetail['total_harga'], 0, ',', '.') ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td colspan="3"><b>Grand Total</b></td>
                                    <td><b><?php
                                            $grand_total = mysqli_fetch_row(mysqli_query($conn, "SELECT SUM(total_harga) FROM tb_detail_transaksi WHERE id_transaksi = '$id'"));
                                            if ($grand_total[0] !== null && $grand_total > 0) {

                                                echo number_format($grand_total[0], 0, ',', '.');
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>

                <form action="" method="post" class="mb-3 w-50 container d-flex justify-content-center align-items">
                    <div class="mb-3">
                        <label class="form-label">Nama Obat</label>
                        <input list="list_obat" class="form-control" name="nama_obat" placeholder="Nama Obat" autocomplete="off" required>
                        <datalist id="list_obat">
                            <?php
                            $query = "SELECT nama_obat FROM tb_obat";
                            $hasil = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($hasil)) {
                                echo "<option value='" . $row['nama_obat'] . "'></option>";
                            }
                            ?>
                        </datalist>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" placeholder="Jumlah" required class="ms-2 form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white">s</label>
                        <input type="submit" name="more" class="form-control bg-primary text-white ms-3" value="Tambah Obat">
                    </div>
                </form>

                <form action="" method="post" class="mb-3 w-25 container" onsubmit=" removeCommas(document.getElementById('bayar'))">
                    <div class="mb-3">
                        <label class="form-label">Bayar</label>
                        <input type="number" id="bayar" class="form-control" name="bayar" placeholder="Masukan Jumlah Bayar" required oninput="hitungKembalian()" autocomplete="off">
                        <p id="kembalian"></p>
                    </div>
                    <input type="submit" name="simpan_transaksi" class="form-control bg-success" value="Simpan Transaksi">
                </form>

                <?php
                if (@$_POST['simpan_transaksi']) {
                    $grand_total = mysqli_fetch_row(mysqli_query($conn, "SELECT SUM(total_harga) FROM tb_detail_transaksi WHERE id_transaksi='$id'"));
                    $total_bayar = $grand_total[0];
                    $bayar = $_POST['bayar'];
                    $kembalian = $bayar - $total_bayar;

                    if ($bayar < $total_bayar) {
                        echo "<script>alert('Uang yang dibayarkan kurang dari total bayar. Silakan input ulang.');</script>";
                    } else {
                        mysqli_query($conn, "UPDATE tb_transaksi SET total_bayar = '$total_bayar', bayar='$bayar', kembali='$kembalian' WHERE id_transaksi = '$id'");
                        echo "<script>window.location='tampil_transaksi.php'</script>";
                        echo "<script>alert('Transaksi berhasil disimpan!');</script>";
                    }
                }
                ?>
                </center>
            </div>
        </div>
        </div>

    </body>

    </html>