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
    <title>Login - Dashboard Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-purple-600 text-center mb-4">Login</h1>
        <form method="POST" action="login.php">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
                <input type="text" id="username" name="username" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                <input type="password" id="password" name="password" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" name="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Masuk
                </button>
            </div>
            <?php if (isset($error)): ?>
                <p class="text-red-500 text-xs italic mt-2"><?php echo $error; ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
