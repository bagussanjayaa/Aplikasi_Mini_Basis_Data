<?php
include '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kd_mk = $_POST['kd_mk'];
    $nama = $_POST['nama'];
    $sks = $_POST['sks'];
    
    $sql = "INSERT INTO Matakuliah (kd_mk, nama, sks) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $kd_mk, $nama, $sks);
    
    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mata Kuliah</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Tambah Mata Kuliah Baru</h1>
    <form method="post">
        <label>Kode Mata Kuliah: <input type="text" name="kd_mk" required></label>
        <label>Nama Mata Kuliah: <input type="text" name="nama" required></label>
        <label>Jumlah SKS: <input type="number" name="sks" min="1" max="6" required></label>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>