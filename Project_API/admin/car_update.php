<?php
session_start();
require_once "db.php";

if(!isset($_SESSION["user_id"])){
    echo json_encode(["success"=>false, "message"=>"Unauthorized"]);
    exit;
}

$car_id = $_POST['car_id'] ?? 0;
$title = $_POST['title'] ?? '';
$color = $_POST['color'] ?? '';
$year = $_POST['year'] ?? '';
$price = $_POST['price'] ?? '';
$phone = $_POST['phone'] ?? '';
$description = $_POST['description'] ?? '';

$stmt = $conn->prepare("SELECT main_image FROM cars WHERE id=?");
$stmt->execute([$car_id]);
$car = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_FILES['main_image']) && $_FILES['main_image']['tmp_name']){
    $oldMain = $car['main_image'];
    if($oldMain && file_exists("../uploads/".$oldMain)) unlink("../uploads/".$oldMain);

    $ext = pathinfo($_FILES['main_image']['name'], PATHINFO_EXTENSION);
    $newFileName = "car_".uniqid().".".$ext;
    move_uploaded_file($_FILES['main_image']['tmp_name'], "../uploads/".$newFileName);
    $main_image = $newFileName;
}else{
    $main_image = $car['main_image']; 
}

$stmt = $conn->prepare("UPDATE cars SET title=?, color=?, year=?, price=?, phone=?, description=?, main_image=? WHERE id=?");
$stmt->execute([$title,$color,$year,$price,$phone,$description,$main_image,$car_id]);

echo json_encode(["success"=>true,"car_id"=>$car_id]);
