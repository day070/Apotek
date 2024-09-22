<?php
include("../conn.php");
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$usia = $_POST['usia'];

// functon mengubah nama foto
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$target_dir = "../image/";
$nama_file = basename($_FILES["resep"]["name"]);
$target_file = $target_dir . $nama_file;
$tipe_file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$image_size = $_FILES["resep"]["size"];
$randomName = generateRandomString(10);
$newName = $randomName . "." . $tipe_file;

if ($nama_file != '') {
    $max_file_size = 2000000; // batas ukuran file dalam byte (50 KB)

    if ($image_size > $max_file_size) {
?>
        <div class="alert alert-danger mt-3" role="alert">
            Foto tidak boleh lebih dari 2MB
        </div>
        <?php
        die();
    } else {
        if ($tipe_file != 'jpg' && $tipe_file != 'png' && $tipe_file != 'gif' && $tipe_file != 'jpeg') {
        ?>
            <div class="alert alert-danger mt-3" role="alert">
                Tipe file tidak diperbolehkan
            </div>
<?php
        } else {
            move_uploaded_file($_FILES["resep"]["tmp_name"], $target_dir . $newName);
        }
    }
}


$hasil = mysqli_query($conn, "INSERT INTO tb_pelanggan VALUES (NULL,'$nama','$alamat','$telp','$usia','$newName')");

if (!$hasil) {
    echo "<script>alert('gagal masukkan data');window.location='tambah_pelanggan.php'</script>";
} else {
    echo "<script>alert('Berhasil masukkan data');window.location='tampil_pelanggan.php'</script>";
}
