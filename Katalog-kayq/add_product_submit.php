<?php
session_start();
include "config.php";
include "classes/Product.php";

if(!isset($_SESSION['user'])){
    header("Location: Login.php");
    exit;
}

$productObj = new Product($conn);
$errors = [];
$old = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $title = trim($_POST['title']);
    $brand = trim($_POST['brand']);
    $price = trim($_POST['price']);
    $color = trim($_POST['color']);
    $description = trim($_POST['description']);
    $image = $_FILES['image'];

    $old = ['title'=>$title,'brand'=>$brand,'price'=>$price,'color'=>$color,'description'=>$description];

    if(empty($title)) $errors['title'] = "Անհրաժեշտ է լրացնել անվանումը";
    if(empty($brand)) $errors['brand'] = "Անհրաժեշտ է լրացնել բրենդը";
    if(empty($price)) $errors['price'] = "Անհրաժեշտ է լրացնել գինը";
    if(empty($color)) $errors['color'] = "Անհրաժեշտ է լրացնել գույնը";
    if(empty($description)) $errors['description'] = "Անհրաժեշտ է լրացնել բնութագիրը";
    if(empty($image['name'])) $errors['image'] = "Անհրաժեշտ է ընտրել նկար";

    if(!empty($errors)){
        $errors_json = urlencode(json_encode($errors));
        $old_json = urlencode(json_encode($old));
        header("Location: add.php?errors=$errors_json&old=$old_json");
        exit;
    }

    $user_id = $_SESSION['user']['id'];

    $image_name = time().'_'.$image['name'];
    $target = "uploads/".$image_name;
    move_uploaded_file($image['tmp_name'], $target);

    $data = [
        'user_id'=>$user_id,
        'title'=>$title,
        'brand'=>$brand,
        'price'=>$price,
        'color'=>$color,
        'description'=>$description,
        'image'=>$image_name
    ];

    if($productObj->addProduct($user_id, $data)){
        header("Location: Home.php");
        exit;
    } else {
        $errors['general'] = "Սխալ տեղի ունեցավ, փորձեք կրկին";
        $errors_json = urlencode(json_encode($errors));
        $old_json = urlencode(json_encode($old));
        header("Location: add.php?errors=$errors_json&old=$old_json");
        exit;
    }
}
?>
