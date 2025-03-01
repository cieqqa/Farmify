<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>

    <style>
        body {
            font-family: "Familjen Grotesk", sans-serif;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #1a1a1a;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        a {
            text-decoration: none;
            color: blue;
            font-weight: bold;
            margin-right: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
        .container {
            text-align: center;
            margin-top: 20px;
        }
    </style>

</head>
<body>
    <div class="container">
    <h2>Daftar User</h2>
    <a href="add.php">Tambah Data</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Password</th>
            <th>No. HP</th>
            <th>Alamat</th>
            <th>Tipe User</th>
            <th>Aksi</th>
        </tr>
        <?php
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_user']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['kata_sandi']}</td>
                        <td>{$row['no_hp']}</td>
                        <td>{$row['alamat']}</td>
                        <td>{$row['tipe_user']}</td>
                        <td>
                            <a href='editt.php?id={$row['id_user']}'>Edit</a>
                            <a href='delete.php?id={$row['id_user']}' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='4'> Tidak ada data</td></tr>";
        }
        ?>
    </table>
    </div>
</body>
</html>