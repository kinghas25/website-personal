<?php 
include '../../koneksi/koneksi.php';

$id_kategori = $_GET['id'];

// Hapus kategori dari tabel kategori
$del_kategori = mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori = '$id_kategori'");

if($del_kategori){
    // Jika penghapusan berhasil, arahkan kembali ke halaman kategori
    echo "
    <script>
    alert('KATEGORI BERHASIL DIHAPUS');
    window.location = '../m_kategori.php';
    </script>
    ";
} else {
    // Jika terjadi kesalahan dalam penghapusan
    echo "
    <script>
    alert('GAGAL MENGHAPUS KATEGORI');
    window.location = '../m_kategori.php';
    </script>
    ";
}

?>
