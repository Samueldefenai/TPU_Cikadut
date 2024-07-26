<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.html");
    } else {
        echo "<div class='container'><div class='alert alert-danger mt-4'>Login gagal. Username atau password salah.</div></div>";
    }

    $conn->close();
}
?>
