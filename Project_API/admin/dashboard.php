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
<title>Admin Dashboard</title>
<link rel="stylesheet" href="assets/style.css">
<link rel="stylesheet" href="assets/dashboard.css">

</head>
<body>
<h1>Admin Dashboard</h1>
<a href="add_car.php">Add New Car</a> | 
<button id="logoutBtn">Logout</button>
<div id="carsList"></div>

<script>
async function fetchCars() {
    const resp = await fetch('../api/cars.php');
    const data = await resp.json();
    const container = document.getElementById('carsList');
    if(data.success) {
        container.innerHTML = '';
        data.cars.forEach(car => {
            const div = document.createElement('div');
            div.className = 'car-item';
            div.innerHTML = `
                <img src="${car.main_image_url}" width="100">
                <strong>${car.title}</strong> | ${car.year} | $${car.price} 
                <button onclick="editCar(${car.id})">Edit</button>
                <button onclick="deleteCar(${car.id})">Delete</button>
            `;
            container.appendChild(div);
        });
    }
}

function editCar(id) { window.location.href = 'edit_car.php?id=' + id; }

async function deleteCar(id) {
    if(!confirm("Are you sure you want to delete this car?")) return;
    const formData = new FormData();
    formData.append('car_id', id);
    const resp = await fetch('../api/car_delete.php', { method:'POST', body:formData });
    const data = await resp.json();
    alert(data.message);
    fetchCars();
}

document.getElementById('logoutBtn').addEventListener('click', async ()=>{
    await fetch('../api/logout.php', {method:'POST'});
    window.location.href = 'login.php';
});

fetchCars();
</script>
</body>
</html>
