<?php 
include 'header.php';

// Mengambil ID kategori terbaru untuk generate kode kategori baru
$query = mysqli_query($conn, "SELECT id_kategori FROM kategori ORDER BY id_kategori DESC LIMIT 1");
$data = mysqli_fetch_assoc($query);

if ($data) {
    $num = substr($data['id_kategori'], 2); // Mengambil angka dari belakang 'K-'
    $add = (int) $num + 1;
} else {
    $add = 1;
}

$format = "K-" . $add; // Format kode kategori baru

?>

<div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid gray;"><b>Tambah Kategori</b></h2>

    <form action="proses/tm_kategori.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_kategori">ID Kategori</label>
                    <input type="text" class="form-control" id="id_kategori" placeholder="ID Kategori" disabled value="<?= $format; ?>">
                    <input type="hidden" name="kode" class="form-control" id="id_kategori_hidden" value="<?= $format; ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="nama_kategori" placeholder="Masukkan Nama Kategori" name="nama" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-success btn-block"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</button>
            </div>
            <div class="col-md-6">
                <a href="m_kategori.php" class="btn btn-danger btn-block">Cancel</a>
            </div>
        </div>
    </form>
</div>

<?php 
include 'footer.php';
?>
