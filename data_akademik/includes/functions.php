<?php
// Fungsi untuk menghitung usia
function hitung_usia($tanggal_lahir) {
    $tgl_lahir = new DateTime($tanggal_lahir);
    $sekarang = new DateTime();
    $usia = $sekarang->diff($tgl_lahir);
    return $usia->y;
}

// Fungsi untuk memformat nama dosen (tanpa gelar)
function format_nama_dosen($nama_lengkap) {
    $parts = explode(',', $nama_lengkap);
    return trim($parts[0]);
}
?>