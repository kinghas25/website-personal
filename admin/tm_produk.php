<?php 
include 'header.php';

// Generate kode produk
$kode = mysqli_query($conn, "SELECT kode_tempat FROM produk ORDER BY kode_tempat DESC");
$data = mysqli_fetch_assoc($kode);
$num = substr($data['kode_tempat'], 1, 4);
$add = (int) $num + 1;
if(strlen($add) == 1){
    $format = "P000".$add;
}else if(strlen($add) == 2){
    $format = "P00".$add;
}else if(strlen($add) == 3){
    $format = "P0".$add;
}else{
    $format = "P".$add;
}
?>

<div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid gray"><b>Tambah Map</b></h2>

    <form action="proses/tm_produk.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="exampleInputFile">Pilih Gambar</label>
            <input type="file" id="exampleInputFile" name="files">
            <p class="help-block">Pilih Gambar untuk Map</p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kode Map</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Kode Produk" disabled value="<?= $format; ?>">
                    <input type="hidden" name="kode" class="form-control" id="exampleInputEmail1" value="<?= $format; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="id_kategori">Kategori map:</label>
            <select class="form-control" id="id_kategori" name="id_kategori" required>
                <?php 
                $kategori_result = mysqli_query($conn, "SELECT * FROM kategori");
                while ($kategori = mysqli_fetch_assoc($kategori_result)) {
                    echo '<option value="'.$kategori['id_kategori'].'">'.$kategori['nama_kategori'].'</option>';
                }
                ?>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Map</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Produk" name="nama">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor HP</label>
                    <input type="tel" class="form-control" id="exampleInputEmail1" placeholder="Contoh: 081234567890" name="no_hp" pattern="08[0-9]{8,11}" title="Nomor HP harus dimulai dengan '08' dan terdiri dari 10-13 digit angka">
                    <p class="help-block">Isi nomor HP tanpa menggunakan Titik(.) atau Koma (,)</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama1</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama1" name="nama1">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Lokasi</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Lokasi" name="lokasi">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Deskripsi</label>
            <textarea name="desk" class="form-control"></textarea>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-success btn-block"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</button>
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
