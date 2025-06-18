<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    // Hilangkan titik pada harga agar jadi angka valid
    $harga = $_POST['harga']; // Misalnya "99.000"
    $harga = str_replace('.', '', $_POST['harga']);
    $harga = floatval($harga); // Jadi 99000.00

    $ukuran = $_POST['ukuran'];
    $spesifikasi = $_POST['spesifikasi'];
    $rating = $_POST['rating'];

    $targetDir = "uploads/";

    // Proses upload gambar thumbnail
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $namaFile1 = basename($_FILES['gambar']['name']);
        $targetPath1 = $targetDir . $namaFile1;
        if (!move_uploaded_file($_FILES['gambar']['tmp_name'], $targetPath1)) {
            die("Upload gambar thumbnail gagal.");
        }
    } else {
        die("Gambar thumbnail belum diunggah.");
    }

    // Proses upload gambar produk
    if (isset($_FILES['gambarp']) && $_FILES['gambarp']['error'] == 0) {
        $namaFile2 = basename($_FILES['gambarp']['name']);
        $targetPath2 = $targetDir . $namaFile2;
        if (!move_uploaded_file($_FILES['gambarp']['tmp_name'], $targetPath2)) {
            die("Upload gambar produk gagal.");
        }
    } else {
        die("Gambar produk belum diunggah.");
    }

    // Simpan ke database
    $query = "INSERT INTO produk (nama, deskripsi, harga, ukuran, spesifikasi, gambar_thumbnail, gambar_produk, rating, created_at)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $koneksi->prepare($query);
    if (!$stmt) {
        die("Prepare failed: " . $koneksi->error);
    }

    $stmt->bind_param("ssdssssi", $nama, $deskripsi, $harga, $ukuran, $spesifikasi, $targetPath1, $targetPath2, $rating);
    $stmt->execute();

    header("Location: daftarproduk-admin.php");
    exit();
}
?>
