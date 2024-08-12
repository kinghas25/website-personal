<?php 
include 'header.php';
include 'koneksi/koneksi.php'; // Pastikan koneksi database di-include

// Mulai sesi jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Dapatkan id_kategori dan search dari parameter URL dan sanitasi
$id_kategori = isset($_GET['id_kategori']) ? mysqli_real_escape_string($conn, $_GET['id_kategori']) : '';
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

// Fungsi untuk memformat nomor telepon
function formatPhoneNumber($number) {
    return preg_replace('/(\d{4})(?=\d)/', '$1-', $number);
}

// Buat query untuk mengambil produk berdasarkan kategori dan pencarian
$query = "SELECT * FROM produk WHERE 1=1";

if ($id_kategori) {
    $query .= " AND id_kategori = '$id_kategori'";
}
if ($search) {
    $query .= " AND (nama LIKE '%$search%' OR deskripsi LIKE '%$search%')";
}

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}
?>

<!-- PRODUK TERBARU DAN HASIL PENCARIAN -->
<div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid #078209"><b>Pencarian Berdasarkan Kategori</b></h2>

    <form method="GET" action="produk.php" class="form-inline">
        <div class="form-group">
            <input type="text" class="form-control" name="search" placeholder="Cari produk..." value="<?= htmlspecialchars($search); ?>">
        </div>
        <div class="form-group">
            <select name="id_kategori" class="form-control">
                <option value="">Semua Kategori</option>
                <?php 
                // Query untuk mengambil kategori
                $kategori_query = "SELECT * FROM kategori";
                $kategori_result = mysqli_query($conn, $kategori_query);
                
                if (!$kategori_result) {
                    die("Query Error: " . mysqli_error($conn));
                }
                
                while ($kategori = mysqli_fetch_assoc($kategori_result)) {
                    $selected = $kategori['id_kategori'] == $id_kategori ? 'selected' : '';
                    echo "<option value=\"{$kategori['id_kategori']}\" $selected>{$kategori['nama_kategori']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>
    <br>

    <?php if (empty($id_kategori) && empty($search)) { ?>
        <h2 style="width: 100%; border-bottom: 4px solid #078209"><b>Map Alastuwo</b></h2>
    <?php } elseif (mysqli_num_rows($result) > 0) { ?>
        <h2 style="width: 100%; border-bottom: 4px solid #078209"><b>Hasil Pencarian</b></h2>
    <?php } else { ?>
        <h2 style="width: 100%; border-bottom: 4px solid #078209"><b>Map Alastuwo</b></h2>
    <?php } ?>

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
                            <h4>+62 <?= formatPhoneNumber(htmlspecialchars($row['no_hp'])); ?></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="detail_produk.php?produk=<?= htmlspecialchars($row['kode_tempat']); ?>" class="btn btn-warning btn-block">Detail</a> 
                                </div>
                                <?php if (isset($_SESSION['kd_cs'])) { ?>
                                    <div class="col-md-6">
                                        <a href="proses/add.php?produk=<?= htmlspecialchars($row['kode_tempat']); ?>&kd_cs=<?= htmlspecialchars($_SESSION['kd_cs']); ?>&hal=1" class="btn btn-success btn-block" role="button"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</a>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-md-6">
                                        <a href="keranjang.php" class="btn btn-success btn-block" role="button"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</a>
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
