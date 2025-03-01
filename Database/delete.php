<?php
include 'config.php';

if (isset($_GET['id'])) {
    $ID = $_GET['id'];
    $sql = "DELETE FROM users WHERE id_user=$ID";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>