<?php
    require "../koneksi.php";  

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // cek dulu apakah nik telah terdaftar
        $sql = "SELECT * FROM petugas WHERE username=?";
        $cek = $koneksi->execute_query($sql, [$username, $password]);

        if (mysqli_num_rows($cek) == 1) {
            echo "<script>alert('USERNAME sudah digunakan!') </script>";
        } else {
            $nama_petugas = $_POST['nama_petugas'];
            $telepon = $_POST['telepon'];
            $username = $_POST['username'];
            $level = $_POST['level'];
            $password = md5($_POST['password']);
            $sql = "INSERT INTO petugas SET nama_petugas=?,  telp=?, username=?, password=?, level=?";
            $koneksi->execute_query($sql, [$nama_petugas, $telepon, $username, $password, $level]);
            echo "<script>alert('Pendaftaran berhasil!')</script>";
            header("location:index1.php");
        }
    }
    ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Registrasi</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <h1>Registrasi Petugas</h1>
        <form action="" method="post">
            <div class="form-item">
                <label for="name">Nama Petugas</label>
                <input type="text" name="nama_petugas" id="nama_petugas">
            <div>
            <div class="form-item">
                <label for="username">Username</label>
                <input type="text" name="username" id="Username">
            </div>
            <div class="form-item">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-item">
                <label for="telepon">Telepon</label>
                <input type="tel" name="telepon" id="telepon">
            </div>
            <div class="form-item">
            <label>Level Petugas</label>
            <select name="level" class="form-control" required>
                <option value=""> Pilih Level Petugas </option>
                <option value="admin"> Admin </option>
                <option value="petugas"> Petugas </option>
            </select>
            </div>
            <button type="submit">Register</button>
        </form>
        <a href="index1.php">Batal</a>
    </body>
    </html>