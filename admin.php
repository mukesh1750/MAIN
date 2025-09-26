<?php
session_start();

// Hardcoded admin credentials
$admin_username = "admin";
$admin_password = "admin123"; // change this

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin'] = $username;
        header("Location: save.php");
        exit();
    } else {
        $error = "Invalid Admin Credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f5f5f5; display:flex; justify-content:center; align-items:center; height:100vh; }
        .login-box { background:#fff; padding:20px; border-radius:10px; box-shadow:0px 0px 10px rgba(0,0,0,0.2); width:300px; }
        .login-box h2 { text-align:center; }
        .login-box input { width:92%; padding:10px; margin:10px 0; border:1px solid #ccc; border-radius:5px; }
        .login-box button { width:100%; padding:10px; background:#007bff; color:white; border:none; border-radius:5px; cursor:pointer; }
        .error { color:red; text-align:center; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Admin Login</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Admin Username" required>
            <input type="password" name="password" placeholder="Admin Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
