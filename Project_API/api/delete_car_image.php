<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    echo json_encode(["success" => false, "message" => "Not authorized"]);
    exit;
}

require "db.php";

$image_id = $_POST['image_id'] ?? 0;

if (!$image_id) {
    echo json_encode(["success" => false, "message" => "No image id"]);
    exit;
}

$stmt = $pdo->prepare("SELECT image_path FROM car_images WHERE id = ?");
$stmt->execute([$image_id]);
$img = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$img) {
    echo json_encode(["success" => false, "message" => "Image not found"]);
    exit;
}

$filePath = __DIR__ . "/../uploads/" . $img['image_path'];

$pdo->prepare("DELETE FROM car_images WHERE id = ?")->execute([$image_id]);

if (file_exists($filePath)) {
    unlink($filePath);
}

echo json_encode(["success" => true]);
?>
