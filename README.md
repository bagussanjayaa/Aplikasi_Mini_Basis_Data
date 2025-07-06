# Aplikasi_Mini_Basis_Data
# Langkah-Langkah untuk membuat Aplikasi Mini Basis Data Mahasiswa Berbasis MySQL dan PHP

1. Membuat Database-nya terlebih dahulu di xampp, Lalu buat DDL-nya

```sql
CREATE TABLE Dosen (
  kd_ds VARCHAR(10) PRIMARY KEY,
  nama VARCHAR(100)
);

CREATE TABLE Mahasiswa (
  nim VARCHAR(10) PRIMARY KEY,
  nama VARCHAR(100),
  jenis_kelamin ENUM('L', 'P'),
  tgl_lahir DATE,
  no_hp VARCHAR(15),
  alamat TEXT,
  jalan VARCHAR(100),
  kota VARCHAR(50),
  kodepos VARCHAR(10),
  kd_ds VARCHAR(10),
  FOREIGN KEY (kd_ds) REFERENCES Dosen(kd_ds)
);

CREATE TABLE Matakuliah (
  kd_mk VARCHAR(10) PRIMARY KEY,
  nama VARCHAR(100),
  sks INT
);

CREATE TABLE JadwalMengajar (
  id_jadwal INT AUTO_INCREMENT PRIMARY KEY,
  kd_ds VARCHAR(10),
  kd_mk VARCHAR(10),
  hari VARCHAR(10),
  jam VARCHAR(10),
  ruang VARCHAR(10),
  FOREIGN KEY (kd_ds) REFERENCES Dosen(kd_ds),
  FOREIGN KEY (kd_mk) REFERENCES Matakuliah(kd_mk)
);

CREATE TABLE KRSMahasiswa (
  id_krs INT AUTO_INCREMENT PRIMARY KEY,
  nim VARCHAR(10),
  kd_ds VARCHAR(10),
  kd_mk VARCHAR(10),
  semester INT,
  nilai VARCHAR(2),
  FOREIGN KEY (nim) REFERENCES Mahasiswa(nim),
  FOREIGN KEY (kd_ds) REFERENCES Dosen(kd_ds),
  FOREIGN KEY (kd_mk) REFERENCES Matakuliah(kd_mk)
);
```

2. Masukan Data-data ke dalam Masing-masing Tabel

Data Dosen:

```sql
INSERT INTO Dosen (kd_ds, nama) VALUES
('DS001', 'Aditya Saputra, S.T., M.Kom.'),
('DS002', 'Dede Kurniawan, S.T., M.Sc.'),
('DS003', 'Sintia Putri, S.T., M.Kom.'),
('DS004', 'Darmanto, S.Kom., M.Kom.'),
('DS005', 'Wulandari, S.T., M.T.I.'),
('DS006', 'Rahmat Fauzi, S.T, M.T.'),
('DS007', 'Ilham Setiawan, S.Kom., M.Kom.'),
('DS008', 'Bagus Sanjaya, S.Kom., M.Kom.');
```

Data Mahasiswa:

