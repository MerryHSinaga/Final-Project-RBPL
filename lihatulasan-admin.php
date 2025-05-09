<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Lihat Ulasan Produk - MJ Sport</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[linear-gradient(to_bottom,_#123458_62%,_#030303_100%)] text-white font-sans">

  <!-- Tombol Back + Profil -->
  <div class="fixed top-6 right-6 z-50 flex items-center gap-4">
    <button onclick="history.back()" class="flex items-center gap-2 text-sm bg-white bg-opacity-20 hover:bg-opacity-30 backdrop-blur-md px-4 py-2 rounded-full text-white shadow-md transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
      Kembali
    </button>
    <a href="profiladmin.php" class="bg-white bg-opacity-20 hover:bg-opacity-30 backdrop-blur-md p-2 rounded-full shadow-md transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.828 0 5.433.877 7.879 2.363M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg>
    </a>
  </div>

  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="fixed top-0 left-0 h-full w-64 bg-[#0d2236] p-6 flex flex-col items-center shadow-lg z-40">
      <div class="w-40 h-40 p-2 flex items-center justify-center">
        <img src="LogoMJ.png" alt="MJ Sport Logo" class="w-full h-full object-contain">
      </div>
      <h1 class="text-xl font-extrabold tracking-widest mb-6">MJ SPORT</h1>
      <nav class="space-y-3 w-full">
        <a href="profiltoko-admin.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          👥 Profil Perusahaan
        </a>
        <a href="aktivitastoko-admin.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          🏪 Aktivitas Toko
        </a>
        <a href="daftarproduk-admin.php" class="flex items-center gap-3 bg-white text-[#123458] py-2 px-4 rounded-lg font-semibold">
          📦 Data Produk
        </a>
        <a href="tampilanfeedbacktoko-admin.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          💬 Feedback Pengunjung
        </a>
      </nav>
    </aside>

    <!-- Konten Utama -->
    <main class="ml-72 p-6 w-full space-y-6">
      <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-xl px-6 py-4 shadow">
        <h2 class="text-base font-semibold">Ulasan Produk Jersey Ultimate Pro - Edition 2025.</h2>
      </div>

      <!-- Daftar Ulasan -->
      <div class="space-y-6">
        <?php
        $ulasan = [
          [
            'user' => 'Kaize.xhz',
            'tanggal' => '15 Desember 20:41',
            'ukuran' => 'XXL',
            'warna' => 'Hitam',
            'jumlah' => 1,
            'isi' => 'Jerseynya nyaman dipakai dan kualitas sablonnya awet, pasti beli lagi deh di sini!',
          ],
          [
            'user' => 'Raphenize',
            'tanggal' => '10 Desember 13:41',
            'ukuran' => 'XL',
            'warna' => 'Hitam',
            'jumlah' => 2,
            'isi' => 'Desain keren, bahan adem, dan pengirimannya cepat, mantap banget!',
          ],
          [
            'user' => 'merry_els',
            'tanggal' => '10 Desember 09:00',
            'ukuran' => 'XXL',
            'warna' => 'Hitam',
            'jumlah' => 1,
            'isi' => 'Asli bagus banget bahannya, pelayan toko-nya juga ga kalah ramah, bakal sering pesan jersey di sini!',
          ]
        ];

        foreach ($ulasan as $u) {
          echo '
          <div class="bg-white bg-opacity-10 backdrop-blur-md p-4 rounded-xl flex flex-col md:flex-row justify-between gap-4 shadow-lg">
            <div class="flex-1">
              <p class="font-bold text-sm">@' . htmlspecialchars($u["user"]) . ' <span class="font-normal text-xs text-gray-300 ml-2">' . $u["tanggal"] . '</span></p>
              <p class="text-sm">Ukuran : ' . $u["ukuran"] . '<br>Warna : ' . $u["warna"] . '<br>Jumlah : ' . $u["jumlah"] . '</p>
              <p class="mt-2 text-sm">Ulasan : <br><span class="italic text-white">“' . $u["isi"] . '”</span></p>
              <p class="mt-2 text-sm font-semibold">Rating Produk :
                <span class="text-yellow-400">★★★★★</span>
              </p>
            </div>
            <div class="flex-shrink-0 flex flex-col items-center">
              <img src="jersey1.jpg" alt="Jersey" class="w-40 rounded-xl shadow mb-2">
              <form action="sembunyikan_ulasan.php" method="POST">
                <input type="hidden" name="user" value="' . htmlspecialchars($u["user"]) . '">
                <input type="hidden" name="tanggal" value="' . htmlspecialchars($u["tanggal"]) . '">
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded-full text-xs transition">
                  Sembunyikan
                </button>
              </form>
            </div>
          </div>
          ';
        }
        ?>
      </div>

      <!-- Tombol aksi -->
      <div class="flex justify-end gap-4 mt-6">
        <button onclick="history.back()" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-full text-sm">Selesai</button>
      </div>
    </main>
  </div>
</body>
</html>
