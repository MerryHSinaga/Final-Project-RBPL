<?php
// dataproduk-pengunjung.php

// Tangkap kata kunci pencarian (jika ada)
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
  
  <!-- Tombol Back -->
  <div class="fixed top-6 right-6 z-50 flex items-center gap-4">

    <button onclick="history.back()" 
            class="flex items-center gap-3 text-base bg-white bg-opacity-20 hover:bg-opacity-30 backdrop-blur-md px-5 py-2.5 rounded-full text-white shadow-lg transition">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
      Kembali
    </button>
  </div>

  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="fixed top-0 left-0 h-full w-64 bg-[#0d2236] p-6 flex flex-col items-center shadow-lg z-40">

      <div class="w-60 h-60 p-4 flex items-center justify-center">
        <img src="LogoMJ.png" alt="MJ Sport Logo" class="max-w-full max-h-full object-contain">
      </div>
      <h1 class="text-2xl font-extrabold tracking-widest mb-10">MJ SPORT</h1>
      <nav class="space-y-4 w-full">
        <a href="profiltoko-pengunjung.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          👥 Profil Perusahaan
        </a>
        <a href="aktivitastoko-pengunjung.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          🏪 Aktivitas Toko
        </a>
        <a href="daftarproduk-pengunjung.php" class="flex items-center gap-3 bg-white text-[#123458] py-2 px-4 rounded-lg font-semibold">
          📦 Data Produk
        </a>
        <a href="tampilanfeedbacktoko-pengunjung.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          💬 Feedback Pengunjung
        </a>
      </nav>
    </aside>

    <!-- Konten Utama -->
    <main class="ml-80 p-10 space-y-8">

      <!-- Search Bar -->
      <form method="GET" class="bg-white bg-opacity-10 backdrop-blur-md rounded-2xl px-6 py-4 shadow-md">
        <h2 class="font-bold mb-2">Selamat datang! Ingin melihat produk apa hari ini?</h2>
        <div class="flex gap-3 mt-2">
          <input type="text" name="keyword" value="<?= htmlspecialchars($keyword) ?>" placeholder="Cari produk..." class="w-full px-4 py-2 bg-white bg-opacity-30 text-black placeholder-gray-700 rounded-full focus:outline-none">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-full">Cari</button>
        </div>
      </form>

      <!-- Grid Produk -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php
        $produk = [
          ["title" => "Jersey Ultimate Pro – Edition 2025", "harga" => "99.000", "detail" => "Dry-fit premium", "rating" => 4, "gambar" => "jersey1.jpg"],
          ["title" => "Jersey Striker Pro", "harga" => "120.000", "detail" => "Dry-fit ultra light", "rating" => 1, "gambar" => "jersey2.jpg"],
          ["title" => "Jersey Speed X Elite", "harga" => "130.000", "detail" => "Polyester breathable", "rating" => 2, "gambar" => "jersey3.jpg"],
          ["title" => "Jersey Champion Series", "harga" => "115.000", "detail" => "Dry-fit premium anti-bakteri", "rating" => 3, "gambar" => "jersey4.jpg"]
        ];

        // Filter produk berdasarkan keyword
        $filteredProduk = array_filter($produk, function ($item) use ($keyword) {
          return empty($keyword) || str_contains(strtolower($item['title']), $keyword);
        });

        // Tampilkan produk yang sudah difilter
        if (count($filteredProduk) > 0) {
          foreach ($filteredProduk as $item):
            $stars = str_repeat('★', $item['rating']) . str_repeat('☆', 5 - $item['rating']);
        ?>
        <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-2xl p-5 shadow-lg text-white">
          <h3 class="text-xl font-bold text-center mb-3"><?= $item['title']; ?></h3>
          <img src="<?= $item['gambar']; ?>" alt="<?= $item['title']; ?>" class="w-full h-48 object-contain rounded-lg mb-4">
          <p><strong>Harga</strong>: Rp<?= $item['harga']; ?></p>
          <p><strong>Detail Produk</strong>: <?= $item['detail']; ?></p>
          <p><strong>Ukuran</strong>: Tersedia</p>
          <p><strong>Rating Pembeli</strong>: <?= $stars; ?></p>
          <div class="flex justify-between mt-4 flex-wrap gap-2">
            <button onclick="window.location.href='lihatproduk-pengunjung.php'" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white"> Lihat Detail</button>
            <button onclick="window.location.href='lihatulasan-pengunjung.php'" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white"> Lihat Ulasan</button>
          </div>
        </div>
        <?php endforeach;
        } else {
          echo "<p class='text-center col-span-2 text-gray-300 italic'>Produk tidak ditemukan.</p>";
        }
        ?>
      </div>
    </main>
  </div>
</body>
</html>