```sql
INSERT INTO Mahasiswa (nim, nama, jenis_kelamin, tgl_lahir, no_hp, alamat, jalan, kota, kodepos, kd_ds) VALUES
('22050101', 'Ali Maulana', 'L', '2002-01-01', '08123456701', 'Jl. Mawar 1', 'Jl. Mawar 1', 'Bandung', '40111', 'DS001'),
('22050102', 'Dina Larasati', 'P', '2001-02-02', '08123456702', 'Jl. Melati 2', 'Jl. Melati 2', 'Jakarta', '10230', 'DS001'),
('22050103', 'Rizky Ramadhan', 'L', '2002-03-03', '08123456703', 'Jl. Anggrek 3', 'Jl. Anggrek 3', 'Yogyakarta', '55281', 'DS002'),
('22050104', 'Nina Putri', 'P', '2001-04-04', '08123456704', 'Jl. Kenanga 4', 'Jl. Kenanga 4', 'Surabaya', '60292', 'DS002'),
('22050105', 'Dimas Pratama', 'L', '2002-05-05', '08123456705', 'Jl. Dahlia 5', 'Jl. Dahlia 5', 'Semarang', '50123', 'DS001'),
('22050106', 'Sarah Ayu', 'P', '2001-06-06', '08123456706', 'Jl. Teratai 6', 'Jl. Teratai 6', 'Malang', '65123', 'DS003'),
('22050107', 'Rendy Saputra', 'L', '2002-07-07', '08123456707', 'Jl. Kamboja 7', 'Jl. Kamboja 7', 'Bogor', '16111', 'DS003'),
('22050108', 'Putri Melati', 'P', '2001-08-08', '08123456708', 'Jl. Melur 8', 'Jl. Melur 8', 'Padang', '25112', 'DS004'),
('22050109', 'Fajar Nugraha', 'L', '2002-09-09', '08123456709', 'Jl. Mawar 9', 'Jl. Mawar 9', 'Medan', '20111', 'DS004'),
('22050110', 'Citra Ayuningtyas', 'P', '2001-10-10', '08123456710', 'Jl. Cempaka 10', 'Jl. Cempaka 10', 'Palembang', '30123', 'DS005'),
('22050111', 'Galih Prasetyo', 'L', '2002-11-11', '08123456711', 'Jl. Wijaya 11', 'Jl. Wijaya 11', 'Pontianak', '78121', 'DS005'),
('22050112', 'Laras Sekar', 'P', '2001-12-12', '08123456712', 'Jl. Mahoni 12', 'Jl. Mahoni 12', 'Balikpapan', '76112', 'DS006'),
('22050113', 'Andika Surya', 'L', '2002-12-01', '08123456713', 'Jl. Jati 13', 'Jl. Jati 13', 'Banjarmasin', '70123', 'DS006'),
('22050114', 'Ayu Puspita', 'P', '2001-11-01', '08123456714', 'Jl. Pinus 14', 'Jl. Pinus 14', 'Makassar', '90111', 'DS007'),
('22050115', 'Budi Hartono', 'L', '2002-10-01', '08123456715', 'Jl. Cemara 15', 'Jl. Cemara 15', 'Manado', '95123', 'DS008');
```

Data Matakuliah:

```sql
INSERT INTO Matakuliah (kd_mk, nama, sks) VALUES
('MK001', 'Basis Data', 3),
('MK002', 'Pemrograman Web', 3),
('MK003', 'Algoritma dan Struktur Data', 4),
('MK004', 'Sistem Operasi', 3),
('MK005', 'Jaringan Komputer', 3),
('MK006', 'Kecerdasan Buatan', 2),
('MK007', 'Pemrograman Mobile', 3),
('MK008', 'Interaksi Manusia dan Komputer', 2);
```

Data JadwalMengajar:

```sql
INSERT INTO JadwalMengajar (kd_ds, kd_mk, hari, jam, ruang) VALUES
('DS001', 'MK001', 'Senin', '08:00', 'R101'),
('DS002', 'MK002', 'Selasa', '10:00', 'R102'),
('DS003', 'MK003', 'Rabu', '13:00', 'R103'),
('DS004', 'MK004', 'Kamis', '09:00', 'R104'),
('DS005', 'MK005', 'Jumat', '10:00', 'R105'),
('DS006', 'MK006', 'Senin', '11:00', 'R106'),
('DS007', 'MK007', 'Rabu', '14:00', 'R107'),
('DS008', 'MK008', 'Kamis', '15:00', 'R108');
```

Data KRSMahasiswa:

```sql
INSERT INTO KRSMahasiswa (nim, kd_ds, kd_mk, semester, nilai) VALUES
('22050108', 'DS001', 'MK001', 4, 'A'),
('22050107', 'DS002', 'MK002', 4, 'A-'),
('22050106', 'DS003', 'MK003', 2, 'B+'),
('22050105', 'DS004', 'MK004', 2, 'B'),
('22050104', 'DS005', 'MK005', 3, 'A'),
('22050103', 'DS006', 'MK006', 4, 'A'),
('22050102', 'DS007', 'MK007', 3, 'B+'),
('22050101', 'DS008', 'MK008', 4, 'A');
```

3.  Buat folder baru pada file xampp->htdocs

Contoh:

