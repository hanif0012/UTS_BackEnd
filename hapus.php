<!-- hapus.php -->
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$conn = new mysqli("localhost", "root", "", "perkuliahan_4983");
$id = $_GET['id'];

$sql = "DELETE FROM nilai WHERE id = $id";
$conn->query($sql);

header('Location: index.php');
?>
