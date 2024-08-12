<?php 
include 'header.php';
include '../koneksi/koneksi.php'; // Pastikan jalur relatif benar

// Amankan input dari SQL Injection
$kode_tempat = mysqli_real_escape_string($conn, $_GET['kode']);

// Gunakan prepared statements untuk keamanan
$stmt = $conn->prepare("SELECT * FROM produk WHERE kode_tempat = ?");
$stmt->bind_param("s", $kode_tempat);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

?>

<div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid gray"><b>Edit Map</b></h2>

    <form action="proses/edit_produk.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="exampleInputFile"><img src="../image/produk/<?= htmlspecialchars($data['image']); ?>" width="100"></label>
            <input type="file" id="exampleInputFile" name="files">
            <p class="help-block">Masukkan Foto</p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kode Tempat</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Produk" disabled value="<?= htmlspecialchars($data['kode_tempat']); ?>">
                    <input type="hidden" name="kode" class="form-control" value="<?= htmlspecialchars($data['kode_tempat']); ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="id_kategori">Kategori Tempat:</label>
            <select class="form-control" id="id_kategori" name="id_kategori" required>
                <?php 
                $kategori_result = mysqli_query($conn, "SELECT * FROM kategori");
                while ($kategori = mysqli_fetch_assoc($kategori_result)) {
                    $selected = ($kategori['id_kategori'] == $data['id_kategori']) ? 'selected' : '';
                    echo '<option value="'.htmlspecialchars($kategori['id_kategori']).'" '.$selected.'>'.htmlspecialchars($kategori['nama_kategori']).'</option>';
                }
                ?>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Tempat</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Tempat" name="nama" value="<?= htmlspecialchars($data['nama']); ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama" name="nama1" value="<?= htmlspecialchars($data['nama1']); ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">No Hp</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="masukkan No Hp" name="no_hp" value="<?= htmlspecialchars($data['no_hp']); ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Lokasi</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Link Lokasi" name="lokasi" value="<?= htmlspecialchars($data['lokasi']); ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Deskripsi</label>
            <textarea name="desk" class="form-control"><?= htmlspecialchars($data['deskripsi']); ?></textarea>
        </div>

        <div class="row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-warning btn-block"><i class="glyphicon glyphicon-edit"></i> Edit</button>
            </div>  
            <div class="col-md-6">
                <a href="m_produk.php" class="btn btn-danger btn-block">Cancel</a>
            </div>
        </div>

        <br>
    </form>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php 
include 'footer.php';
?>
