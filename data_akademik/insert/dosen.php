<?php
include '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kd_ds = $_POST['kd_ds'];
    $nama = $_POST['nama'];
    
    $sql = "INSERT INTO Dosen (kd_ds, nama) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $kd_ds, $nama);
    
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
    <title>Tambah Dosen</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Tambah Dosen Baru</h1>
    <form method="post">
        <label>Kode Dosen: <input type="text" name="kd_ds" required></label>
        <label>Nama Lengkap (dengan gelar): <input type="text" name="nama" required></label>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>