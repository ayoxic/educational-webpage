<?php
$host = '127.0.0.1';
$port = '3307';
$dbname = 'insea_site';
$username = 'ayoub';   // ✅ IMPORTANT
$password = 'ayoubjn123';         // ✅ IMPORTANT

try {
    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );
} catch (PDOException $e) {
    die('Erreur de connexion a la base de donnees : ' . $e->getMessage());
}
?>