<?php
session_start();

require_once '../database.php';

if (isset($_POST['admin_login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $selectQuery = $connection->prepare('SELECT * FROM admindb WHERE username = ?');
  $selectQuery->bind_param('s', $username);
  $selectQuery->execute();
  $result = $selectQuery->get_result();

  if ($result->num_rows > 0) {
      $row = $result->fetch_object();
      if (password_verify($password, $row->password) && $row->role == 'ADMIN') {
          $_SESSION['admin'] = $row;
          header('Location: ../admin/admindashboard.php');
          exit();
      } else {
          $_SESSION['error'] = 'Invalid username or password.';
          header('Location: admin_login.php');
          exit();
      }
  } else {
      $_SESSION['error'] = 'Username does not exist.';
      header('Location: admin_login.php');
      exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/css/admin_login.css">
</head>
<body>
    <!-- Your HTML content here -->
    <div class="center">
      <img src="../assets/images/logo.png" alt="Lagring Studio Logo" class="logo">
      <h1>Lagring Studio</h1>
      <form method="post" action="admin_login.php">
        <div class="txt_field">
          <input type="text" id = "username" name="username" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" id = "password"name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <input type="submit" id = "admin_login" name="admin_login" value="Login">
      </form>
    </div>
</body>
</html>
