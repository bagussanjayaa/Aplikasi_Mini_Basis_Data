<?php
include '../includes/db_connect.php';

$dosen = $conn->query("SELECT kd_ds, nama FROM Dosen");
$matakuliah = $conn->query("SELECT kd_mk, nama FROM Matakuliah"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kd_ds = $_POST['kd_ds'];
    $kd_mk = $_POST['kd_mk'];
    $hari = $_POST['hari'];
    $jam = $_POST['jam'];
    $ruang = $_POST['ruang'];
    
    $sql = "INSERT INTO JadwalMengajar (kd_ds, kd_mk, hari, jam, ruang) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $kd_ds, $kd_mk, $hari, $jam, $ruang);
    
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
    <title>Tambah Jadwal Mengajar</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Tambah Jadwal Mengajar</h1>
    <form method="post">
        <label>Dosen: 
            <select name="kd_ds" required>
                <?php while($row = $dosen->fetch_assoc()): ?>
                    <option value="<?= $row['kd_ds'] ?>"><?= $row['nama'] ?></option>
                <?php endwhile; ?>
            </select>
        </label>
        <label>Mata Kuliah: 
            <select name="kd_mk" required>
                <?php while($row = $matakuliah->fetch_assoc()): ?>
                    <option value="<?= $row['kd_mk'] ?>"><?= $row['nama'] ?></option>
                <?php endwhile; ?>
            </select>
        </label>
        <label>Hari: 
            <select name="hari" required>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
            </select>
        </label>
        <label>Jam: <input type="time" name="jam" required></label>
        <label>Ruang: <input type="text" name="ruang" required></label>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>