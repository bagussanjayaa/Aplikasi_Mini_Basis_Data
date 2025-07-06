<?php
include '../includes/db_connect.php';

$mahasiswa = $conn->query("SELECT nim, nama FROM Mahasiswa");
$dosen = $conn->query("SELECT kd_ds, nama FROM Dosen");
$matakuliah = $conn->query("SELECT kd_mk, nama FROM Matakuliah");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $kd_ds = $_POST['kd_ds'];
    $kd_mk = $_POST['kd_mk'];
    $semester = $_POST['semester'];
    $nilai = $_POST['nilai'];
    
    $sql = "INSERT INTO KRSMahasiswa (nim, kd_ds, kd_mk, semester, nilai) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssis", $nim, $kd_ds, $kd_mk, $semester, $nilai);
    
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
    <title>Tambah KRS Mahasiswa</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Tambah KRS Mahasiswa</h1>
    <form method="post">
        <label>Mahasiswa: 
            <select name="nim" required>
                <?php while($row = $mahasiswa->fetch_assoc()): ?>
                    <option value="<?= $row['nim'] ?>"><?= $row['nim'] ?> - <?= $row['nama'] ?></option>
                <?php endwhile; ?>
            </select>
        </label>
        <label>Dosen Pengampu: 
            <select name="kd_ds" required>
                <?php while($row = $dosen->fetch_assoc()): ?>
                    <option value="<?= $row['kd_ds'] ?>"><?= $row['nama'] ?></option>
                <?php endwhile; ?>
            </select>
        </label>
        <label>Mata Kuliah: 
            <select name="kd_mk" required>
                <?php while($row = $matakuliah->fetch_assoc()): ?>
                    <option value="<?= $row['kd_mk'] ?>"><?= $row['kd_mk'] ?> - <?= $row['nama'] ?></option>
                <?php endwhile; ?>
            </select>
        </label>
        <label>Semester: <input type="number" name="semester" min="1" max="8" required></label>
        <label>Nilai (opsional): 
            <select name="nilai">
                <option value="">Belum dinilai</option>
                <option value="A">A</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B">B</option>
                <option value="B-">B-</option>
                <option value="C+">C+</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select>
        </label>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>