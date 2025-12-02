<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];
    $old = $_POST;

    // first_name
    if (empty($_POST['first_name'])) {
        $errors['first_name'] = "Խնդրում ենք մուտքագրել անունը։";
    } elseif (!preg_match("/^[a-zA-ZԱ-Ֆա-ֆ\- ]+$/u", $_POST['first_name'])) {
        $errors['first_name'] = "Անունը կարող է պարունակել միայն տառեր, '-' և բացատ։";
    }

    // last_name
    if (empty($_POST['last_name'])) {
        $errors['last_name'] = "Խնդրում ենք մուտքագրել ազգանունը։";
    } elseif (!preg_match("/^[a-zA-ZԱ-Ֆա-ֆ\- ]+$/u", $_POST['last_name'])) {
        $errors['last_name'] = "Ազգանունը կարող է պարունակել միայն տառեր, '-' և բացատ։";
    }

    // username
    if (empty($_POST['username'])) {
        $errors['username'] = "Խնդրում ենք մուտքագրել օգտանունը։";
    }

    // email
    if (empty($_POST['email'])) {
        $errors['email'] = "Խնդրում ենք մուտքագրել էլ. փոստը։";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Էլ. փոստի ֆորմատը սխալ է։";
    }

    // phone
    if (empty($_POST['phone'])) {
        $errors['phone'] = "Խնդրում ենք մուտքագրել հեռախոսահամարը։";
    } elseif (!preg_match("/^\+374\s\d{2}\s\d{3}\s\d{3}$/", $_POST['phone'])) {
        $errors['phone'] = "Հեռախոսահամարը պետք է լինի այս ֆորմատով՝ +374 00 000 000։";
    }

    // dob
    if (empty($_POST['dob'])) {
        $errors['dob'] = "Խնդրում ենք մուտքագրել ծննդյան ամսաթիվը։";
    } else {
        $dob = new DateTime($_POST['dob']);
        $today = new DateTime();
        $age = $today->diff($dob)->y;

        if ($age < 18) {
            $errors['dob'] = "Մուտքագրած օգտատերը պետք է լինի 18+։";
        }
    }

    // gender
    if (empty($_POST['gender'])) {
        $errors['gender'] = "Խնդրում ենք ընտրել սեռը։";
    }

    // address
    if (empty($_POST['address'])) {
        $errors['address'] = "Խնդրում ենք մուտքագրել հասցեն։";
    }

    // password
    if (empty($_POST['password']) || empty($_POST['confirm_password'])) {
        $errors['password'] = "Գաղտնաբառը և հաստատումը պարտադիր է։";
    } elseif ($_POST['password'] !== $_POST['confirm_password']) {
        $errors['password'] = "Գաղտնաբառերը չեն համընկնում։";
    }

    // Եթե սխալներ կան => Registration.php
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $old;
        header("Location: Registration.php");
        exit;
    }

    // Եթե սխալներ չկան => form_submit.php
    echo "<h3>Գրանցումը հաջողությամբ կատարվեց</h3>";
    echo "<a href='Registration.php'>Վերադառնալ սկզբնական էջ</a>";
}