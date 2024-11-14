<!-- login.php -->
<?php
session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Username dan password statis sebagai contoh
    if ($username === 'admin' && $password === 'password') {
        $_SESSION['username'] = $username;
        header('Location: index.php');
    } else {
        echo "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AMIKOM Yogyakarta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('1.jpg'); /* Ganti dengan path gambar Anda */
            background-size: cover; /* Menutupi seluruh area */
            background-position: center; /* Memusatkan gambar */
            background-repeat: no-repeat; /* Tidak mengulang gambar */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
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

<div class="login-container">
    <h1>Login</h1>
    <form action="" method="POST">
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit" name="submit">Login</button>
    </form>
</div>

</body>
</html>
