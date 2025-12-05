<?php
include "config.php";
include "classes/User.php";

if(isset($_SESSION['user'])){
    header("Location: Home.php");
    exit;
}

$errors = [];
$old = [];

if(isset($_GET['errors'])){
    $errors = json_decode(urldecode($_GET['errors']), true);
}

if(isset($_GET['old'])){
    $old = json_decode(urldecode($_GET['old']), true);
}

function old($field, $old){
    return isset($old[$field]) ? htmlspecialchars($old[$field]) : '';
}

include "templates/header.php";
?>

<h2>Մուտք</h2>

<form action="form_login.php" method="POST">
    <input type="text" name="username" placeholder="Username կամ Email" value="<?= old('username',$old) ?>"><br>
    <?php if(isset($errors['username'])) echo "<span class='error'>".$errors['username']."</span><br>"; ?>

    <input type="password" name="password" placeholder="Գաղտնաբառ"><br>
    <?php if(isset($errors['password'])) echo "<span class='error'>".$errors['password']."</span><br>"; ?>

    <?php if(isset($errors['general'])) echo "<span class='error'>".$errors['general']."</span><br>"; ?>

    <button type="submit">Մուտք</button>
</form>

<style>.error{color:red; font-size:14px;}</style>

<?php include "templates/footer.php"; ?>
