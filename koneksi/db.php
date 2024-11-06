<?php
$username_db = "root";
$password_db = "kosong";
$nama_db     = "wedding";
$host   = "db";
// Membuat koneksi
$conn = mysqli_connect($host, $username_db, $password_db, $nama_db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
}
