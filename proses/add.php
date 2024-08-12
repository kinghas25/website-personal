<?php 
include '../koneksi/koneksi.php';

$hal = $_GET['hal'];
$kode_cs = $_GET['kd_cs'];
$kode_tempat = $_GET['produk'];

$result = mysqli_query($conn, "SELECT * FROM produk WHERE kode_tempat = '$kode_tempat'");
$row = mysqli_fetch_assoc($result);

$nama_produk = $row['nama'];
$kd = $row['kode_tempat'];
$no_hp = $row['no_hp'];

if($hal == 1){
    $cek = mysqli_query($conn, "SELECT * from keranjang where kode_tempat = '$kode_tempat' and kode_customer = '$kode_cs'");
    $jml = mysqli_num_rows($cek);
    $row1 = mysqli_fetch_assoc($cek);
    if($jml > 0){
        $update = mysqli_query($conn, "UPDATE keranjang SET qty = qty + 1 WHERE kode_tempat = '$kode_tempat' and kode_customer = '$kode_cs'");
        if($update){
            echo "
            <script>
            alert('BERHASIL DITAMBAHKAN KE KERANJANG');
            window.location = '../keranjang.php';
            </script>
            ";
            die;
        }
    } else {
        $insert = mysqli_query($conn, "INSERT INTO keranjang VALUES('','$kode_cs','$kd','$nama_produk', '1', '$no_hp')");
        if($insert){
            echo "
            <script>
            alert('BERHASIL DITAMBAHKAN KE KERANJANG');
            window.location = '../keranjang.php';
            </script>
            ";
            die;
        }
    }
} else {
    $cek = mysqli_query($conn, "SELECT * from keranjang where kode_tempat = '$kode_tempat' and kode_customer = '$kode_cs'");
    $jml = mysqli_num_rows($cek);
    $row1 = mysqli_fetch_assoc($cek);
    if($jml > 0){
        $update = mysqli_query($conn, "UPDATE keranjang SET qty = qty + 1 WHERE kode_tempat = '$kode_tempat' and kode_customer = '$kode_cs'");
        if($update){
            echo "
            <script>
            alert('BERHASIL DITAMBAHKAN KE KERANJANG');
            window.location = '../detail_produk.php?produk=".$kode_tempat."';
            </script>
            ";
            die;
        }
    } else {
        $insert = mysqli_query($conn, "INSERT INTO keranjang VALUES('','$kode_cs','$kd','$nama_produk', '1', '$no_hp')");
        if($insert){
            echo "
            <script>
            alert('BERHASIL DITAMBAHKAN KE KERANJANG');
            window.location = '../detail_produk.php?produk=".$kode_tempat."';
            </script>
            ";
            die;
        }
    }
}
?>
