<?php
include "config.php";
include "classes/User.php";

$userObj = new User($conn);

$errors = [];
$old = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $usernameOrEmail = trim($_POST['username']);
    $password = $_POST['password'];
    $old['username'] = $usernameOrEmail;

    if(empty($usernameOrEmail)) $errors['username'] = "Խնդրում ենք լրացնել username կամ email";
    if(empty($password)) $errors['password'] = "Խնդրում ենք լրացնել գաղտնաբառ";

    if(empty($errors)){
        $user = $userObj->login($usernameOrEmail,$password);
        if($user){
            $_SESSION['user'] = $user; 
            header("Location: Home.php");
            exit;
        } else {
            $errors['general'] = "Սխալ username/email կամ գաղտնաբառ";
        }
    }

    $errors_json = urlencode(json_encode($errors));
    $old_json = urlencode(json_encode($old));
    header("Location: Login.php?errors=$errors_json&old=$old_json");
    exit;
}
?>
