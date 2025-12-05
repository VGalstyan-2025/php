<?php
session_start();
session_destroy();
$redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "Home.php";
header("Location: $redirect");
exit;
?>
