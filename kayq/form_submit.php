<?php
    //var_dump($_REQUEST);
    //var_dump($_GET);
    //var_dump($_POST);

    //echo "<p>{$_POST["first_name"]}</p>";

    if(isset($_POST["first_name"]) && $_POST["first_name"] != ""){
        echo "Name: " . $_POST["first_name"] . "<br>";
    } else{
        echo "<p style='color: red;'> ERROR: Full name is required</p>";
    }

    echo "Today is " . date("y/m/d") . "<br>";
?>
