<?php
require '../db.php';

$table = $_GET['table'] ?? null;
$id = $_GET['id'] ?? null;

if (!$table || !$id) {
    die("Tábla vagy ID nincs megadva.");
}

try {
    $stmt = $pdo->prepare("DELETE FROM $table WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: table.php?table=$table");
} catch (PDOException $e) {
    die("Hiba: " . $e->getMessage());
}
?>
