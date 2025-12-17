<?php
header("Content-Type: application/json");
include "db.php";
session_start();

if (!isset($_SESSION["user_id"])) {
    echo json_encode([
        "success" => false,
        "message" => "Unauthorized. Please login."
    ]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode([
        "success" => false,
        "message" => "Invalid request method"
    ]);
    exit;
}

$title = $_POST["title"] ?? "";
$color = $_POST["color"] ?? "";
$year = $_POST["year"] ?? 0;
$price = $_POST["price"] ?? 0;
$phone = $_POST["phone"] ?? "";
$description = $_POST["description"] ?? "";

if (empty($title)) {
    echo json_encode([
        "success" => false,
        "message" => "Title is required"
    ]);
    exit;
}

$main_image_name = null;
if (isset($_FILES["main_image"]) && $_FILES["main_image"]["error"] === 0) {

    $ext = pathinfo($_FILES["main_image"]["name"], PATHINFO_EXTENSION);
    $main_image_name = uniqid("car_") . "." . $ext;
    $upload_path = __DIR__ . "/../uploads/" . $main_image_name;

    if (!move_uploaded_file($_FILES["main_image"]["tmp_name"], $upload_path)) {
        echo json_encode([
            "success" => false,
            "message" => "Failed to upload main image"
        ]);
        exit;
    }
}

try {
    $stmt = $pdo->prepare("
        INSERT INTO cars (title, color, year, price, phone, description, main_image)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->execute([$title, $color, $year, $price, $phone, $description, $main_image_name]);

    $car_id = $pdo->lastInsertId();

    echo json_encode([
        "success" => true,
        "message" => "Car added successfully",
        "car_id" => $car_id
    ]);

} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "message" => $e->getMessage()
    ]);
}
