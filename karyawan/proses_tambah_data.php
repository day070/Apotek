<?php
include("../conn.php");

$nama_karyawan = $_POST['nama_karyawan'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];

$hasil = mysqli_query($conn, "INSERT INTO tb_karyawan VALUES (NULL,'$nama_karyawan','$alamat','$telp')");

if (!$hasil) {
    // echo"<script>alert('gagal masukkan data');window.location='tambah_obat.php'</script>";
} else {
    echo "<script>alert('Berhasil masukkan data');window.location='tampil_karyawan.php'</script>";
}
