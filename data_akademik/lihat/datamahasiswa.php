<?php
include '../includes/db_connect.php';
include '../includes/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
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
        <h1>Data Mahasiswa</h1>
        <a href="../insert/mahasiswa.php" class="btn">Tambah Mahasiswa</a>
        <table>
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Usia</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Dosen Wali</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT m.*, d.nama AS nama_dosen FROM Mahasiswa m LEFT JOIN Dosen d ON m.kd_ds = d.kd_ds";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$row['nim']."</td>
                        <td>".$row['nama']."</td>
                        <td>".($row['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan')."</td>
                        <td>".date('d M Y', strtotime($row['tgl_lahir']))."</td>
                        <td>".hitung_usia($row['tgl_lahir'])." tahun</td>
                        <td>".$row['no_hp']."</td>
                        <td>".$row['jalan'].", ".$row['kota']."</td>
                        <td>".format_nama_dosen($row['nama_dosen'])."</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>