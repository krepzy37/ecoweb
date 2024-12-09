<?php
$host = 'localhost';
$dbname = 'balazs';
$user = 'balazs';
$pass = 'Jeges37Tea!Polo'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Adatbázis-kapcsolat sikertelen: " . $e->getMessage());
}

