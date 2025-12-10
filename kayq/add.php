<!-- php-ով ուզում եմ add.php ֆայլում նկար ավելացնելու ֆորմա լինի, ու ավելացրած նկարը տանի addimages-ում պահի -->
 <!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <title>Նկար ավելացնել</title>
</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <label>Ընտրեք նկար՝</label><br><br>
    <input type="file" name="image"><br><br>
    <button type="submit" name="upload">Վերբեռնել</button>
</form>

</body>
</html>
