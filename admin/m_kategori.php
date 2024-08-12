<?php
include 'header.php';
?>

<div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid gray"><b>Master Kategori</b></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Kategori</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $result = mysqli_query($conn, "SELECT * FROM kategori");
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['id_kategori']; ?></td>
                    <td><?= $row['nama_kategori']; ?></td>
                    <td>
                        <a href="edit_kategori.php?id=<?= $row['id_kategori']; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="proses/del_kategori.php?id=<?= $row['id_kategori']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus kategori ini?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                    </td>
                </tr>
            <?php 
                $no++; 
            }
            ?>
        </tbody>
    </table>
    <a href="tm_kategori.php" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Kategori</a>
</div>

<?php 
include 'footer.php';
?>
