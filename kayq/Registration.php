<?php session_start() ?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Գրանցման ֆորմա</title>
        <style>
            body {
                background-color: #f0f0f0;
                font-family: Arial, sans-serif;
            }
            .register-form {
                max-width: 600px;
                margin: 50px auto;
                padding: 30px;
                background: #fff;
                border-radius: 10px;
                box-shadow: 0 0 15px rgba(0,0,0,0.1);
            }
            .register-form h2 {
                color: #007bff;
                text-align: center;
                margin-bottom: 20px;
            }
            .register-form label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }
            .register-form input,
            .register-form select,
            .register-form textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
            }
            .register-form button {
                width: 100%;
                padding: 10px;
                background-color: #007bff;
                border: none;
                color: white;
                font-size: 16px;
                border-radius: 5px;
                cursor: pointer;
            }
            .register-form button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>

        <div class="register-form">
            <h2>Գրանցում</h2>
            <form action="form_submit.php" method="POST" >


                <label for="first_name">Անուն</label>
                <input type="text" id="first_name" name="first_name"
                    value="<?= $_SESSION['old']['first_name'] ?? '' ?>">
                <p style="color:red;">
                    <?= $_SESSION['errors']['first_name'] ?? '' ?>
                </p>

                <label for="last_name">Ազգանուն</label>
                <input type="text" id="last_name" name="last_name"
                    value="<?= $_SESSION['old']['last_name'] ?? '' ?>">
                <p style="color:red;">
                    <?= $_SESSION['errors']['last_name'] ?? '' ?>
                </p>

                <label for="username">Օգտանուն</label>
                <input type="text" id="username" name="username"
                    value="<?= $_SESSION['old']['username'] ?? '' ?>">
                <p style="color:red;">
                    <?= $_SESSION['errors']['username'] ?? '' ?>
                </p>

                <label for="email">Էլ. փոստ</label>
                <input type="email" id="email" name="email"
                    value="<?= $_SESSION['old']['email'] ?? '' ?>">
                <p style="color:red;">
                    <?= $_SESSION['errors']['email'] ?? '' ?>
                </p>

                <label for="phone">Հեռախոսահամար</label>
                <input type="tel" id="phone" name="phone"
                    value="<?= $_SESSION['old']['phone'] ?? '' ?>">
                <p style="color:red;">
                    <?= $_SESSION['errors']['phone'] ?? '' ?>
                </p>

                <label for="dob">Ծննդյան ամսաթիվ</label>
                <input type="date" id="dob" name="dob"
                    value="<?= $_SESSION['old']['dob'] ?? '' ?>">
                <p style="color:red;">
                    <?= $_SESSION['errors']['dob'] ?? '' ?>
                </p>

                <label for="gender">Սեռ</label>
                <select id="gender" name="gender">
                    <option value="">Ընտրել սեռը</option>
                    <option value="male"   <?= (($_SESSION['old']['gender'] ?? '') == 'male') ? 'selected' : '' ?>>Արական</option>
                    <option value="female" <?= (($_SESSION['old']['gender'] ?? '') == 'female') ? 'selected' : '' ?>>Իգական</option>
                </select>
                <p style="color:red;">
                    <?= $_SESSION['errors']['gender'] ?? '' ?>
                </p>

                <label for="address">Հասցե</label>
                <textarea id="address" name="address" rows="3"><?= $_SESSION['old']['address'] ?? '' ?></textarea>
                <p style="color:red;">
                    <?= $_SESSION['errors']['address'] ?? '' ?>
                </p>

                <label for="password">Գաղտնաբառ</label>
                <input type="password" id="password" name="password">

                <label for="confirm_password">Գաղտնաբառի հաստատում</label>
                <input type="password" id="confirm_password" name="confirm_password">
                <p style="color:red;">
                    <?= $_SESSION['errors']['password'] ?? '' ?>
                </p>

                <button type="submit">Գրանցվել</button>
            </form>
        </div>

        <?php
        unset($_SESSION['errors']);
        unset($_SESSION['old']);
        ?>

    </body>
</html>
