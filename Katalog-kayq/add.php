<?php
include "config.php";
include "classes/Product.php";

if(!isset($_SESSION['user'])){
    header("Location: Login.php");
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

<h2>Add Product</h2>

<form action="add_product_submit.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Ապրանքի անվանում" value="<?= old('title',$old) ?>"><br>
    <?php if(isset($errors['title'])) echo "<span class='error'>".$errors['title']."</span><br>"; ?>

    <input type="text" name="brand" placeholder="Բրենդ" value="<?= old('brand',$old) ?>"><br>
    <?php if(isset($errors['brand'])) echo "<span class='error'>".$errors['brand']."</span><br>"; ?>

    <input type="number" step="0.01" name="price" placeholder="Գին" value="<?= old('price',$old) ?>"><br>
    <?php if(isset($errors['price'])) echo "<span class='error'>".$errors['price']."</span><br>"; ?>

    <input type="text" name="color" placeholder="Գույն" value="<?= old('color',$old) ?>"><br>
    <?php if(isset($errors['color'])) echo "<span class='error'>".$errors['color']."</span><br>"; ?>

    <textarea name="description" placeholder="Բնութագիր"><?= old('description',$old) ?></textarea><br>
    <?php if(isset($errors['description'])) echo "<span class='error'>".$errors['description']."</span><br>"; ?>

    <input type="file" name="image"><br>
    <?php if(isset($errors['image'])) echo "<span class='error'>".$errors['image']."</span><br>"; ?>

    <button type="submit">Ավելացնել</button>
</form>

<style>.error{color:red; font-size:14px;}</style>

<?php include "templates/footer.php"; ?>
