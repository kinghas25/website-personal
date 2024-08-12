<?php 
include 'header.php';

// Fungsi untuk memformat nomor telepon
function formatPhoneNumber($number) {
    return preg_replace('/(\d{4})(?=\d)/', '$1-', $number);
}
// Dapatkan kode produk dari URL dan hindari SQL Injection
$kode = mysqli_real_escape_string($conn, $_GET['produk']);

// Ambil detail produk berdasarkan kode produk
$result = mysqli_query($conn, "SELECT * FROM produk WHERE kode_tempat = '$kode'");
$row = mysqli_fetch_assoc($result);

// Ambil nama kategori produk
$id_kategori = $row['id_kategori'];
$kategori_result = mysqli_query($conn, "SELECT nama_kategori FROM kategori WHERE id_kategori = '$id_kategori'");
$kategori = mysqli_fetch_assoc($kategori_result);
?>

<div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid #078209"><b>Detail Tempat</b></h2>

    <div class="row">
        <div class="col-md-4">
            <div class="thumbnail">
                <img src="image/produk/<?= $row['image']; ?>" width="400">
            </div>
        </div>

        <div class="col-md-8">
            <form action="proses/add.php" method="GET">
                <input type="hidden" name="kd_cs" value="<?= $kode_cs; ?>">
                <input type="hidden" name="produk" value="<?= $kode; ?>">
                <input type="hidden" name="hal" value="2">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td><b>Nama Tempat</b></td>
                            <td><?= $row['nama']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Penanggung Jawab</b></td>
                            <td><?= $row['nama1']; ?></td>
                        </tr>
                        <tr>
                            <td><b>No HP</b></td>
                            <td>+62 <?= formatPhoneNumber($row['no_hp']); ?></td>
                        </tr>
                        <tr>
                            <td><b>Lokasi</b></td>
                            <td><a href="<?= $row['lokasi']; ?>" target="_blank"><?= $row['lokasi']; ?></a></td>
                        </tr>
                        <tr>
                            <td><b>Kategori</b></td>
                            <td><?= $kategori['nama_kategori']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Deskripsi</b></td>
                            <td><?= $row['deskripsi']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php 
                if (isset($_SESSION['user'])) {
                    ?>
                    <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan </button>
                    <?php 
                } else {
                    ?>
                    <a href="keranjang.php" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</a>
                    <?php 
                }
                ?>
                <a href="index.php" class="btn btn-warning"> Kembali</a>
            </form>
        </div>
    </div>
</div>
<br>
<br>

<?php 
include 'footer.php';
?>
