<?php
session_start();
if (isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Login</title>
<link rel="stylesheet" href="assets/style.css">
<link rel="stylesheet" href="assets/login.css">
</head>
<body>
<div class="login-container">
    <h2>Admin Login</h2>
    <form id="loginForm">
        <input type="text" name="username" placeholder="Username" ><br>
        <input type="password" name="password" placeholder="Password" ><br>
        <button type="submit">Login</button>
    </form>
    <p id="msg"></p>
</div>

<script>
const form = document.getElementById('loginForm');
form.addEventListener('submit', async e => {
    e.preventDefault();
    const data = new FormData(form);
    const resp = await fetch('../api/login.php', {
        method: 'POST',
        body: JSON.stringify({
            username: data.get('username'),
            password: data.get('password')
        }),
        headers: { 'Content-Type': 'application/json' }
    });
    const result = await resp.json();
    if (result.success) {
        window.location.href = 'dashboard.php';
    } else {
        document.getElementById('msg').innerText = result.message;
    }
});
</script>
</body>
</html>
