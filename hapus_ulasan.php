<?php
include('koneksi.php');

if (isset($_POST['review_id']) && isset($_POST['produk_id'])) {
    $review_id = intval($_POST['review_id']);
    $produk_id = intval($_POST['produk_id']);

    // Cek gambar dan hapus jika ada
    $check = $koneksi->query("SELECT gambar FROM reviews WHERE id = $review_id");
    if ($check && $check->num_rows > 0) {
        $data = $check->fetch_assoc();
        if (!empty($data['gambar'])) {
            $path = 'uploads/' . $data['gambar'];
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }

    // Hapus ulasan
    $delete = $koneksi->query("DELETE FROM reviews WHERE id = $review_id");

    if ($delete) {
        header("Location: lihatulasan-admin.php?id=$produk_id");
        exit;
    } else {
        echo "Gagal menghapus ulasan.";
    }
} else {
    echo "Data tidak lengkap.";
}
?>
