<?php
require 'db.php';

// Zöld területek lekérdezése
$query = $pdo->query("SELECT 
    ga.id, 
    ga.name, 
    gat.type_name, 
    ga.area_m2, 
    ga.creation_date 
FROM green_area ga
JOIN green_area_type gat ON ga.type_id = gat.id");

$green_areas = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zöld Területek</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Zöld Területek Adatbázis</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Név</th>
                    <th>Típus</th>
                    <th>Terület (m²)</th>
                    <th>Létrehozás Dátuma</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($green_areas as $area): ?>
                    <tr>
                        <td><?= htmlspecialchars($area['id']) ?></td>
                        <td><?= htmlspecialchars($area['name']) ?></td>
                        <td><?= htmlspecialchars($area['type_name']) ?></td>
                        <td><?= htmlspecialchars($area['area_m2']) ?></td>
                        <td><?= htmlspecialchars($area['creation_date']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbN1qZ5exNux2mlSVVcwgGZD-tN46--AiXqA&s" alt="">
    </main>
    <footer>
        <p>&copy; 2024 Zöldterületek</p>
    </footer>
</body>
</html>
