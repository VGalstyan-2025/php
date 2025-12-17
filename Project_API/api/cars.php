<?php
header("Content-Type: application/json");
include "db.php";

try {
    $stmt = $pdo->query("SELECT * FROM cars ORDER BY created_at DESC");
    $cars = $stmt->fetchAll();

    foreach ($cars as &$car) {
        $car["main_image_url"] = $car["main_image"] 
            ? "http://" . $_SERVER['HTTP_HOST'] . "/WebIKM4/Project_API/uploads/" . $car["main_image"]
            : null;
    }

    echo json_encode([
        "success" => true,
        "cars" => $cars
    ]);

} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "message" => $e->getMessage()
    ]);
}
