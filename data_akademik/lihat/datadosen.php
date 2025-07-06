<?php
// Koneksi ke database
include '../includes/db_connect.php';
include '../includes/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosen</title>
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
        <h1>Data Dosen</h1>
        <a href="../insert/dosen.php" class="btn">Tambah Dosen</a>
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Pendek</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM Dosen";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$row['kd_ds']."</td>
                        <td>".$row['nama']."</td>
                        <td>".format_nama_dosen($row['nama'])."</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>