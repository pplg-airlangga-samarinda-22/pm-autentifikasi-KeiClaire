<?php
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nik = $_POST['nik'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    $sql = "SELECT*FROM masyarakat WHERE nik = ? AND username = ? AND password = ?";
    $row = $koneksi -> execute_query($sql, [$nik, $username, $password]);
    
    if (mysqli_num_rows($row) ==  1) {
        session_start();
        $_SESSION['nik'] = $nik;
        header("location:index.php");
    } else {
        echo"<script>alert('Gagal Login!')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action=""method="post" class="form-login">
    <p>Silahkan Login</p>
    <div class="form-item">
        <label for="nik">Nik</label>
        <input type="text"name="nik" id="nik" required>
    </div>
    <div class="form-item">
        <label for="username">Username</label>
        <input type="text"name="username" id="username" required>
    </div>
    <div class="form-item">
        <label for="password">Password</label>
        <input type="password"name="password" id="password" required>
    </div>
    <button type="submit">Login</button>
    <a href="register.php">register</a>
    <a href="admin/index.php"> | login sebagai petugas</a>
    </form>
</body>
</html>