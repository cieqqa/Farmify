<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST['ID'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $NO_HP = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $tipe = $_POST['tipe_user'];

    $sql = "INSERT INTO users (nama, email, kata_sandi, no_hp, alamat, tipe_user) VALUES (  '$nama', '$email', '$pass', '$NO_HP', '$alamat', '$tipe');";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan!";
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Tambahkan $sql untuk debugging
    }
}    
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <link href="https://fonts.googleapis.com/css2?family=Familjen+Grotesk:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Familjen Grotesk", sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-submit {
            width: 100%;
            padding: 10px;
            background: green;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background: darkgreen;
        }

        .btn-back {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            color: red;
            font-weight: bold;
        }

        .btn-back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Tambah Pengguna</h2>
    <form method="post">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" name="no_hp" id="no_hp" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" required>
        </div>
        <div class="form-group">
            <label for="tipe_user">Tipe User</label>
            <input type="text" name="tipe_user" id="tipe_user" required>
        </div>
        <input type="submit" value="Simpan" class="btn-submit">
    </form>
    <a href="index.php" class="btn-back">Kembali</a>
</div>

</body>
</html>


