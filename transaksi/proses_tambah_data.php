<?php
date_default_timezone_set('Asia/shanghai');
include("../conn.php");
include("../session.php");

$nama_pelanggan = $_POST['id_pelanggan'];
$pelanggan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_pelanggan FROM tb_pelanggan WHERE nama_lengkap = '$nama_pelanggan'"));
$id_pelanggan = $pelanggan['id_pelanggan'];
$tgl = date('Y-m-d- /h:i:s');
$id_karyawan = $_SESSION['id_karyawan'];
$kategori = $_POST['kategori'];
$insert = mysqli_query($conn, "INSERT INTO tb_transaksi VALUES (NULL,'$id_pelanggan','$id_karyawan','$tgl','$kategori','0','0','0')");
$qt = mysqli_query($conn, "SELECT LAST_INSERT_ID()");
$hasilTransaksi = mysqli_fetch_row($qt);
$_SESSION['idTransaksi'] = $hasilTransaksi[0];
if (!$hasilTransaksi) {
    echo "gagal" . mysqli_error($conn);
} else {
    echo "<script>window.location='detail_transaksi.php'</script>";
}
