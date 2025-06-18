<?php
// Koneksi ke database
include('koneksi.php');
session_start();

// Pastikan folder uploads ada
if (!file_exists('uploads/')) {
    mkdir('uploads/', 0777, true);
}

// Mendapatkan data dari form
$tanggal    = $_POST['tanggal'];
$nama       = $_POST['nama'];
$alamat     = $_POST['alamat'];
$telepon    = $_POST['telepon'];
$rating     = intval($_POST['rating']);
$ukuran     = $_POST['ukuran'];
$warna      = $_POST['warna'];
$jumlah     = intval($_POST['jumlah']);
$ulasan     = $_POST['ulasan'];
$produk_id  = intval($_POST['produk_id']);  // pastikan integer

// Pastikan produk_id valid
$produk_id = isset($_POST['produk_id']) ? intval($_POST['produk_id']) : 0;
if ($produk_id <= 0) {
    die("Produk ID tidak valid.");
}

// Menangani file gambar
$gambar = null;
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/' . $gambar);
}

$sql = "INSERT INTO reviews 
    (produk_id, tanggal, nama, alamat, telepon, rating, ukuran, warna, jumlah, gambar, ulasan)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $koneksi->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $koneksi->error);
}

// i = int, s = string
$stmt->bind_param(
    "isssisissss",
    $produk_id,
    $tanggal,
    $nama,
    $alamat,
    $telepon,
    $rating,
    $ukuran,
    $warna,
    $jumlah,
    $gambar,
    $ulasan
);

// Menjalankan query
if ($stmt->execute()) {
    // Redirect kembali ke form, selalu sertakan id
    header('Location: beriulasanproduk-pengunjung.php?id=' . $produk_id . '&status=success');
} else {
    header('Location: beriulasanproduk-pengunjung.php?id=' . $produk_id . '&status=failed');
}
exit;

// Menutup koneksi
$stmt->close();
$koneksi->close();

