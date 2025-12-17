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

$car_id = $_POST["car_id"] ?? 0;
$car_id = (int)$car_id;

if ($car_id <= 0) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid car ID"
    ]);
    exit;
}

if (!isset($_FILES["images"])) {
    echo json_encode([
        "success" => false,
        "message" => "No images uploaded"
    ]);
    exit;
}

$uploaded_files = [];
foreach ($_FILES["images"]["tmp_name"] as $index => $tmp_name) {

    if ($_FILES["images"]["error"][$index] !== 0) continue;

    $ext = pathinfo($_FILES["images"]["name"][$index], PATHINFO_EXTENSION);
    $filename = uniqid("carimg_") . "." . $ext;
    $upload_path = __DIR__ . "/../uploads/" . $filename;

    if (move_uploaded_file($tmp_name, $upload_path)) {
        $stmt = $pdo->prepare("INSERT INTO car_images (car_id, image_path) VALUES (?, ?)");
        $stmt->execute([$car_id, $filename]);
        $uploaded_files[] = $filename;
    }
}

if (count($uploaded_files) > 0) {
    echo json_encode([
        "success" => true,
        "message" => "Images uploaded successfully",
        "files" => $uploaded_files
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "No images were uploaded"
    ]);
}
