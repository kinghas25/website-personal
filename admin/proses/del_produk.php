<?php 
include '../../koneksi/koneksi.php';

$kode = $_GET['kode'];
$produk = mysqli_query($conn, "SELECT * FROM produk where kode_tempat ='$kode'");
$row = mysqli_fetch_assoc($produk);
unlink("../../image/produk/".$row['image']);

$del = mysqli_query($conn, "DELETE FROM produk WHERE kode_tempat = '$kode'");

if($del){
	echo "
	<script>
	alert('DATA BERHASIL DIHAPUS');
	window.location = '../m_produk.php';
	</script>
	";
}

?>