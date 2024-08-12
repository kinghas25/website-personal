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
        <img src="image/home/kantorkelurahan.jpg" style="width: 100%;  height: 650px;">
    </div>
</div>
<br>
<br>

 
<!-- PRODUK TERBARU -->
<div class="container">
    <h4 class="text-center" style="font-family: arial; padding-top: 10px; padding-bottom: 10px; line-height: 29px; border-top: 2px solid #008000; border-bottom: 2px solid #008000;">
    Kantor Kelurahan Alastuwo adalah tempat kerja lurah sebagai perangkat daerah yang merupakan perangkat yang mempunyai tanggung jawab dibawah camat, yang berlokasi di dusun dali, kelurahan Alastuwo, kecamatan Poncol, Kabupaten Magetan.
    </h4>

    <h2 style=" width: 100%; border-bottom: 4px solid #078209; margin-top: 80px;"><b>ANGGOTA KELURAHAN</b></h2>

     <!-- Tambahkan Gambar Pak Lurah -->
     <div class="row text-center" style="margin-top: 50px;">
        <div class="col-md-4">
            <img src="image/home/purnomo.jpeg" style="width: 300px; height: auto;">
            <p style="margin-top: 10px; font-size: 18px;"><strong>Purnomo S.E (Kepala Kelurahan)</strong></p>
        </div>
        <div class="col-md-4">
            <img src="image/home/langgeng.jpeg" style="width: 300px; height: auto;">
            <p style="margin-top: 10px; font-size: 18px;"><strong>Langgeng Priyambodo S.Pd</strong></p>
        </div>
        <div class="col-md-4">
            <img src="image/home/sri.jpeg" style="width: 300px; height: auto;">
            <p style="margin-top: 10px; font-size: 18px;"><strong>Sri Muryani</strong></p>
        </div>
        <div class="col-md-4">
            <img src="image/home/syamsul.jpeg" style="width: 300px; height: auto;">
            <p style="margin-top: 10px; font-size: 18px;"><strong>Syamsul Wathoni S.Pd</strong></p>
        </div>
        <div class="col-md-4">
            <img src="image/home/retno.jpeg" style="width: 300px; height: auto;">
            <p style="margin-top: 10px; font-size: 18px;"><strong>Retno Dwijatiningsih S.Pd</strong></p>
        </div>
        <div class="col-md-4">
            <img src="image/home/rianto.jpeg" style="width: 300px; height: auto;">
            <p style="margin-top: 10px; font-size: 18px;"><strong>Rianto Kurniawan ST.MM</strong></p>
        </div>
    </div>


    
</div>
<br>
<br>
<br>
<br>
<?php 
include 'footer.php';
?>
