<?php
include("../conn.php");
$id = $_GET['id_karyawan'];
// var_dump($id);

$queryDelete = mysqli_query($conn, "DELETE FROM tb_karyawan WHERE id_karyawan='$id'");
if ($queryDelete) {
    header("Location: tampil_karyawan.php");
}

// MASI ERROR BLM BISA DELETE , KALO DIDELETE DIA DIAM DI HALAMAN DELETE 
