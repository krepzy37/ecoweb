<?php
require '../db.php';

$table = $_GET['table'] ?? null;
if (!$table) {
    die("Tábla neve nincs megadva.");
}

// Adatok lekérdezése
try {
    $stmt = $pdo->query("SELECT * FROM $table");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $columns = array_keys($data[0] ?? []); // Oszlopnevek
} catch (PDOException $e) {
    die("Hiba: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - <?= htmlspecialchars($table) ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1><?= htmlspecialchars($table) ?> tábla kezelése</h1>
    <a href="create.php?table=<?= htmlspecialchars($table) ?>">Új hozzáadása</a>
    <table>
        <thead>
            <tr>
                <?php foreach ($columns as $column): ?>
                <th><?= htmlspecialchars($column) ?></th>
                <?php endforeach; ?>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
            <tr>
                <?php foreach ($row as $value): ?>
                <td><?= htmlspecialchars($value) ?></td>
                <?php endforeach; ?>
                <td>
                    <a href="edit.php?table=<?= htmlspecialchars($table) ?>&id=<?= $row['id'] ?>">Szerkesztés</a>
                    <a href="delete.php?table=<?= htmlspecialchars($table) ?>&id=<?= $row['id'] ?>" onclick="return confirm('Biztos törölni szeretnéd?')">Törlés</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="nav-buttons">
    
    <a href="index.php" class="btn-home">Vissza a főoldalra</a>
</div>

</body>
</html>
