<?php 

include 'header.php';

$result1 = mysqli_query($conn, "SELECT COUNT(DISTINCT kode_tempat) as total FROM produk");
$row1 = mysqli_fetch_assoc($result1);
$jml1 = $row1['total'];

$result2 = mysqli_query($conn, "SELECT COUNT(DISTINCT id_kategori) as total FROM kategori");
$row2 = mysqli_fetch_assoc($result2);
$jml2 = $row2['total'];

$result3 = mysqli_query($conn, "SELECT COUNT(DISTINCT kode_customer) as total FROM customer");
$row3 = mysqli_fetch_assoc($result3);
$jml3 = $row3['total'];


?>
<div class="container">
	<div class="row">
		<div class="col-md-4" >
			<div style="background-color: #dfdfdf; padding-bottom: 60px; padding-left: 20px;padding-right: 20px; padding-top: 10px;">
				<h4>JUMLAH TEMPAT</h4>
				<h4 style="font-size: 56pt;"><b><?= $jml1; ?></b></h4>
			</div>
		</div>

		<div class="col-md-4" >
			<div style="background-color: #dfdfdf; padding-bottom: 60px; padding-left: 20px;padding-right: 20px; padding-top: 10px;">
				<h4>JUMLAH KATEGORI</h4>
				<h4 style="font-size: 56pt;"><b><?= $jml2; ?></b></h4>
			</div>
		</div>

		<div class="col-md-4" >
			<div style="background-color: #dfdfdf; padding-bottom: 60px; padding-left: 20px;padding-right: 20px; padding-top: 10px;">
				<h4>JUMLAH USER</h4>
				<h4 style="font-size: 56pt;"><b><?= $jml3; ?></b></h4>
			</div>
		</div>

	</div>
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