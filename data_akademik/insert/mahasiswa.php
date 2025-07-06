<?php
include '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $no_hp = $_POST['no_hp'];
    $jalan = $_POST['jalan'];
    $kota = $_POST['kota'];
    $kodepos = $_POST['kodepos'];
    $kd_ds = $_POST['kd_ds'];
    $alamat = $jalan . ', ' . $kota; // buat alamat

$sql = "INSERT INTO Mahasiswa (nim, nama, jenis_kelamin, tgl_lahir, no_hp, alamat, jalan, kota, kodepos, kd_ds)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssss", $nim, $nama, $jenis_kelamin, $tgl_lahir, $no_hp, $alamat, $jalan, $kota, $kodepos, $kd_ds);
    
    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Ambil data dosen untuk dropdown
$dosen = $conn->query("SELECT kd_ds, nama FROM Dosen");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Tambah Mahasiswa Baru</h1>
    <form method="post">
        <label>NIM: <input type="text" name="nim" required></label>
        <label>Nama: <input type="text" name="nama" required></label>
        <label>Jenis Kelamin: 
            <select name="jenis_kelamin" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </label>
        <label>Tanggal Lahir: <input type="date" name="tgl_lahir" required></label>
        <label>No HP: <input type="text" name="no_hp" required></label>
        <label>Jalan: <input type="text" name="jalan" required></label>
        <label>Kota: <input type="text" name="kota" required></label>
        <label>Kode Pos: <input type="text" name="kodepos" required></label>
        <label>Dosen Wali: 
            <select name="kd_ds" required>
                <?php while($row = $dosen->fetch_assoc()): ?>
                    <option value="<?= $row['kd_ds'] ?>"><?= $row['nama'] ?></option>
                <?php endwhile; ?>
            </select>
        </label>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>