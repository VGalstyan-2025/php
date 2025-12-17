<?php
header("Content-Type: application/json");
include "db.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid car ID"
    ]);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE id = ?");
    $stmt->execute([$id]);
    $car = $stmt->fetch();

    if (!$car) {
        echo json_encode([
            "success" => false,
            "message" => "Car not found"
        ]);
        exit;
    }

    $car["main_image_url"] = $car["main_image"]
        ? "http://" . $_SERVER['HTTP_HOST'] . "/WebIKM4/Project_API/uploads/" . $car["main_image"]
        : null;

    $stmt = $pdo->prepare("SELECT * FROM car_images WHERE car_id = ?");
    $stmt->execute([$id]);
    $images = $stmt->fetchAll();

    foreach ($images as &$img) {
        $img["image_url"] = "http://" . $_SERVER['HTTP_HOST'] . "/WebIKM4/Project_API/uploads/" . $img["image_path"];
    }

    echo json_encode([
        "success" => true,
        "car" => $car,
        "images" => $images
    ]);

} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "message" => $e->getMessage()
    ]);
}
