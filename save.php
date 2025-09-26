<?php
// Database connection
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "userdb";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- Delete User ---
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM users WHERE id=$id");
    header("Location: manage_users.php");
    exit();
}

// --- Save Update ---
if (isset($_POST['save_update'])) {
    $id       = intval($_POST['id']);
    $username = $_POST['username'];
    $email    = $_POST['email'];

    $sql = "UPDATE users SET username='$username', email='$email' WHERE id=$id";
    if ($conn->query($sql)) {
        echo "<script>alert('✅ User updated successfully!');window.location='manage_users.php';</script>";
    } else {
        echo "<script>alert('❌ Update failed!');</script>";
    }
}

// --- If update clicked, fetch user data ---
$editUser = null;
if (isset($_GET['update'])) {
    $id = intval($_GET['update']);
    $res = $conn->query("SELECT * FROM users WHERE id=$id");
    $editUser = $res->fetch_assoc();
}

// --- Fetch All Users ---
$result = $conn->query("SELECT * FROM users ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Users</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f4f4f9; padding: 40px; }
    h2 { text-align: center; margin-bottom: 20px; }
    table {
      width: 95%; margin: auto; border-collapse: collapse; background: #fff;
      box-shadow: 0px 4px 12px rgba(0,0,0,0.1); border-radius: 10px; overflow: hidden;
    }
    th, td { padding: 12px 15px; text-align: center; border-bottom: 1px solid #ddd; }
    th { background: #007bff; color: #fff; }
    tr:hover { background: #f1f1f1; }
    .btn {
      padding: 6px 12px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      color: #fff;
      text-decoration: none;
      margin: 2px;
      display: inline-block;
    }
    .update { background: #28a745; }
    .update:hover { background: #218838; }
    .delete { background: #dc3545; }
    .delete:hover { background: #c82333; }
    .center { text-align: center; margin-top: 20px; }
    a.back {
      display: inline-block; padding: 10px 20px; background: #007bff; color: #fff;
      border-radius: 6px; text-decoration: none;
    }
    a.back:hover { background: #0056b3; }
    .edit-box {
      width: 400px; margin: 30px auto; background: #fff; padding: 20px;
      border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .edit-box h3 { margin-bottom: 15px; text-align: center; }
    .edit-box input {
      width: 100%; padding: 10px; margin: 8px 0;
      border: 1px solid #ccc; border-radius: 6px;
    }
    .save { background: #28a745; width: 100%; }
    .save:hover { background: #218838; }
  </style>
</head>
<body>
  <h2>Manage Registered Users</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Email</th>
      <th>Password (Hash)</th>
      <th>Created At</th>
      <th>Action</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['password']}</td>
                    <td>{$row['created_at']}</td>
                    <td>
                      <a href='manage_users.php?update={$row['id']}' class='btn update'>Update</a>
                      <a href='manage_users.php?delete={$row['id']}' class='btn delete' onclick=\"return confirm('Are you sure?');\">Delete</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No users found</td></tr>";
    }
    ?>
  </table>

  <?php if ($editUser): ?>
  <div class="edit-box">
    <h3>Edit User ID: <?php echo $editUser['id']; ?></h3>
    <form method="post">
      <input type="hidden" name="id" value="<?php echo $editUser['id']; ?>">
      <input type="text" name="username" value="<?php echo $editUser['username']; ?>" required>
      <input type="email" name="email" value="<?php echo $editUser['email']; ?>" required>
      <button type="submit" name="save_update" class="btn save">Save Changes</button>
    </form>
  </div>
  <?php endif; ?>

  <div class="center">
    <a href="index.html" class="back">Back to Home</a>
  </div>
</body>
</html>
<?php $conn->close(); ?>
