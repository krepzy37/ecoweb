<?php
require 'db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $stmt = $pdo->query("
            SELECT ga.id, ga.name, gat.type_name, ga.area_m2, ga.creation_date, s.settlement_name, z.zip_code,
                   i.air_quality_improvement, i.noise_reduction, i.temperature_reduction, i.biodiversity_increase
            FROM green_area ga
            JOIN green_area_type gat ON ga.type_id = gat.id
            JOIN location_zip_codes lzc ON ga.location_zip_code_id = lzc.id
            JOIN settlements s ON lzc.settlement_id = s.id
            JOIN zip_codes z ON lzc.zip_code_id = z.id
            LEFT JOIN impacts i ON ga.id = i.urban_green_area_id
        ");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode(['status' => 'success', 'data' => $data]);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>