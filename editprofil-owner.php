<?php
include('koneksi.php');  // Menghubungkan ke database
session_start();
require_once 'auth.php';
checkAccess('owner');

$user_id = $_SESSION['user_id'];

// Ambil data sebelumnya
$stmt = $koneksi->prepare("SELECT * FROM profiles WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$profile = $result->fetch_assoc();

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $full_name = $_POST['nama'];
  $ttl = $_POST['ttl'];
  $gender = $_POST['jenis_kelamin'];
  $address = $_POST['alamat'];
  $occupation = $_POST['pekerjaan'];
  $interest = $_POST['minat'];
  $social = $_POST['sosial'];

  if ($profile) {
    $stmt = $koneksi->prepare("UPDATE profiles SET full_name=?, birth_place_date=?, gender=?, address=?, occupation=?, interest=?, social_media=? WHERE user_id=?");
    if (!$stmt) {
      die("Prepare failed: " . $koneksi->error);
    }
    $stmt->bind_param("sssssssi", $full_name, $ttl, $gender, $address, $occupation, $interest, $social, $user_id);
  } else {
    $stmt = $koneksi->prepare("INSERT INTO profiles (user_id, full_name, birth_place_date, gender, address, occupation, interest, social_media) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
      die("Prepare failed: " . $koneksi->error);
    }
    $stmt->bind_param("isssssss", $user_id, $full_name, $ttl, $gender, $address, $occupation, $interest, $social);
  }

  if ($stmt->execute()) {
    echo "<script>alert('Profil berhasil diperbarui!'); window.location.href='profilowner.php';</script>";
    exit;
  } else {
    echo "<script>alert('Gagal memperbarui profil!');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Profil - MJ SPORT</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[linear-gradient(to_bottom,_#123458_62%,_#030303_100%)] text-white font-sans">
  <main class="flex-1 p-10">
    <form method="POST">
      <div class="max-w-3xl mx-auto bg-white bg-opacity-10 backdrop-blur-md rounded-3xl p-8 shadow-xl space-y-8">
        <div class="bg-gradient-to-r from-[#0d2236] to-[#134a8e] rounded-xl p-6 space-y-4">
          <h3 class="text-lg font-semibold">Edit Informasi</h3>
          <div class="space-y-3 text-sm">
            <div>
              <label>Nama Lengkap</label>
              <input name="nama" value="<?= htmlspecialchars($profile['full_name'] ?? '') ?>" class="w-full p-2 rounded bg-white text-black">
            </div>
            <div>
              <label>Tempat, Tanggal Lahir</label>
              <input name="ttl" value="<?= htmlspecialchars($profile['birth_place_date'] ?? '') ?>" class="w-full p-2 rounded bg-white text-black">
            </div>
            <div>
              <label>Jenis Kelamin</label>
              <input name="jenis_kelamin" value="<?= htmlspecialchars($profile['gender'] ?? '') ?>" class="w-full p-2 rounded bg-white text-black">
            </div>
            <div>
              <label>Alamat</label>
              <textarea name="alamat" class="w-full p-2 rounded bg-white text-black"><?= htmlspecialchars($profile['address'] ?? '') ?></textarea>
            </div>
            <div>
              <label>Pekerjaan</label>
              <input name="pekerjaan" value="<?= htmlspecialchars($profile['occupation'] ?? '') ?>" class="w-full p-2 rounded bg-white text-black">
            </div>
            <div>
              <label>Minat</label>
              <input name="minat" value="<?= htmlspecialchars($profile['interest'] ?? '') ?>" class="w-full p-2 rounded bg-white text-black">
            </div>
            <div>
              <label>Media Sosial</label>
              <input name="sosial" value="<?= htmlspecialchars($profile['social_media'] ?? '') ?>" class="w-full p-2 rounded bg-white text-black">
            </div>
          </div>
        </div>
        <div class="text-right">
          <button type="submit" class="bg-white text-[#123458] px-6 py-3 rounded-full font-bold hover:bg-opacity-80">Simpan</button>
        </div>
      </div>
    </form>
  </main>
</body>
</html>
