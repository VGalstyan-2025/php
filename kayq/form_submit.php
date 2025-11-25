<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Ստուգում՝ անուն
    if (empty($_POST['first_name'])) {
        $errors[] = "Խնդրում ենք մուտքագրել անունը։";
    } elseif (!preg_match("/^[a-zA-ZԱ-Ֆա-ֆ\- ]+$/u", $_POST['first_name'])) {
        $errors[] = "Անունը կարող է պարունակել միայն տառեր, '-' և բացատ։";
    }

    // Ստուգում՝ ազգանուն
    if (empty($_POST['last_name'])) {
        $errors[] = "Խնդրում ենք մուտքագրել ազգանունը։";
    } elseif (!preg_match("/^[a-zA-ZԱ-Ֆա-ֆ\- ]+$/u", $_POST['last_name'])) {
        $errors[] = "Ազգանունը կարող է պարունակել միայն տառեր, '-' և բացատ։";
    }

    // Օգտանուն
    if (empty($_POST['username'])) {
        $errors[] = "Խնդրում ենք մուտքագրել օգտանունը։";
    }

    // Էլ․ փոստ
    if (empty($_POST['email'])) {
        $errors[] = "Խնդրում ենք մուտքագրել էլ. փոստը։";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Էլ. փոստի ֆորմատը սխալ է։";
    }

    // Հեռախոսահամար
    if (empty($_POST['phone'])) {
        $errors[] = "Խնդրում ենք մուտքագրել հեռախոսահամարը։";
    } elseif (!preg_match("/^\+374\s\d{2}\s\d{3}\s\d{3}$/", $_POST['phone'])) {
        $errors[] = "Հեռախոսահամարը պետք է լինի այս ֆորմատով՝ +374 00 000 000։";
    }

    // Ծննդյան ամսաթիվ և տարիքի ստուգում
    if (empty($_POST['dob'])) {
        $errors[] = "Խնդրում ենք մուտքագրել ծննդյան ամսաթիվը։";
    } else {
        $dob = new DateTime($_POST['dob']);
        $today = new DateTime();
        $age = $today->diff($dob)->y;
        if ($age < 18) {
            $errors[] = "Մուտքագրած օգտատերը պետք է լինի 18+։";
        }
    }

    // Սեռ
    if (empty($_POST['gender'])) {
        $errors[] = "Խնդրում ենք ընտրել սեռը։";
    }

    // Հասցե
    if (empty($_POST['address'])) {
        $errors[] = "Խնդրում ենք մուտքագրել հասցեն։";
    }

    // Գաղտնաբառ և հաստատում
    if (empty($_POST['password']) || empty($_POST['confirm_password'])) {
        $errors[] = "Խնդրում ենք մուտքագրել գաղտնաբառը և դրա հաստատումը։";
    } elseif ($_POST['password'] !== $_POST['confirm_password']) {
        $errors[] = "Գաղտնաբառը և դրա հաստատումը չեն համընկնում։";
    }

    // Եթե սխալներ կան, ցուցադրել դրանք
    if (!empty($errors)) {
        echo "<h3>Սխալներ</h3>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
        echo "<a href='javascript:history.back()'>Վերադառնալ ֆորմային</a>";
        exit;
    }

    // Եթե ամեն ինչ ճիշտ է => MySQL

    echo "<h3>Գրանցումը հաջողությամբ կատարվեց</h3>";
    echo "<a href='register.php'>Վերադառնալ սկզբնական էջ</a>";
}
?>
