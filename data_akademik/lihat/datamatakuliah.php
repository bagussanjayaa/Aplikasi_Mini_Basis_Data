<?php
include '../includes/db_connect.php';
include '../includes/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matakuliah</title>
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
        <h1>Data Matakuliah</h1>
        <a href="../insert/matakuliah.php" class="btn">Tambah Matakuliah</a>
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Matakuliah</th>
                    <th>SKS</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT *, IF(sks > 2, 'Wajib', 'Pilihan') AS status FROM Matakuliah";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$row['kd_mk']."</td>
                        <td>".strtoupper($row['nama'])."</td>
                        <td>".$row['sks']."</td>
                        <td>".$row['status']."</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>