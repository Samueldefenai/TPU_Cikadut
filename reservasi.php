<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];

    $sql = "INSERT INTO reservasi (nama, tanggal) VALUES ('$nama', '$tanggal')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='container'><div class='alert alert-success mt-4'>Reservasi berhasil disimpan!</div></div>";
    } else {
        echo "<div class='container'><div class='alert alert-danger mt-4'>Error: " . $sql . "<br>" . $conn->error . "</div></div>";
    }

    $conn->close();
}
?>
