<?php
include '../../koneksi/koneksi.php';

// Generate kode produk
$kode = mysqli_query($conn, "SELECT kode_tempat FROM produk ORDER BY kode_tempat DESC");
$data = mysqli_fetch_assoc($kode);
if ($data['kode_tempat'] == null) {
    $format = "P0001";
} else {
    $num = substr($data['kode_tempat'], 1, 4);
    $add = (int)$num + 1;
    if (strlen($add) == 1) {
        $format = "P000" . $add;
    } else if (strlen($add) == 2) {
        $format = "P00" . $add;
    } else if (strlen($add) == 3) {
        $format = "P0" . $add;
    } else {
        $format = "P" . $add;
    }
}

// Ambil data dari form
$kode = $_POST['kode'];
$nm_produk = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$desk = $_POST['desk'];
$nama1 = $_POST['nama1'];
$lokasi = $_POST['lokasi'];
$nama_gambar = $_FILES['files']['name'];
$id_kategori = $_POST['id_kategori'];
$size_gambar = $_FILES['files']['size'];
$tmp_file = $_FILES['files']['tmp_name'];
$eror = $_FILES['files']['error'];
$type = $_FILES['files']['type'];

// Validasi gambar
if ($eror === 4) {
    echo "
    <script>
    alert('TIDAK ADA GAMBAR YANG DIPILIH');
    window.location = '../tm_produk.php';
    </script>
    ";
    die;
}

$ekstensiGambar = array('jpg', 'jpeg', 'png');
$ekstensiGambarValid = explode(".", $nama_gambar);
$ekstensiGambarValid = strtolower(end($ekstensiGambarValid));

if (!in_array($ekstensiGambarValid, $ekstensiGambar)) {
    echo "
    <script>
    alert('EKSTENSI GAMBAR HARUS JPG, JPEG, PNG');
    window.location = '../tm_produk.php';
    </script>
    ";
    die;
}

if ($size_gambar > 1000000000000) {
    echo "
    <script>
    alert('UKURAN GAMBAR TERLALU BESAR');
    window.location = '../tm_produk.php';
    </script>
    ";
    die;
}

$namaGambarBaru = uniqid();
$namaGambarBaru .= ".";
$namaGambarBaru .= $ekstensiGambarValid;

if (move_uploaded_file($tmp_file, "../../image/produk/" . $namaGambarBaru)) {
    // Simpan produk baru
    $result = mysqli_query($conn, "INSERT INTO produk (kode_tempat, nama, image, deskripsi, no_hp, id_kategori, nama1, lokasi) 
                                  VALUES('$kode','$nm_produk','$namaGambarBaru','$desk','$no_hp','$id_kategori', '$nama1', '$lokasi')");

    if ($result) {
        echo "
        <script>
        alert('PRODUK BERHASIL DITAMBAHKAN');
        window.location = '../m_produk.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
    alert('GAGAL MEMPROSES GAMBAR');
    window.location = '../tm_produk.php';
    </script>
    ";
}
?>
