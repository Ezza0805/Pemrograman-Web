<?php

$host = "localhost";
$dbname = "wesitecuy";
$username = "root";
$password = "";

try {
    $pdo = new PDO(
        "mysql::host=$host; dbname=$dbname; charset=utf8mb4",
        $username,
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}  catch (PDOException $e) {
    die("Koneksi gagal ke database" . $e->getMessage());
}