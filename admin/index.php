<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Táblák</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Adatbázis kezelése</h1>
    <ul>
        <li><a href="table.php?table=green_area_type">Green Area Types</a></li>
        <li><a href="table.php?table=admin">Admin</a></li>
        <li><a href="table.php?table=settlements">Settlements</a></li>
        <li><a href="table.php?table=zip_codes">Zip Codes</a></li>
        <li><a href="table.php?table=location_zip_codes">Location Zip Codes</a></li>
        <li><a href="table.php?table=green_area">Green Areas</a></li>
        <li><a href="table.php?table=impacts">Impacts</a></li>
        <li><a href="table.php?table=green_roof_buildings">Green Roof Buildings</a></li>
        <li><a href="../index.php">VISSZA A FŐOLDALRA</a></li>
    </ul>
    
</body>
</html>
