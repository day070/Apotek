<?php
include("../conn.php");
$id = $_GET['id_supplier'];
var_dump($id);

$queryDelete = mysqli_query($conn, "DELETE FROM tb_supplier WHERE id_supplier='$id'");
if ($queryDelete) {
    header("location:tampil_supplier.php");
}
