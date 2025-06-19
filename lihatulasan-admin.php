<?php
// koneksi ke database
include('koneksi.php');

// Inisialisasi nama produk
$nama_produk = 'Produk Tidak Diketahui';
$result = null;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_produk = intval($_GET['id']);

    // Ambil nama produk
    $produkQuery = "SELECT nama FROM produk WHERE id = $id_produk";
    $produkResult = $koneksi->query($produkQuery);
    if ($produkResult && $produkResult->num_rows > 0) {
        $nama_produk = $produkResult->fetch_assoc()['nama'];
    }

    // Ambil ulasan untuk produk
    $sql = "SELECT * FROM reviews WHERE produk_id = $id_produk ORDER BY id DESC";
    $result = $koneksi->query($sql);
} else {
    echo '<p class="text-center text-xl font-semibold text-red-500">Produk tidak ditemukan atau ID tidak valid.</p>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Lihat Ulasan Produk - MJ Sport</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[linear-gradient(to_bottom,_#123458_62%,_#030303_100%)] text-white font-sans">

  <!-- Tombol Back -->
  <div class="fixed top-6 right-6 z-50 flex items-center gap-4">
    <button onclick="history.back()" class="flex items-center gap-2 text-sm bg-white bg-opacity-20 hover:bg-opacity-30 backdrop-blur-md px-4 py-2 rounded-full text-white shadow-md transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
      Kembali
    </button>
  </div>

  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="fixed top-0 left-0 h-full w-64 bg-[#0d2236] p-6 flex flex-col items-center shadow-lg z-40">
      <div class="w-40 h-40 p-2 flex items-center justify-center">
        <img src="LogoMJ.png" alt="MJ Sport Logo" class="w-full h-full object-contain">
      </div>
      <h1 class="text-xl font-extrabold tracking-widest mb-6">MJ SPORT</h1>
      <nav class="space-y-3 w-full">
        <a href="profiltoko-pengunjung.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">👥 Profil Perusahaan</a>
        <a href="aktivitastoko-pengunjung.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">🏪 Aktivitas Toko</a>
        <a href="daftarproduk-pengunjung.php" class="flex items-center gap-3 bg-white text-[#123458] py-2 px-4 rounded-lg font-semibold">📦 Data Produk</a>
        <a href="tampilanfeedbacktoko-pengunjung.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">💬 Feedback Pengunjung</a>
      </nav>
    </aside>

    <!-- Konten Utama -->
    <main class="ml-72 p-6 w-full space-y-6">
      <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-xl px-6 py-4 shadow">
        <h2 class="text-base font-semibold">Ulasan Produk: <?= htmlspecialchars($nama_produk); ?></h2>
      </div>

      <!-- Daftar Ulasan -->
      <div class="space-y-6">
        <?php
        if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $user = $row['nama'];
            $tanggal = date('d F Y', strtotime($row['tanggal']));
            $ukuran = $row['ukuran'];
            $warna = $row['warna'];
            $jumlah = $row['jumlah'];
            $ulasan = $row['ulasan'];
            $rating = $row['rating'];
            $gambar = $row['gambar'];
            $review_id = $row['id'];

            echo '
            <div class="bg-white bg-opacity-10 backdrop-blur-md p-4 rounded-xl flex flex-col md:flex-row justify-between gap-4 shadow-lg">
              <div class="flex-1">
                <p class="font-bold text-sm">@' . htmlspecialchars($user) . ' <span class="font-normal text-xs text-gray-300 ml-2">' . $tanggal . '</span></p>
                <p class="text-sm">Ukuran : ' . htmlspecialchars($ukuran) . '<br>Warna : ' . htmlspecialchars($warna) . '<br>Jumlah : ' . htmlspecialchars($jumlah) . '</p>
                <p class="mt-2 text-sm">Ulasan : <br><span class="italic text-white">“' . htmlspecialchars($ulasan) . '”</span></p>
                <p class="mt-2 text-sm font-semibold">Rating Produk : ';

            for ($i = 1; $i <= 5; $i++) {
              echo $i <= $rating ? '<span class="text-yellow-400">★</span>' : '<span class="text-gray-400">☆</span>';
            }

            echo '</p>
              </div>
              <div class="flex-shrink-0 flex flex-col items-center gap-2">';
            if (!empty($gambar)) {
              echo '<img src="uploads/' . htmlspecialchars($gambar) . '" alt="Gambar Produk" class="w-40 rounded-xl shadow">';
            } else {
              echo '<img src="uploads/default-image.jpg" alt="Gambar Produk" class="w-40 rounded-xl shadow">';
            }

            echo '
                <form action="hapus_ulasan.php" method="POST" onsubmit="return confirm(\'Apakah Anda yakin ingin menghapus ulasan ini?\');">
                  <input type="hidden" name="review_id" value="' . $review_id . '">
                  <input type="hidden" name="produk_id" value="' . $id_produk . '">
                  <button type="submit" class="mt-2 bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-1 rounded-full shadow">
                    Hapus Ulasan
                  </button>
                </form>
              </div>
            </div>';
          }
        } else {
          echo '<p class="text-center text-xl font-semibold">Belum ada ulasan dari pelanggan terhadap produk ini.</p>';
        }

        $koneksi->close();
        ?>
      </div>

      <!-- Tombol aksi -->
      <div class="flex justify-end gap-4 mt-6">
        <button onclick="window.location.href='daftarproduk-admin.php'" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white">Selesai</button>
      </div>
    </main>
  </div>
</body>
</html>
