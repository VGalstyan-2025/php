<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Car</title>
<link rel="stylesheet" href="assets/style.css">
<link rel="stylesheet" href="assets/add.css">
</head>
<body>
<h1>Add New Car</h1>
<form id="addCarForm" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Title" >
    <input type="text" name="color" placeholder="Color">
    <input type="number" name="year" placeholder="Year">
    <input type="number" name="price" placeholder="Price">
    <input type="text" name="phone" placeholder="Phone">
    <textarea name="description" placeholder="Description"></textarea>
    Main Image: <input type="file" name="main_image" >
    Additional Images: <input type="file" name="images[]" multiple><br>
    <button type="submit">Add Car</button>
</form>
<p id="msg"></p>
<a href="dashboard.php">Back to Dashboard</a>
<br>
<script>
document.getElementById('addCarForm').addEventListener('submit', async e=>{
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);

    const mainData = new FormData();
    ['title','color','year','price','phone','description','main_image'].forEach(k=>{
        mainData.append(k, formData.get(k));
    });

    const resp = await fetch('../api/car_add.php', { method:'POST', body:mainData });
    const result = await resp.json();
    if(result.success){
        const car_id = result.car_id;

        const files = formData.getAll('images[]');
        if(files.length>0){
            const imgData = new FormData();
            imgData.append('car_id', car_id);
            files.forEach(f => imgData.append('images[]', f));
            await fetch('../api/car_image_upload.php', { method:'POST', body:imgData });
        }
        alert("Car added successfully");
        window.location.href = 'dashboard.php';
    } else {
        document.getElementById('msg').innerText = result.message;
    }
});
</script>
</body>
</html>
