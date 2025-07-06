<?php
include '../includes/db_connect.php';
include '../includes/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KRS Mahasiswa</title>
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
        <h1>Kartu Rencana Studi (KRS)</h1>
        <a href="../insert/krs.php" class="btn">Tambah KRS</a>
        <table>
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Mahasiswa</th>
                    <th>Semester</th>
                    <th>Matakuliah</th>
                    <th>Dosen</th>
                    <th>Nilai</th>
                    <th>Predikat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT k.*, 
                        m.nama AS mahasiswa, 
                        mk.nama AS matakuliah, 
                        d.nama AS dosen,
                        CASE 
                            WHEN k.nilai = 'A' THEN 'Sangat Baik'
                            WHEN k.nilai = 'A-' THEN 'Baik Sekali'
                            WHEN k.nilai = 'B+' THEN 'Baik'
                            WHEN k.nilai = 'B' THEN 'Cukup Baik'
                            WHEN k.nilai = 'C' THEN 'Cukup'
                            ELSE '-'
                        END AS predikat
                        FROM KRSMahasiswa k
                        JOIN Mahasiswa m ON k.nim = m.nim
                        JOIN Matakuliah mk ON k.kd_mk = mk.kd_mk
                        JOIN Dosen d ON k.kd_ds = d.kd_ds
                        ORDER BY m.nama, k.semester";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$row['nim']."</td>
                        <td>".$row['mahasiswa']."</td>
                        <td>".$row['semester']."</td>
                        <td>".$row['matakuliah']."</td>
                        <td>".$row['dosen']."</td>
                        <td>".($row['nilai'] ?? 'Belum ada')."</td>
                        <td>".$row['predikat']."</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>