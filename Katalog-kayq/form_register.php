<?php
include "config.php";
include "classes/User.php";

$user = new User($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    $first = trim($_POST['first']);
    $last = trim($_POST['last']);
    $birthdate = trim($_POST['birthdate']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if (empty($first)) $errors['first'] = "Խնդրում ենք լրացնել անունը";
    elseif (!preg_match("/^[\p{L}]+$/u",$first)) $errors['first'] = "Անունը պետք է պարունակի միայն տառեր";

    if (empty($last)) $errors['last'] = "Խնդրում ենք լրացնել ազգանունը";
    elseif (!preg_match("/^[\p{L}]+$/u",$last)) $errors['last'] = "Ազգանունը պետք է պարունակի միայն տառեր";

    if (empty($birthdate)) $errors['birthdate'] = "Խնդրում ենք լրացնել ծննդյան ամսաթիվը";
    elseif (!$user->isAdult($birthdate)) $errors['birthdate'] = "Դուք պետք է լինեք առնվազն 18 տարեկան";

    if (empty($email)) $errors['email'] = "Խնդրում ենք լրացնել email-ը";
    elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) $errors['email'] = "Սխալ email ֆորմատ";

    if (empty($username)) $errors['username'] = "Խնդրում ենք լրացնել username-ը";

    if (empty($password)) $errors['password'] = "Խնդրում ենք լրացնել գաղտնաբառը";
    if (empty($password2)) $errors['password2'] = "Խնդրում ենք կրկնել գաղտնաբառը";
    if (!empty($password) && !empty($password2) && $password !== $password2) $errors['password2'] = "Գաղտնաբառերը չեն համընկնում";

    if (!empty($errors)) {
        $errors_json = urlencode(json_encode($errors));
        header("Location: Registration.php?errors=$errors_json&old=" . urlencode(json_encode($_POST)));
        exit;
    }

    $data = [
        'first' => $first,
        'last' => $last,
        'birthdate' => $birthdate,
        'email' => $email,
        'username' => $username,
        'password' => $password
    ];

    if ($user->register($data)) {
        header("Location: Login.php");
        exit;
    } else {
        $errors['general'] = "Username կամ Email արդեն զբաղված է";
        $errors_json = urlencode(json_encode($errors));
        header("Location: Registration.php?errors=$errors_json&old=" . urlencode(json_encode($_POST)));
        exit;
    }
}
?>
