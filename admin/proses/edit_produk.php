<?php 
include '../../koneksi/koneksi.php';

$kode = $_POST['kode'];
$nm_produk = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$desk = $_POST['desk'];
$id_kategori = $_POST['id_kategori']; // Tambahkan ini
$nama_gambar = $_FILES['files']['name'];
$size_gambar = $_FILES['files']['size'];
$tmp_file = $_FILES['files']['tmp_name'];
$eror = $_FILES['files']['error'];
$type = $_FILES['files']['type'];

if ($eror === 4) {
    $result = mysqli_query($conn, "UPDATE produk SET nama = '$nm_produk', deskripsi = '$desk', no_hp = '$no_hp', id_kategori = '$id_kategori' WHERE kode_tempat = '$kode'");

    if ($result) {
        echo "
        <script>
        alert('PRODUK BERHASIL DIEDIT');
        window.location = '../m_produk.php';
        </script>
        ";
    }
    die;
}

$ekstensiGambar = array('jpg', 'jpeg', 'png');
$ekstensiGambarValid = explode(".", $nama_gambar);
$ekstensiGambarValid = strtolower(end($ekstensiGambarValid));

if (!in_array($ekstensiGambarValid, $ekstensiGambar)) {
    echo "
    <script>
    alert('EKSTENSI GAMBAR HARUS JPG, JPEG, PNG');
    window.location = '../edit_produk.php?kode=".$kode."';
    </script>
    ";
    die;
}

if ($size_gambar > 1000000) {
    echo "
    <script>
    alert('UKURAN GAMBAR TERLALU BESAR');
    window.location = '../edit_produk.php?kode=".$kode."';
    </script>
    ";
    die;
}

$namaGambarBaru = uniqid();
$namaGambarBaru .= ".";
$namaGambarBaru .= $ekstensiGambarValid;

$gambar = mysqli_query($conn, "SELECT image FROM produk WHERE kode_tempat = '$kode'");
$tgambar = mysqli_fetch_assoc($gambar);
if (file_exists("../../image/produk/".$tgambar['image'])) {
    unlink("../../image/produk/".$tgambar['image']);
    move_uploaded_file($tmp_file, "../../image/produk/".$namaGambarBaru);

    $result = mysqli_query($conn, "UPDATE produk SET nama = '$nm_produk', image = '$namaGambarBaru', deskripsi = '$desk', no_hp = '$no_hp', id_kategori = '$id_kategori' WHERE kode_tempat = '$kode'");

    if ($result) {
        echo "
        <script>
        alert('PRODUK BERHASIL DIEDIT');
        window.location = '../m_produk.php';
        </script>
        ";
    }
} else {
    move_uploaded_file($tmp_file, "../../image/produk/".$namaGambarBaru);

    $result = mysqli_query($conn, "UPDATE produk SET nama = '$nm_produk', image = '$namaGambarBaru', deskripsi = '$desk', no_hp = '$no_hp', id_kategori = '$id_kategori' WHERE kode_tempat = '$kode'");

    if ($result) {
        echo "
        <script>
        alert('PRODUK BERHASIL DIEDIT');
        window.location = '../m_produk.php';
        </script>
        ";
    }
}
?>
