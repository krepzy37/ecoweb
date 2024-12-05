<?php
require '../db.php';

$table = $_GET['table'] ?? null;
$id = $_GET['id'] ?? null;

if (!$table || !$id) {
    die("Tábla vagy ID nincs megadva.");
}

// Adat lekérdezése
$stmt = $pdo->prepare("SELECT * FROM $table WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    die("Nincs ilyen adat.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $columns = array_keys($_POST);
    $set = implode(',', array_map(fn($col) => "$col = ?", $columns));
    $sql = "UPDATE $table SET $set WHERE id = ?";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([...array_values($_POST), $id]);
        header("Location: table.php?table=$table");
    } catch (PDOException $e) {
        die("Hiba: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Szerkesztés - <?= htmlspecialchars($table) ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1><?= htmlspecialchars($table) ?> - Szerkesztés</h1>
    <form method="post">
        <?php foreach ($row as $column => $value): ?>
            <?php if ($column === 'id') continue; ?>
            <label><?= htmlspecialchars($column) ?>:</label>
            <input type="text" name="<?= htmlspecialchars($column) ?>" value="<?= htmlspecialchars($value) ?>" required>
            <br>
        <?php endforeach; ?>
        <button type="submit">Mentés</button>
        <div class="nav-buttons">
    <button onclick="history.back()" class="btn-back">Vissza</button>
    <a href="index.php" class="btn-home">Vissza a főoldalra</a>
</div>


    </form>
</body>
</html>
