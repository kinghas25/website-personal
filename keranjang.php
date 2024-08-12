<?php 
include 'header.php';


// Hapus item dari keranjang
if(isset($_GET['del'])){
    $id_keranjang = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM keranjang WHERE id_keranjang = ?");
    $stmt->bind_param("i", $id_keranjang);
    if($stmt->execute()){
        echo "
        <script>
        alert('1 MAP DIHAPUS');
        window.location = 'keranjang.php';
        </script>
        ";
    }
    $stmt->close();
}
?>

<div class="container" style="padding-bottom: 300px;">
    <h2 style="width: 100%; border-bottom: 4px solid #078209"><b>Keranjang</b></h2>
    <table class="table table-striped">
        <?php 
        if(isset($_SESSION['user'])){
            $kode_cs = $_SESSION['kd_cs'];

            // Cek jumlah keranjang
            $stmt = $conn->prepare("SELECT * FROM keranjang WHERE kode_customer = ?");
            $stmt->bind_param("s", $kode_cs);
            $stmt->execute();
            $result = $stmt->get_result();
            $jml = $result->num_rows;

            if($jml > 0){
                ?>    
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama Tempat</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $stmt = $conn->prepare("
                    SELECT k.id_keranjang as keranjang, k.kode_tempat as kd, p.nama as nama_tempat, p.nama1 as nama, p.no_hp as no_hp, p.lokasi as lokasi, p.image as gambar 
                    FROM keranjang k 
                    JOIN produk p ON k.kode_tempat = p.kode_tempat 
                    WHERE k.kode_customer = ?
                ");
                $stmt->bind_param("s", $kode_cs);
                $stmt->execute();
                $result = $stmt->get_result();
                $no = 1;
                while($row = $result->fetch_assoc()){
                ?>
                    <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><img src="image/produk/<?= htmlspecialchars($row['gambar']); ?>" width="100"></td>
                        <td><?= htmlspecialchars($row['nama_tempat']); ?></td>
                        <td><?= htmlspecialchars($row['nama']); ?></td>
                        <td>0<?= htmlspecialchars($row['no_hp']); ?></td>
                        <td><a href="<?= htmlspecialchars($row['lokasi']); ?>" target="_blank"><?= htmlspecialchars($row['lokasi']); ?></a></td>
                        <td>
                            <a href="keranjang.php?del=1&id=<?= htmlspecialchars($row['keranjang']); ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin dihapus?')">Delete</a>
                        </td>
                    </tr>
                <?php 
                    $no++;
                }
                ?>
                </tbody>
                <?php 
            } else {
                echo "
                <thead>
                    <tr>
                        <th scope='col'>No</th>
                        <th scope='col'>Foto</th>
                        <th scope='col'>Nama Tempat</th>
                        <th scope='col'>Nama</th>
                        <th scope='col'>No HP</th>
                        <th scope='col'>Lokasi</th>
                        <th scope='col'>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan='7' class='text-center bg-warning'><h5><b>KERANJANG BELANJA ANDA KOSONG</b></h5></td>
                    </tr>
                </tbody>
                ";
            }
        } else {
            echo "
            <tr>
                <td colspan='7' class='text-center bg-danger'><h5><b>SILAHKAN LOGIN TERLEBIH DAHULU SEBELUM BERBELANJA</b></h5></td>
            </tr>";
        }
        ?>
    </table>
</div>

<?php 
include 'footer.php';
?>
