<!-- tambah.php -->
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$conn = new mysqli("localhost", "root", "", "perkuliahan_4983");

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_mahasiswa'];
    $matkul = $_POST['mata_kuliah'];
    $nilai = $_POST['nilai'];

    $sql = "INSERT INTO nilai (nama_mahasiswa, mata_kuliah, nilai) VALUES ('$nama', '$matkul', '$nilai')";
    $conn->query($sql);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Nilai - AMIKOM Yogyakarta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            width: 300px;
        }
        h1 {
            text-align: center;
            color: #003b5c;
        }
        label {
            display: block;
            margin: 8px 0 4px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background: #003b5c;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background: #005f8f;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Tambah Nilai</h1>
    <form action="" method="POST">
        <label>Nama Mahasiswa:</label>
        <input type="text" name="nama_mahasiswa" required>
        <label>Mata Kuliah:</label>
        <input type="text" name="mata_kuliah" required>
        <label>Nilai:</label>
        <input type="number" name="nilai" required>
        <button type="submit" name="submit">Simpan</button>
    </form>
</div>

</body>
</html>