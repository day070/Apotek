<?php
include("../conn.php");

$perusahaan = $_POST['perusahaan'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$keterangan = $_POST['keterangan'];


$hasil = mysqli_query($conn, "INSERT INTO tb_supplier VALUES (NULL,'$perusahaan','$telp','$alamat','$keterangan')");

if (!$hasil) {
    echo "<script>alert('gagal masukkan data');window.location='tambah_supplier.php'</script>";
} else {
    echo "<script>alert('Berhasil masukkan data');window.location='tampil_supplier.php'</script>";
}