data_akademik>index.php
        >css>style.css
        >includes >db_connect
                  >functions
        >lihat  >datadosen.php
                >datamahasiswa.php
                >datamatakuliah.php
                >datajadwalmengajar.php
                >datakrs.php
        >insert >dosen
                >jadwal
                >krs
                >mahasiswa
                >matakuliah

4. Isi file style.css pada folder css(menambahkan style pada tabel)

```css
/* Global Reset & Font */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    background-color: #f4f6f9;
    color: #333;
}

/* Header */
header {
    background: linear-gradient(to right, #2c3e50, #34495e);
    color: #fff;
    padding: 1.5rem 1rem;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

/* Main Container */
main {
    padding: 2rem;
    max-width: 1200px;
    margin: 0 auto;
    background-color: #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    border-radius: 10px;
}

/* Table Style */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 2rem;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0,0,0,0.05);
}

th, td {
    padding: 12px 16px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #34495e;
    color: white;
    font-weight: 600;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #eef2f7;
}

/* Buttons */
.btn, button {
    display: inline-block;
    background: #3498db;
    color: #fff;
    padding: 0.6rem 1.2rem;
    border: none;
    border-radius: 6px;
    text-decoration: none;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s ease;
}

.btn:hover, button:hover {
    background: #2980b9;
}

/* Forms */
form {
    max-width: 600px;
    margin: 2rem auto;
    background: #fff;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
}

input, select {
    width: 100%;
    padding: 0.7rem;
    margin-bottom: 1.2rem;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

input:focus, select:focus {
    border-color: #3498db;
    outline: none;
}
```

5. Isi file db_connect.php pada folder includes agar xampp terhubung

```php
<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "uas_basisdata"; // Sesuaikan dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
```

6. Isi file functions.php pada folder includes (membuat fungsi buatan sendiri)

```php
<?php
// Fungsi untuk menghitung usia
function hitung_usia($tanggal_lahir) {
    $tgl_lahir = new DateTime($tanggal_lahir);
    $sekarang = new DateTime();
    $usia = $sekarang->diff($tgl_lahir);
    return $usia->y;
}

// Fungsi untuk memformat nama dosen (tanpa gelar)
function format_nama_dosen($nama_lengkap) {
    $parts = explode(',', $nama_lengkap);
    return trim($parts[0]);
}
?>
```

7. Isi file index.php dengan code ini:(menampilkan pilihan untuk ke tabel data yang dipilih)

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Akademik</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f4f6f9;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }
        .link-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: auto;
        }
        .link-container a {
            display: block;
            padding: 12px 20px;
            margin: 10px 0;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            text-align: center;
        }
        .link-container a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>Data Akademik</h1>
    <div class="link-container">
        <a href="lihat/datamahasiswa.php">Lihat Mahasiswa</a>
        <a href="lihat/datadosen.php">Lihat Dosen</a>
        <a href="lihat/datamatakuliah.php">Lihat Matakuliah</a>
        <a href="lihat/datajadwalmengajar.php">Lihat Jadwal Mengajar</a>
        <a href="lihat/datakrs.php">Lihat KRS</a>
    </div>
</body>
</html>
```

8. Isi file datadosen.php pada folder lihat dengen ini:
```php
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
```

9. Isi file datamahasiswa.php pada folder lihat dengan ini:
<?php
// Koneksi ke database
include '../includes/db_connect.php';
include '../includes/functions.php';
?>
```php
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
```

10. Isi file datamatakuliah.php pada folder lihat dengan ini:
```php
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
```

11. Isi file datajadwalmengajar.php pada folder lihat dengan ini:
```php
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
```

12. Isi file datakrs.php pada folder lihat dengan ini:
```php 
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
```

13. Menambahkan Insert Into From HTML 

- Isi file dosen.php pada folder insert dengan code ini:

```php
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

- Isi file mahasiswa.php pada folder insert dengan code ini:

```php
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
```

- Isi file matakuliah.php pada folder insert dengan code ini:

```php
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
```

- Isi file jadwal.php pada folder insert dengan code ini:

```php 
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
```

- Isi file krs.php pada folder insert dengan code ini:

```php
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
```

## File-filenya sudah di sediakan di folder data_akademik 

### Silahkan Mencoba
