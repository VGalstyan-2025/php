<?php
header("Content-Type: application/json");
include "db.php";
session_start();

if (!isset($_SESSION["user_id"])) {
    echo json_encode(["success" => false, "message" => "Unauthorized. Please login."]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
    exit;
}

$car_id = isset($_POST["car_id"]) ? (int)$_POST["car_id"] : 0;

if ($car_id <= 0) {
    echo json_encode(["success" => false, "message" => "Invalid car ID"]);
    exit;
}

try {
    $stmt = $pdo->prepare("DELETE FROM cars WHERE id=?");
    $stmt->execute([$car_id]);

    echo json_encode(["success" => true, "message" => "Car deleted successfully"]);

} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
