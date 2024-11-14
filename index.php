<!-- index.php -->
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$conn = new mysqli("localhost", "root", "", "perkuliahan_4983");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM nilai";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AMIKOM Yogyakarta</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background: #003b5c;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        .sidebar {
            width: 200px;
            background: #004d7f;
            color: white;
            position: fixed;
            height: 100%;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 10px;
            text-decoration: none;
            color: white;
            display: block;
        }
        .sidebar a:hover {
            background: #005f8f;
        }
        .main {
            margin-left: 220px;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<header>
    <h1>Dashboard Data Nilai</h1>
</header>

<div class="sidebar">
    <h2>Menu</h2>
    <a href="index.php">Dashboard</a>
    <a href="tambah.php">Tambah Nilai</a>
    <a href="logout.php">Logout</a>
</div>

<div class="main">
    <h2>Data Nilai Perkuliahan</h2>
    <table>
        <tr>
            <th>Nama Mahasiswa</th>
            <th>Mata Kuliah</th>
            <th>Nilai</th>
            <th>Aksi</th>
        </tr>
        <!-- Data akan diisi dengan PHP -->
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['nama_mahasiswa']; ?></td>
                <td><?php echo $row['mata_kuliah']; ?></td>
                <td><?php echo $row['nilai']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                    <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
