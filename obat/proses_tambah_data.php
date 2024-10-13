

<?php
include("../conn.php");

$nama_perusahaan = $_POST['id_supplier'];
$supplier = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_supplier FROM tb_supplier WHERE perusahaan = '$nama_perusahaan'"));
$id_supplier = $supplier['id_supplier'];
$nama_obat = $_POST['nama_obat'];
$kategori_obat = $_POST['kategori_obat'];
$harga_jual = $_POST['harga_jual'];
$harga_beli = $_POST['harga_beli'];
$stok_obat = $_POST['stok_obat'];
$keterangan = $_POST['keterangan'];

$hasil = mysqli_query($conn, "INSERT INTO tb_obat VALUES (NULL,'$id_supplier','$nama_obat','$kategori_obat','$harga_beli','$harga_jual','$stok_obat','$keterangan')");

if (!$hasil) {
    // echo"<script>alert('gagal masukkan data');window.location='tambah_obat.php'</script>";
} else {
    echo "<script>alert('Berhasil masukkan data');window.location='tampil_obat.php'</script>";
}

?>

