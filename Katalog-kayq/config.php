<?php
// session_start();
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "catalog";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}
?>
