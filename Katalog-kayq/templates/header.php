<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My Shop</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <div class="logo">MyShop</div>
    <nav>
        <a href="Home.php">Home</a>
        <?php if(isset($_SESSION['user'])): ?>
            <a href="add.php">Add Product</a>
            <span style="color:white; margin-left:10px;">Hello♡<?= htmlspecialchars($_SESSION['user']['first_name']) ?></span>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="Registration.php">Register</a>
            <a href="Login.php">Login</a>
        <?php endif; ?>
    </nav>
</header>
<main>
