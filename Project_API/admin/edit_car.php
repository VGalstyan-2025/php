<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
$car_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Car</title>
<link rel="stylesheet" href="assets/style.css">
<link rel="stylesheet" href="assets/edit.css">
</head>
<body>
<h1>Edit Car</h1>
<form id="editCarForm" enctype="multipart/form-data">
    <input type="hidden" name="car_id" value="<?php echo $car_id;?>">
    <input type="text" name="title" placeholder="Title" >
    <input type="text" name="color" placeholder="Color">
    <input type="number" name="year" placeholder="Year">
    <input type="number" name="price" placeholder="Price">
    <input type="text" name="phone" placeholder="Phone">
    <textarea name="description" placeholder="Description"></textarea>
    Main Image: <input type="file" name="main_image">
    Additional Images: <input type="file" name="images[]" multiple><br>
    <div id="existingImages" class="image-list"></div>
    <button type="submit">Update Car</button>
</form>
<p id="msg"></p>
<a href="dashboard.php">Back to Dashboard</a>
<br>
<script>
async function loadCar(){
    const resp = await fetch('../api/car.php?id=<?php echo $car_id;?>');
    const data = await resp.json();

    if(data.success){
        const car = data.car;
        const f = document.getElementById('editCarForm');

        f.title.value = car.title;
        f.color.value = car.color;
        f.year.value = car.year;
        f.price.value = car.price;
        f.phone.value = car.phone;
        f.description.value = car.description;

        const imagesDiv = document.getElementById('existingImages');
        imagesDiv.innerHTML = "";

        if(car.main_image_url){
            const mainBox = document.createElement("div");
            mainBox.className = "img-box";
            mainBox.innerHTML = `
                <p>Main Image</p>
                <img src="${car.main_image_url}" class="thumb">
            `;
            imagesDiv.appendChild(mainBox);
        }

        // ✔ լրացուցիչ նկարները + Delete կոճակով
        data.images.forEach(img => {
            const box = document.createElement("div");
            box.className = "img-box";
            box.innerHTML = `
                <img src="${img.image_url}" class="thumb">
                <button class="delete-btn" data-id="${img.id}">Delete</button>
            `;
            imagesDiv.appendChild(box);
        });
    }
}

loadCar();

document.addEventListener("click", async function(e){
    if (e.target.classList.contains("delete-btn")) {
        const imageId = e.target.dataset.id;

        if (!confirm("Delete this image?")) return;

        const fd = new FormData();
        fd.append("image_id", imageId);

        const resp = await fetch("../api/delete_car_image.php", {
            method: "POST",
            body: fd
        });

        const result = await resp.json();

        if(result.success){
            e.target.parentElement.remove(); 
            alert(result.message);
        }
    }
});

document.getElementById('editCarForm').addEventListener('submit', async e=>{
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);

    const resp = await fetch('../api/car_update.php', { method:'POST', body:formData });
    const result = await resp.json();
    if(result.success){
        const files = formData.getAll('images[]');
        if(files.length>0){
            const imgData = new FormData();
            imgData.append('car_id', formData.get('car_id'));
            files.forEach(f => imgData.append('images[]', f));
            await fetch('../api/car_image_upload.php', { method:'POST', body:imgData });
        }
        alert("Car updated successfully");
        window.location.href = 'dashboard.php';
    } else {
        document.getElementById('msg').innerText = result.message;
    }
});
</script>

</body>
</html>
