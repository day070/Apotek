<?php
include("../conn.php");
$id = $_GET['id_pelanggan'];
// var_dump($id);

// Mendapatkan nama file gambar produk
$cariNamaGambar = mysqli_query($conn, "SELECT bukti_foto_resep FROM tb_pelanggan WHERE id_pelanggan='$id'");

$dataGambar = mysqli_fetch_array($cariNamaGambar);
$namaGambar = $dataGambar['bukti_foto_resep'];

// Hapus file gambar dari direktori "image"
$lokasi = "../image/$namaGambar";
if (file_exists($lokasi)) {
    unlink($lokasi);
}

$queryDelete = mysqli_query($conn, "DELETE FROM tb_pelanggan WHERE id_pelanggan='$id'");
if ($queryDelete) {
?>
    </div>
    <meta http-equiv="refresh" content="2, url=tampil_pelanggan.php" />
<?php
}
?>