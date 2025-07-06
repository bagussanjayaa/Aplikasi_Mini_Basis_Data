<?php
include '../includes/db_connect.php';
include '../includes/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Mengajar</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .data-section {
            margin: 20px 0;
            padding: 15px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #2c3e50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn {
            display: inline-block;
            padding: 8px 15px;
            background: #1abc9c;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .btn:hover {
            background: #16a085;
        }
    </style>
</head>
<body>
    <div class="data-section">
        <h1>Jadwal Mengajar</h1>
        <a href="../insert/jadwal.php" class="btn">Tambah Jadwal</a>
        <table>
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Ruang</th>
                    <th>Matakuliah</th>
                    <th>Dosen</th>
                    <th>SKS</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                $sql = "SELECT j.*, m.nama AS matakuliah, m.sks, d.nama AS dosen 
                        FROM JadwalMengajar j
                        JOIN Matakuliah m ON j.kd_mk = m.kd_mk
                        JOIN Dosen d ON j.kd_ds = d.kd_ds
                        ORDER BY FIELD(j.hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'), j.jam";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$row['hari']."</td>
                        <td>".$row['jam']."</td>
                        <td>".$row['ruang']."</td>
                        <td>".$row['matakuliah']."</td>
                        <td>".$row['dosen']."</td>
                        <td>".$row['sks']."</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>