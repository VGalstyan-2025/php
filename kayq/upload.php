<?php
if (isset($_FILES['image'])) {

    $maxSize = 5 * 1024 * 1024;

    if ($_FILES['image']['size'] > $maxSize) {
        echo "Սխալ․ ֆայլի չափը չպետք է անցնի 5MB-ը։";
        exit;
    }

    $targetDir = "addimages/";

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "Նկարը հաջողությամբ վերբեռնվեց → " . $targetFile;
    } else {
        echo "Սխալ՝ նկարը չվերբեռնվեց։";
    }
}
?>
