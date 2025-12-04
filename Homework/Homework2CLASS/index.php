<?php
require_once "classes.php";

// Student-ների զանգված
$students = [
    new Student("Անի Սարգսյան", "AN1234567", "+37444111222", 20, 91.5, "Ինֆորմատիկա", 2),
    new Student("Արեն Մկրտչյան", "AM9988776", "+37499333777", 19, 87.3, "Ֆիզիկա", 1),
    new Student("Կոլյա Հովհաննիսյան", "AH4455663", "+37455123456", 21, 94.7, "Մաթեմատիկա", 3)
];
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student Data</title>
    <style>
        body { font-family: Arial; background:#f0f2f5; padding:20px; }
        table { width: 80%; margin:auto; border-collapse: collapse; background: white; }
        th, td { padding: 12px; border: 1px solid #ccc; text-align: center; }
        th { background: #4CAF50; color:white; }
        h1 { text-align:center; }
    </style>
</head>
<body>

<h1>Student Data</h1>

<table>
    <tr>
        <th>Անուն Ազգանուն</th>
        <th>Անձնագիր</th>
        <th>Հեռախոս</th>
        <th>Տարիք</th>
        <th>ՄՈԳ</th>
        <th>Ֆակուլտետ</th>
        <th>Կուրս</th>
    </tr>

    <?php foreach ($students as $st): ?>
        <tr>
            <td><?= $st->fullName ?></td>
            <td><?= $st->getPassport() ?></td>
            <td><?= $st->getPhone() ?></td>
            <td><?= $st->age ?></td>
            <td><?= $st->gpa ?></td>
            <td><?= $st->faculty ?></td>
            <td><?= $st->course ?></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
