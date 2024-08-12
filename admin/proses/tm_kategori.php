<?php
include '../../koneksi/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];

    // Query untuk menambahkan kategori baru ke dalam tabel kategori
    $query = "INSERT INTO kategori (id_kategori, nama_kategori) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt === false) {
        echo "Error: " . mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $kode, $nama);
        if (mysqli_stmt_execute($stmt)) {
            echo "
            <script>
            alert('Kategori berhasil ditambahkan');
            window.location = '../m_kategori.php';
            </script>";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
} else {
    echo "Akses tidak sah!";
}
?>
