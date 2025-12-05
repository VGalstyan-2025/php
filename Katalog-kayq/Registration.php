<?php include "config.php"; ?>
<?php include "templates/header.php"; ?>

<h2>Գրանցում</h2>

<?php
$errors = [];
$old = [];

if (isset($_GET['errors'])) {
    $errors = json_decode(urldecode($_GET['errors']), true);
}

if (isset($_GET['old'])) {
    $old = json_decode(urldecode($_GET['old']), true);
}

function old($field, $old){
    return isset($old[$field]) ? htmlspecialchars($old[$field]) : '';
}
?>

<form action="form_register.php" method="POST">
    <input type="text" name="first" placeholder="Անուն" value="<?= old('first',$old) ?>"><br>
    <?php if(isset($errors['first'])) echo "<span class='error'>".$errors['first']."</span><br>"; ?>

    <input type="text" name="last" placeholder="Ազգանուն" value="<?= old('last',$old) ?>"><br>
    <?php if(isset($errors['last'])) echo "<span class='error'>".$errors['last']."</span><br>"; ?>

    <input type="date" name="birthdate" value="<?= old('birthdate',$old) ?>"><br>
    <?php if(isset($errors['birthdate'])) echo "<span class='error'>".$errors['birthdate']."</span><br>"; ?>

    <input type="email" name="email" placeholder="Email" value="<?= old('email',$old) ?>"><br>
    <?php if(isset($errors['email'])) echo "<span class='error'>".$errors['email']."</span><br>"; ?>

    <input type="text" name="username" placeholder="Username" value="<?= old('username',$old) ?>"><br>
    <?php if(isset($errors['username'])) echo "<span class='error'>".$errors['username']."</span><br>"; ?>

    <input type="password" name="password" placeholder="Գաղտնաբառ"><br>
    <?php if(isset($errors['password'])) echo "<span class='error'>".$errors['password']."</span><br>"; ?>

    <input type="password" name="password2" placeholder="Կրկնել գաղտնաբառ"><br>
    <?php if(isset($errors['password2'])) echo "<span class='error'>".$errors['password2']."</span><br>"; ?>

    <?php if(isset($errors['general'])) echo "<span class='error'>".$errors['general']."</span><br>"; ?>

    <button type="submit">Գրանցվել</button>
</form>

<style>
.error { color:red; font-size:14px; }
</style>

<?php include "templates/footer.php"; ?>
