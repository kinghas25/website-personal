<?php 
include 'header.php';

// Fungsi untuk memformat nomor telepon
function formatPhoneNumber($number) {
    return preg_replace('/(\d{4})(?=\d)/', '$1-', $number);
}
?>

<!-- IMAGE -->
<div class="container-fluid" style="margin: 0;padding: 0;">
    <div class="image" style="margin-top: -21px">
        <img src="image/home/awor.jpg" style="width: 100%;  height: 650px;">
    </div>
</div>
<br>
<br>

<!-- PRODUK TERBARU -->
<div class="container">
    <h4 class="text-center" style="font-family: arial; padding-top: 10px; padding-bottom: 10px; line-height: 29px; border-top: 2px solid #008000; border-bottom: 2px solid #008000;">
        Kami adalah kelompok KKN AWORALASTUWO dari Universitas Islam Kadiri-Kediri (UNISKA) dengan anggota berjumlah 29 Mahasiswa dari berbagai fakultas seperti fakultas ekonomi, fakultas hukum, fakultas pertanian, fakultas perternakan dan fakultas teknik yang ditempatkan di Kelurahan Alastuwo, Kecamatan Poncol, Kabupaten Magetan, Provinsi Jawa Timur.
    </h4>

    <h2 style=" width: 100%; border-bottom: 4px solid #078209; margin-top: 80px;"><b>Map Alastuwo</b></h2>

    <div class="row">
        <?php 
        $result = mysqli_query($conn, "SELECT * FROM produk");
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="image/produk/<?= $row['image']; ?>" >
                    <div class="caption">
                        <h3><?= $row['nama'];  ?></h3>
                        <h4>+62 <?= formatPhoneNumber($row['no_hp']); ?></h4>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="detail_produk.php?produk=<?= $row['kode_tempat']; ?>" class="btn btn-warning btn-block">Detail</a> 
                            </div>
                            <?php if(isset($_SESSION['kd_cs'])){ ?>
                                <div class="col-md-6">
                                    <a href="proses/add.php?produk=<?= $row['kode_tempat']; ?>&kd_cs=<?= $kode_cs; ?>&hal=1" class="btn btn-success btn-block" role="button"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</a>
                                </div>
                                <?php 
                            }
                            else{
                                ?>
                                <div class="col-md-6">
                                    <a href="keranjang.php" class="btn btn-success btn-block" role="button"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</a>
                                </div>

                                <?php 
                            }
                            ?>

                        </div>

                    </div>
                </div>
            </div>
            <?php 
        }
        ?>
    </div>
</div>
<br>
<br>
<br>
<br>
<?php 
include 'footer.php';
?>
