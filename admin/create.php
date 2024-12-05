<?php
require '../db.php';

$table = $_GET['table'] ?? null;
if (!$table) {
    die("Tábla neve nincs megadva.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $columns = array_keys($_POST);
    $placeholders = implode(',', array_fill(0, count($columns), '?'));
    $sql = "INSERT INTO $table (" . implode(',', $columns) . ") VALUES ($placeholders)";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array_values($_POST));
        header("Location: table.php?table=$table");
    } catch (PDOException $e) {
        die("Hiba: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Új hozzáadása - <?= htmlspecialchars($table) ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1><?= htmlspecialchars($table) ?> - Új hozzáadása</h1>
    <form method="post">
        <?php
        // Oszlopok lekérdezése
        $stmt = $pdo->query("DESCRIBE $table");
        $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($columns as $column):
            if ($column['Field'] === 'id') continue; // ID-t kihagyjuk
        ?>
            <label><?= htmlspecialchars($column['Field']) ?>:</label>
            <input type="text" name="<?= htmlspecialchars($column['Field']) ?>" required>
            <br>
        <?php endforeach; ?>
        <button type="submit">Mentés</button>
    </form>
    <div class="nav-buttons">
    <button onclick="history.back()" class="btn-back">Vissza</button>
    <a href="index.php" class="btn-home">Vissza a főoldalra</a>
</div>

</body>
</html>
