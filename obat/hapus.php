<?php
include("../conn.php");
$id = $_GET['id_obat'];
var_dump($id);

$queryDelete = mysqli_query($conn, "DELETE FROM tb_obat WHERE id_obat='$id'");
if ($queryDelete) {
    header("location:tampil_obat.php");
}
