<?php 
include 'header.php';
include 'koneksi/koneksi.php'; // Pastikan koneksi database di-include

// Mulai sesi jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Dapatkan kata kunci pencarian dan sanitasi
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

// Debugging: Tampilkan query yang dijalankan
// echo "Query: SELECT * FROM produk WHERE nama LIKE '%$search%' OR deskripsi LIKE '%$search%'";

// Query untuk mencari produk berdasarkan nama atau deskripsi
$query = "SELECT * FROM produk WHERE nama LIKE '%$search%' OR deskripsi LIKE '%$search%'";
$result = mysqli_query($conn, $query);

// Debugging: Periksa jika query berhasil
if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}
?>

<!-- HASIL PENCARIAN -->
<div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid #00ff00"><b>Hasil Pencarian</b></h2>

    <div class="row">
        <?php 
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="image/produk/<?= htmlspecialchars($row['image']); ?>" alt="<?= htmlspecialchars($row['nama']); ?>">
                        <div class="caption">
                            <h3><?= htmlspecialchars($row['nama']); ?></h3>
                            <h4>+62 <?= number_format($row['harga'], 0, '', ''); ?></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="detail_produk.php?produk=<?= htmlspecialchars($row['kode_tempat']); ?>" class="btn btn-warning btn-block">Detail</a> 
                                </div>
                                <?php if (isset($_SESSION['kd_cs'])) { ?>
                                    <div class="col-md-6">
                                        <a href="proses/add.php?produk=<?= htmlspecialchars($row['kode_tempat']); ?>&kd_cs=<?= htmlspecialchars($_SESSION['kd_cs']); ?>&hal=1" class="btn btn-success btn-block" role="button"><i class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-md-6">
                                        <a href="keranjang.php" class="btn btn-success btn-block" role="button"><i class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
            }
        } else {
            echo "<p>Tidak ada produk yang ditemukan.</p>";
        }
        ?>
    </div>
</div>

<?php 
include 'footer.php';
?>
