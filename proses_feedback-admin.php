<?php
include('koneksi.php');  // Menghubungkan ke database
session_start();
require_once 'auth.php';
checkAccess('admin');

if (!file_exists('uploads/')) {
    mkdir('uploads/', 0777, true); // Membuat folder jika belum ada
}

// Menangkap data dari form
$tanggal = $_POST['tanggal'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$rating = $_POST['rating'];
$ulasan = $_POST['ulasan'];

// Menangani upload gambar
$gambar = null;
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/' . $gambar);
}

// Menyimpan data ke dalam database
$sql = "INSERT INTO feedback_toko (tanggal, nama, alamat, telepon, rating, ulasan, gambar) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $koneksi->prepare($sql);
$stmt->bind_param("ssssiss", $tanggal, $nama, $alamat, $telepon, $rating, $ulasan, $gambar);

if ($stmt->execute()) {
    // Redirect ke halaman feedback dengan status sukses
    header("Location: berifeedbacktoko-admin.php?status=success");
} else {
    // Redirect ke halaman feedback dengan status gagal
    header("Location: berifeedbacktoko-admin.php?status=failed");
}

$stmt->close();
$koneksi->close();
?>
