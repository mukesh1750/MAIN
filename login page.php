<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login & Register</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    body {
      font-family: 'Poppins', sans-serif;
      background: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
      width: 350px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    input {
      width: 90%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      outline: none;
      font-size: 14px;
      transition: border 0.3s ease;
    }

    input:focus {
      border: 1px solid #007BFF;
    }

    button {
      width: 100%;
      padding: 12px;
      margin-top: 15px;
      border: none;
      border-radius: 8px;
      background: #007BFF;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background: #0056b3;
    }

    .toggle-link {
      display: block;
      text-align: center;
      margin-top: 15px;
      color: #007BFF;
      cursor: pointer;
      font-size: 14px;
    }

    .hidden {
      display: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Login Form (default) -->
    <div id="loginForm">
      <h2>Login</h2>
      <form action="auth.php" method="POST" onsubmit="return validateLogin()">
        <input type="email" name="email" id="loginEmail" placeholder="Email" required>
        <input type="password" name="password" id="loginPassword" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
      </form>
      <span class="toggle-link" onclick="showRegister()">Don't have an account? Register</span>
    </div>

    <!-- Register Form (hidden first) -->
    <div id="registerForm" class="hidden">
      <h2>Register</h2>
      <form action="auth.php" method="POST" onsubmit="return validateRegister()">
        <input type="text" name="username" id="regUsername" placeholder="Username" required>
        <input type="email" name="email" id="regEmail" placeholder="Email" required>
        <input type="password" name="password" id="regPassword" placeholder="Password" required>
        <button type="submit" name="register">Register</button>
      </form>
      <span class="toggle-link" onclick="showLogin()">Already have an account? Login</span>
    </div>
  </div>

  <script>
    // Toggle Forms
    function showLogin() {
      document.getElementById("registerForm").classList.add("hidden");
      document.getElementById("loginForm").classList.remove("hidden");
    }

    function showRegister() {
      document.getElementById("loginForm").classList.add("hidden");
      document.getElementById("registerForm").classList.remove("hidden");
    }

    // Form Validation
    function validateRegister() {
      let username = document.getElementById("regUsername").value.trim();
      let email = document.getElementById("regEmail").value.trim();
      let password = document.getElementById("regPassword").value.trim();

      if (username.length < 3) {
        alert("Username must be at least 3 characters long.");
        return false;
      }
      if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
      }
      return true;
    }

    function validateLogin() {
      let email = document.getElementById("loginEmail").value.trim();
      let password = document.getElementById("loginPassword").value.trim();

      if (email === "" || password === "") {
        alert("Please fill in all fields.");
        return false;
      }
      return true;
    }
  </script>
</body>
</html>
