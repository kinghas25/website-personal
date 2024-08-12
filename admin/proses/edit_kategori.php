<?php 
include '../../koneksi/koneksi.php';

$id_kategori = $_POST['id_kategori'];
$nama_kategori = $_POST['nama_kategori'];

$update = mysqli_query($conn, "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori'");

if($update){
    echo "
    <script>
    alert('Kategori berhasil diperbarui');
    window.location = '../m_kategori.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('Gagal memperbarui kategori');
    window.location = '../m_kategori.php';
    </script>
    ";
}
?>
