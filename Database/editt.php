<?php
include 'config.php'; // Pastikan file koneksi database sudah benar

// Cek apakah ada ID yang dikirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Debug: Cek apakah ID yang diterima benar
    "<p>DEBUG: ID yang diterima = $id</p>";

    // 🔹 Cek apakah form disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // 🔹 Ambil data dari form dengan validasi
    $ID = isset($_POST['id_user']) ? $_POST['id_user'] : '';
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pass = isset($_POST['kata_sandi']) ? $_POST['kata_sandi'] : '';
    $NO_HP = isset($_POST['no_hp']) ? $_POST['no_hp'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    $tipe = isset($_POST['tipe_user']) ? $_POST['tipe_user'] : '';

    // 🔹 Periksa apakah semua variabel ada sebelum update
    if (!empty($nama) && !empty($email) && !empty($pass) && !empty($NO_HP) && !empty($alamat) && !empty($tipe)) {
        // 🔹 Query UPDATE
        $sql = "UPDATE users SET 
                    nama = '$nama', 
                    email = '$email', 
                    kata_sandi = '$pass', 
                    no_hp = '$NO_HP', 
                    alamat = '$alamat', 
                    tipe_user = '$tipe' 
                WHERE id_user = '$id'";

        // 🔹 Jalankan query
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Data berhasil diperbarui!'); window.location.href='index.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: Ada data yang kosong. Pastikan semua field terisi!";
    }
}


    // Query untuk mengambil data user berdasarkan ID
    $sql = "SELECT * FROM users WHERE id_user = '$id'";
    $result = mysqli_query($conn, $sql);

    // Debug: Cek apakah query berhasil
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    // Debug: Cek apakah ada data yang ditemukan
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        die("Error: Data pengguna tidak ditemukan di database!");
    }
} else {
    die("Error: ID tidak valid atau tidak diberikan!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
            background-color: #f5f5f5;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            background: white;
            padding: 30px;
            margin: 50px auto;
            width: 40%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            display: block;
            text-align: left;
            width: 80%;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input {
            width: 80%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            background: blue;
            color: white;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            padding: 12px;
            border: none;
            border-radius: 5px;
            width: 85%;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background: darkblue;
        }
        a {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            color: red;
            font-weight: bold;
        }
        a:hover {
            color: darkred;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Pengguna</h2>
        <form method="post">
            <input type="hidden" name="id_user" value="<?php echo isset($row['id_user']) ? htmlspecialchars($row['id_user']) : ''; ?>">
            
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo isset($row['nama']) ? htmlspecialchars($row['nama']) : ''; ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($row['email']) ? htmlspecialchars($row['email']) : ''; ?>" required>
            
            <label for="kata_sandi">Password:</label>
            <input type="password" id="kata_sandi" name="kata_sandi" value="<?php echo isset($row['kata_sandi']) ? htmlspecialchars($row['kata_sandi']) : ''; ?>" required>
            
            <label for="no_hp">No. HP:</label>
            <input type="text" id="no_hp" name="no_hp" value="<?php echo isset($row['no_hp']) ? htmlspecialchars($row['no_hp']) : ''; ?>" required>
            
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" value="<?php echo isset($row['alamat']) ? htmlspecialchars($row['alamat']) : ''; ?>" required>
            
            <label for="tipe_user">Tipe User:</label>
            <input type="text" id="tipe_user" name="tipe_user" value="<?php echo isset($row['tipe_user']) ? htmlspecialchars($row['tipe_user']) : ''; ?>" required>
            
            <input type="submit" value="Update">
        </form>
        <a href="index.php">Kembali</a>
    </div>
</body>
</html>
