<?php
session_start();

// Database connection
$servername = "sql210.infinityfree.com";
$username   = "if0_39990522";  // default XAMPP username
$password   = "jHGgAXV4TEouCb";      // default XAMPP password
$database   = "if0_39990522_db";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Reusable styled message box
function showMessage($status, $title, $message, $btnText = null, $btnLink = null) {
    $color = ($status === "success") ? "#28a745" : "#dc3545";
    $symbol = ($status === "success") ? "✔" : "✖";

    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
      <meta charset='UTF-8'>
      <title>$title</title>
      <style>
        body {
          font-family: 'Poppins', sans-serif;
          background: #f0f2f5;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
          margin: 0;
        }
        .box {
          text-align: center;
          background: #fff;
          padding: 40px;
          border-radius: 12px;
          box-shadow: 0 6px 15px rgba(0,0,0,0.1);
          width: 380px;
          animation: fadeIn 0.5s ease-in-out;
        }
        .circle {
          width: 90px;
          height: 90px;
          margin: 0 auto 20px;
          border-radius: 50%;
          background: $color;
          display: flex;
          justify-content: center;
          align-items: center;
          animation: popIn 0.5s ease-in-out;
        }
        .circle span {
          font-size: 45px;
          color: #fff;
        }
        h2 {
          margin: 10px 0;
          color: #333;
        }
        p {
          color: #666;
          margin-bottom: 20px;
        }
        a {
          display: inline-block;
          text-decoration: none;
          background: $color;
          color: #fff;
          padding: 12px 20px;
          border-radius: 8px;
          font-size: 16px;
          transition: background 0.3s ease;
        }
        a:hover {
          opacity: 0.9;
        }
        @keyframes popIn {
          from { transform: scale(0.5); opacity: 0; }
          to { transform: scale(1); opacity: 1; }
        }
        @keyframes fadeIn {
          from { opacity: 0; }
          to { opacity: 1; }
        }
      </style>
    </head>
    <body>
      <div class='box'>
        <div class='circle'><span>$symbol</span></div>
        <h2>$title</h2>
        <p>$message</p>";
        if ($btnText && $btnLink) {
            echo "<a href='$btnLink'>$btnText</a>";
        }
    echo "</div></body></html>";
}

// REGISTER
if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    // check duplicate username or email
    $check = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $check->bind_param("ss", $username, $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        showMessage("error", "Registration Failed", "Username or Email already exists.", "Try Again", "index.html");
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $hashedPassword);

        if ($stmt->execute()) {
            showMessage("success", "Registration Successful", "Welcome, $username", "Go to Dashboard", "deshboard.php");
        } else {
            showMessage("error", "Registration Failed", $stmt->error, "Try Again", "index.html");
        }
        $stmt->close();
    }
    $check->close();
}

// LOGIN
if (isset($_POST['login'])) {
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT id, username, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id']   = $id;
            $_SESSION['username']  = $username;
            showMessage("success", "Login Successful", "Welcome, $username", "Go to Dashboard", "deshboard.php");
        } else {
            showMessage("error", "Login Failed", "Invalid password.", "Try Again", "index.html");
        }
    } else {
        showMessage("error", "Login Failed", "No account found with that email.", "Try Again", "index.html");
    }

    $stmt->close();
}

$conn->close();
?>
