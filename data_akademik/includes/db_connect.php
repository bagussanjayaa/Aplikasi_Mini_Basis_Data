<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "uas_basisdata"; // Sesuaikan dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>