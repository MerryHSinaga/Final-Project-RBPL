<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Feedback Pengunjung Terhadap Toko MJ Sport</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-[#123458] to-black text-white font-sans">

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
<aside class="fixed top-0 left-0 h-full w-64 bg-gradient-to-b from-[#123458] to-black bg-opacity-80 backdrop-blur-md p-6 flex flex-col items-center shadow-lg">
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
        <a href="daftarproduk-admin.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          📦 Data Produk
        </a>
    <a href="tampilanfeedbacktoko-admin.php" class="flex items-center gap-3 bg-white text-[#123458] py-2 px-4 rounded-lg font-semibold">
      💬 Feedback Pengunjung
    </a>
  </nav>
</aside>


<!-- Main Content -->
<main class="ml-72 p-8">
  <div class="bg-black bg-opacity-10 backdrop-blur-md p-6 rounded-xl shadow-md max-w-6xl mx-auto">
    <h2 class="text-xl font-bold mb-6 text-center">Ulasan terkait MJ Sport.</h2>

    <!-- Feedback Cards -->
    <div class="space-y-6">
      <?php
      // array ulasan
      $ulasan = [
        [
          'nama' => 'Kaize.xhz', 
          'tanggal' => '15 Desember',
          'isi' => 'Tokonya bersih dan teratur, terdapat fasilitas tempat duduk dan AC juga jadi ga panas. Banyak pilihan jersey bahkan alat olahraga juga tersedia dengan lengkap.',
          'rating' => 4,
          'gambar' => 'feedback1.jpg'
        ],
        [
          'nama' => 'Rapheniz',
          'tanggal' => '02 Desember',
          'isi' => 'Pelayanan di MJ Sport sangat ramah dan membantu, saya merasa nyaman berbelanja di sana. Barang-barangnya lengkap dan kualitasnya sangat bagus, cocok untuk semua kebutuhan olahraga saya. Tempatnya juga bersih dan tertata rapi, jadi makin betah lihat-lihat produk.',
          'rating' => 5,
          'gambar' => 'feedback2.jpg'
        ],
        [
          'nama' => 'Fufufafa_',
          'tanggal' => '25 November',
          'isi' => 'MJ Sport punya koleksi perlengkapan olahraga yang up-to-date dan original. Saya beli sepatu lari di sini dan hasilnya sangat memuaskan, empuk dan nyaman banget dipakai. Harga yang ditawarkan juga bersaing dan sering ada promo menarik.',
          'rating' => 5,
          'gambar' => 'feedback3.jpg'
        ],
        [
          'nama' => 'merry_el.s',
          'tanggal' => '20 November',
          'isi' => 'Setiap kali butuh alat olahraga, saya selalu ke MJ Sport karena barangnya terpercaya. Stafnya cepat tanggap dan bisa memberikan rekomendasi sesuai kebutuhan saya. Transaksi juga mudah dan banyak pilihan metode pembayarannya.',
          'rating' => 5,
          'gambar' => 'feedback4.jpg'
        ],
      ];

      foreach ($ulasan as $u): ?>
        <div class="bg-white bg-opacity-20 backdrop-blur-md rounded-xl p-4 flex flex-col md:flex-row gap-4 shadow-lg">
          <div class="flex-1">
            <div class="flex justify-between items-center text-sm mb-2">
              <span class="font-semibold"><?= $u['nama'] ?></span>
              <span class="text-gray-300"><?= $u['tanggal'] ?></span>
            </div>
            <p class="text-white mb-2">Kata MJ Sport-nation :</p>
            <p class="text-white mb-2">"<?= $u['isi'] ?>"</p>
            <div class="text-yellow-400 text-lg">
              <?php for ($i = 1; $i <= 5; $i++): ?>
                <span class="<?= $i <= $u['rating'] ? 'text-yellow-400' : 'text-gray-400' ?>">★</span>
              <?php endfor; ?>
            </div>
          </div>
          <div class="md:w-40 md:h-32 flex-shrink-0 rounded-lg overflow-hidden">
            <img src="<?= $u['gambar'] ?>" alt="Gambar Ulasan" class="w-full h-full object-cover">
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="text-right mt-6">
    <button onclick="window.location.href='berifeedbacktoko-admin.php'" class="bg-yellow-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-black"> Nilai Toko</button>
    <button onclick="window.location.href='tampilanfeedbacktoko-admin.php'" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white"> Selesai</button>
    </div>
  </div>
</main>

</body>
</html>
