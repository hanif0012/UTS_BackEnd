<!-- edit.php -->
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$conn = new mysqli("localhost", "root", "", "perkuliahan_4983");
$id = $_GET['id'];
$sql = "SELECT * FROM nilai WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_mahasiswa'];
    $matkul = $_POST['mata_kuliah'];
    $nilai = $_POST['nilai'];

    $sql = "UPDATE nilai SET nama_mahasiswa = '$nama', mata_kuliah = '$matkul', nilai = '$nilai' WHERE id = $id";
    $conn->query($sql);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Nilai</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { max-width: 300px; margin: auto; }
        label { display: block; margin: 8px 0 4px; }
        input { width 100%; padding: 8px; margin-bottom: 10px; }
        button { padding: 10px; }
    </style>
</head>
<body>
    <h1>Edit Nilai</h1>
    <form action="" method="POST">
        <label>Nama Mahasiswa:</label>
        <input type="text" name="nama_mahasiswa" value="<?php echo $row['nama_mahasiswa']; ?>" required><br>
        <label>Mata Kuliah:</label>
        <input type="text" name="mata_kuliah" value="<?php echo $row['mata_kuliah']; ?>" required><br>
        <label>Nilai:</label>
        <input type="number" name="nilai" value="<?php echo $row['nilai']; ?>" required><br>
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
