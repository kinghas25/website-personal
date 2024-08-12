<?php 
session_start();
include 'koneksi/koneksi.php';

// Ambil data kategori dari database
$kategori_query = mysqli_query($conn, "SELECT id_kategori, nama_kategori FROM kategori");
$kategori_data = [];
while ($row = mysqli_fetch_assoc($kategori_query)) {
    $kategori_data[] = $row;
}

if(isset($_SESSION['kd_cs'])){
    $kode_cs = $_SESSION['kd_cs'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>AworAlastuwo</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row" style="background-color: #078209; color: white; padding: 10px 0;">
            <center>
                <div class="col-md-4" style="padding: 3px;">
                    <span><i class="glyphicon glyphicon-earphone"></i> +6287804616097</span>
                </div>
                <div class="col-md-4" style="padding: 3px;">
                    <span><i class="glyphicon glyphicon-envelope"></i> kelurahanalastuwo@gmail.com</span>
                </div>
                <div class="col-md-4" style="padding: 3px;">
                    <span>KELURAHAN ALASTUWO</span>
                </div>
            </center>
        </div>
    </div>

    <nav class="navbar navbar-default" style="padding: 5px;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand" style="color: #078209; text-align: center;">
    <b>KELURAHAN ALASTUWO</b>
    <div style="font-size: smaller; margin-top: 10px;"><b>AWORALASTUWO</b></div>
</div>

            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kategori<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php foreach ($kategori_data as $kategori): ?>
                                <li><a href="produk.php?id_kategori=<?= $kategori['id_kategori']; ?>"><?= $kategori['nama_kategori']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li><a href="produk.php">Map Alastuwo</a></li>
                    <li><a href="about1.php">Kelurahan Alastuwo</a></li>
                    <li><a href="about.php">Aworalastuwo</a></li>
                    <li><a href="manual.php">Manual Aplikasi</a></li>
                    <?php
                    if(isset($_SESSION['kd_cs'])){
                        $kode_cs = $_SESSION['kd_cs'];
                        $cek = mysqli_query($conn, "SELECT kode_tempat from keranjang where kode_customer = '$kode_cs' ");
                        $value = mysqli_num_rows($cek);
                            ?>
                            <li><a href="keranjang.php"><i class="glyphicon glyphicon-floppy-disk"></i> <b>[ <?= $value ?> ]</b></a></li>
                            <?php 
                        }else{
                            echo "
                            <li><a href='keranjang.php'><i class='glyphicon glyphicon-floppy-disk'></i> [0]</a></li>
                            ";
                        } 
                    if (!isset($_SESSION['user'])) {
                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> Akun <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="user_login.php">Login</a></li>
                                <li><a href="register.php">Register</a></li>
                            </ul>
                        </li>
                        <?php 
                    } else {
                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <?= $_SESSION['user']; ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="proses/logout.php">Log Out</a></li>
                            </ul>
                        </li>
                        <?php 
                    }
                    ?>
                </ul>
                <!-- Search Form -->
                <form class="navbar-form navbar-right" action="produk.php" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" name="search" placeholder="Cari Produk..." required>
                    </div>
                    <button type="submit" class="btn btn-default">Cari</button>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</body>
</html>
