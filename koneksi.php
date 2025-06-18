<?php
// Menampilkan semua error untuk debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Konfigurasi koneksi database
$host = 'localhost'; // Gantilah dengan host database jika menggunakan server lain
$username = 'root';  // Gantilah dengan username database Anda
$password = '';      // Gantilah dengan password database Anda
$database = 'mjsport'; // Gantilah dengan nama database Anda

// Membuat koneksi menggunakan MySQLi
$koneksi = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die('Koneksi gagal: ' . $koneksi->connect_error);
}

// Menetapkan karakter set ke UTF-8
$koneksi->set_charset('utf8mb4');
?>
