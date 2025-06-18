<?php
// Menyambungkan ke database
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $ukuran = $_POST['ukuran'];
    $spesifikasi = $_POST['spesifikasi'];
    $rating = $_POST['rating'];

    // Jika ada gambar thumbnail yang diunggah
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $gambarThumbnail = 'uploads/' . $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], $gambarThumbnail);
    } else {
        $gambarThumbnail = $_POST['gambar_lama']; // Tetap menggunakan gambar lama jika tidak ada gambar baru
    }

    // Proses update produk
    $query = "UPDATE produk SET
              nama_produk = ?, deskripsi = ?, harga = ?, ukuran = ?, spesifikasi = ?, gambar_thumbnail = ?, rating = ?, updated_at = NOW()
              WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nama, $deskripsi, $harga, $ukuran, $spesifikasi, $gambarThumbnail, $rating, $id]);

    // Redirect ke halaman daftar produk setelah update
    header("Location: daftarproduk-admin.php");
    exit();
}
?>
