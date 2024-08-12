<?php 
include 'header.php';
include '../koneksi/koneksi.php'; // Pastikan jalur relatif benar

// Fungsi untuk memformat nomor telepon
function formatPhoneNumber($number) {
    return preg_replace('/(\d{4})(?=\d)/', '$1-', $number);
}
?>

<div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid gray"><b>Master Map</b></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Tempat</th>
                <th scope="col">Nama Tempat</th>
                <th scope="col">Kategori</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Image</th>
                <th scope="col">No HP</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $result = mysqli_query($conn, 
                "SELECT p.*, k.nama_kategori 
                FROM produk p 
                LEFT JOIN kategori k ON p.id_kategori = k.id_kategori");

            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['kode_tempat']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['nama_kategori']; ?></td>
                    <td><?= $row['deskripsi']; ?></td>
                    <td><img src="../image/produk/<?= htmlspecialchars($row['image']); ?>" width="100"></td>
                    <td>+62 <?= formatPhoneNumber(htmlspecialchars($row['no_hp'])); ?></td>
                    <td>
                        <a href="edit_produk.php?kode=<?= htmlspecialchars($row['kode_tempat']); ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="proses/del_produk.php?kode=<?= htmlspecialchars($row['kode_tempat']); ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data?')"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
            <?php 
                $no++; 
            }
            ?>
        </tbody>
    </table>
    <a href="tm_produk.php" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Map</a>
</div>

<?php 
include 'footer.php';
?>
