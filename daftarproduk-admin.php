<?php
require 'koneksi.php';
$keyword = isset($_GET['keyword']) ? strtolower(trim($_GET['keyword'])) : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Produk - MJ Sport</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[linear-gradient(to_bottom,_#123458_62%,_#030303_100%)] text-white font-sans">

<!-- Tombol Back dan Profil -->
<div class="fixed top-6 right-6 z-50 flex items-center gap-4">
  <button onclick="history.back()" class="flex items-center gap-2 bg-white/20 hover:bg-white/30 px-5 py-2.5 rounded-full shadow-lg">⬅ Kembali</button>
  <a href="profiladmin.php" class="bg-white/20 hover:bg-white/30 p-2.5 rounded-full shadow-lg">👤</a>
</div>

<div class="flex min-h-screen">
  <!-- Sidebar -->
  <aside class="fixed top-0 left-0 h-full w-64 bg-[#0d2236] p-6 flex flex-col items-center shadow-lg z-40">
    <div class="w-60 h-60 p-4 flex items-center justify-center">
      <img src="LogoMJ.png" alt="MJ Sport Logo" class="max-w-full max-h-full object-contain">
    </div>
    <h1 class="text-2xl font-extrabold tracking-widest mb-10">MJ SPORT</h1>
    <nav class="space-y-4 w-full">
      <a href="profiltoko-admin.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">👥 Profil Perusahaan</a>
      <a href="aktivitastoko-admin.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">🏪 Aktivitas Toko</a>
      <a href="daftarproduk-admin.php" class="flex items-center gap-3 bg-white text-[#123458] py-2 px-4 rounded-lg font-semibold">📦 Data Produk</a>
      <a href="tampilanfeedbacktoko-admin.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">💬 Feedback Pengunjung</a>
      <a href="logout.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">⏻ Logout</a>
    </nav>
  </aside>

  <!-- Konten -->
  <main class="ml-80 p-10 space-y-8 w-full">
    <!-- Search -->
    <form method="GET" class="bg-white bg-opacity-10 backdrop-blur-md rounded-2xl px-6 py-4 shadow-md">
      <h2 class="font-bold mb-2">Selamat datang! Ingin melihat produk apa hari ini?</h2>
      <div class="flex gap-3 mt-2">
        <input type="text" name="keyword" value="<?= htmlspecialchars($keyword) ?>" placeholder="Cari produk..." class="w-full px-4 py-2 bg-white/30 text-black placeholder-gray-700 rounded-full focus:outline-none">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-full">Cari</button>
      </div>
    </form>

    <!-- Produk -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <?php
      $query = "SELECT * FROM produk";
      if (!empty($keyword)) {
        $keywordSafe = mysqli_real_escape_string($koneksi, $keyword);
        $query .= " WHERE LOWER(nama) LIKE '%$keywordSafe%'";
      }
      $query .= " ORDER BY id DESC LIMIT 4";
      $result = $koneksi->query($query);

      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $id_produk = $row['id'];
          $rating = round($row['rating']);
          $stars = '';
          for ($i = 1; $i <= 5; $i++) {
              $stars .= ($i <= $rating) ? '<span class="text-yellow-400">★</span>' : '<span class="text-white">☆</span>';
          }
      ?>
        <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-2xl p-5 shadow-lg text-white">
          <h3 class="text-xl font-bold text-center mb-3"><?= $row['nama']; ?></h3>
          <img src="<?= $row['gambar_thumbnail']; ?>" alt="<?= $row['nama']; ?>" class="w-full h-48 object-contain rounded-lg mb-4">
          <div class="grid grid-cols-[auto_1fr] gap-x-2 gap-y-1 text-sm">
            <div><strong>Harga</strong>:</div>
            <div>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></div>

            <div><strong>Detail Produk</strong>:</div>
            <div><?= $row['deskripsi']; ?></div>

            <div><strong>Ukuran</strong>:</div>
            <div><?= $row['ukuran']; ?></div>

            <div><strong>Rating Pembeli</strong>:</div>
            <div><?= $stars; ?></div>
          </div>
          <div class="flex justify-between mt-4 flex-wrap gap-2">
            <a href="lihatproduk-admin.php?id=<?= $id_produk ?>" class="bg-blue-500 hover:bg-yellow-600 px-4 py-2 rounded-lg text-white text-sm">Detail Produk</a>
            <a href="lihatulasan-admin.php?id=<?= $id_produk ?>" class="bg-blue-500 hover:bg-yellow-600 px-4 py-2 rounded-lg text-white text-sm">Ulasan Produk</a>
          </div>
        </div>
      <?php
        }
      } else {
        echo "<p class='text-center col-span-2 text-gray-300 italic'>Produk tidak ditemukan.</p>";
      }
      ?>
    </div>
  </main>
</div>

</body>
</html>
