<?php
$host = "localhost";
$nama = "root"; // Ganti jika username MySQL Anda berbeda
$pass = ""; // Ganti jika MySQL Anda memiliki password
$dbname = "farmifyy"; // Pastikan database ini sudah dibuat

// Koneksi ke database
$conn = new mysqli($host, $nama, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    echo "Koneksi berhasil!";
}
if (!$conn) {
    die("Error: " . mysqli_connect_error());
}
?>
