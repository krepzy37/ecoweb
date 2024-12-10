<?php
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = $_POST['role'] ?? 'admin'; // Alapértelmezett szerep

    // Ellenőrizzük, hogy minden mező ki van-e töltve
    if (empty($username) || empty($password)) {
        echo "Felhasználónév és jelszó megadása kötelező!";
        exit;
    }

    // Ellenőrizzük, hogy létezik-e már a felhasználónév
    $stmt = $pdo->prepare("SELECT id FROM admin WHERE username = :username");
    $stmt->execute(['username' => $username]);

    if ($stmt->rowCount() > 0) {
        echo "Ez a felhasználónév már foglalt!";
        exit;
    }

    // Jelszó titkosítása
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Új felhasználó beszúrása
    $stmt = $pdo->prepare("INSERT INTO admin (username, password_hash, role) VALUES (:username, :password_hash, :role)");
    $result = $stmt->execute([
        'username' => $username,
        'password_hash' => $password_hash,
        'role' => $role
    ]);

    if ($result) {
        echo "Sikeres regisztráció!";
        header("Location: login_form.html");
    } else {
        echo "Hiba történt a regisztráció során.";
    }
}
?>
