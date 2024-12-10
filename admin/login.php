<?php
require_once '../db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "Felhasználónév és jelszó megadása kötelező!";
        exit;
    }

    // Felhasználó keresése az adatbázisban
    $stmt = $pdo->prepare("SELECT id, username, password_hash FROM admin WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_hash'])) {
        // Sikeres bejelentkezés
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        echo "Sikeres bejelentkezés!";
        header("Location: index.php");
        exit;
    } else {
        echo "Hibás felhasználónév vagy jelszó!";
    }
}
?>
