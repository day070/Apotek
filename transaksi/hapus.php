<?php
include("../conn.php");
$id = $_GET['id_transaksi'];
var_dump($id);

$queryDelete = mysqli_query($conn, "DELETE FROM tb_transaksi WHERE id_transaksi='$id'");
if ($queryDelete) {
    header("location:tampil_transaksi.php");
}
