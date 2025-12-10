<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "car_market";

try {

    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo " Database '$dbname' created or already exists.<br>";

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(100) UNIQUE NOT NULL,
            password_hash VARCHAR(255) NOT NULL
        )
    ");
    echo " Table 'users' created.<br>";


    $pdo->exec("
        CREATE TABLE IF NOT EXISTS cars (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            color VARCHAR(50),
            year INT,
            price DOUBLE,
            phone VARCHAR(30),
            description TEXT,
            main_image VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");
    echo " Table 'cars' created.<br>";


    $pdo->exec("
        CREATE TABLE IF NOT EXISTS car_images (
            id INT AUTO_INCREMENT PRIMARY KEY,
            car_id INT NOT NULL,
            image_path VARCHAR(255) NOT NULL,
            FOREIGN KEY (car_id) REFERENCES cars(id) ON DELETE CASCADE
        )
    ");
    echo " Table 'car_images' created.<br>";


    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->execute(["admin"]);
    if ($stmt->fetchColumn() == 0) {

        $passwordHash = password_hash("admin123", PASSWORD_DEFAULT);

        $insertAdmin = $pdo->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");
        $insertAdmin->execute(["admin", $passwordHash]);

        echo " Default admin created (username: admin, password: admin123)<br>";
    } else {
        echo " Admin already exists.<br>";
    }


    $uploadDir = __DIR__ . "/../uploads";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
        echo " Folder 'uploads' created.<br>";
    } else {
        echo " Folder 'uploads' already exists.<br>";
    }


    echo "<br><b> SETUP COMPLETE — EVERYTHING IS READY!</b>";

} catch (PDOException $e) {
    echo " Error: " . $e->getMessage();
}
?>
