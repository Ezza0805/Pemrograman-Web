<?php
$envFile = __DIR__ . '/../.env';

if (!file_exists($envFile)) {
    die("File .env tidak ditemukan");
}

$env = parse_ini_file($envFile);

$host = $env['DB_HOST'];
$dbname = $env['DB_NAME'];
$username = $env['DB_USER'];
$password = $env['DB_PASS'];

try {
    $pdo = new PDO(
        "mysql::host=$host; dbname=$dbname; charset=utf8mb4",
        $username,
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}  catch (PDOException $e) {
    die("Koneksi gagal ke database" . $e->getMessage());
}