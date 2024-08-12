<?php 
include 'header.php';
// generate kode material
$id_kategori = $_GET['id'];
$kode = mysqli_query($conn, "SELECT * from kategori where id_kategori = '$id_kategori'");
$data = mysqli_fetch_assoc($kode);
?>


<div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid gray"><b>Edit Kategori</b></h2>

    <form action="proses/edit_kategori.php" method="POST">
        <input type="hidden" name="id_kategori" value="<?= $data['id_kategori']; ?>">
        
        <div class="form-group">
            <label for="id_kategori">ID Kategori</label>
            <input type="text" class="form-control" id="id_kategori" name="id_kategori_display" value="<?= $data['id_kategori']; ?>" disabled>
        </div>

        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $data['nama_kategori']; ?>" required>
        </div>

        <button type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</button>
        <a href="m_kategori.php" class="btn btn-danger">Cancel</a>
    </form>
</div>

<?php 
include 'footer.php';
?>
