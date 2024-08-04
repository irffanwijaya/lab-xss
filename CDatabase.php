<?php

$server = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($server, $username, $password);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS xss_lab";
if ($conn->query($sql) === TRUE) {
    echo "Database Berhasil dibuat.<br>";
} else {
    echo "Gagal buat database: " . $conn->error . "<br>";
}

$conn->select_db("xss_lab");

$sql = "CREATE TABLE IF NOT EXISTS comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    comment TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'comments' Berhasil dibuat.<br>";
} else {
    echo "Gagal buat table: " . $conn->error . "<br>";
}

$conn->close();
?>
