<!DOCTYPE html>
<html lang="hy">
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
    <form action="register_process.php" method="POST">
        <label for="first_name">Անուն</label>
        <input type="text" id="first_name" name="first_name" >

        <label for="last_name">Ազգանուն</label>
        <input type="text" id="last_name" name="last_name" >

        <label for="username">Օգտանուն</label>
        <input type="text" id="username" name="username">

        <label for="email">Էլ․փոստ</label>
        <input type="email" id="email" name="email" >

        <label for="phone">Հեռախոսահամար</label>
        <input type="tel" id="phone" name="phone">

        <label for="dob">Ծննդյան ամսաթիվ</label>
        <input type="date" id="dob" name="dob">

        <label for="gender">Սեռ</label>
        <select name="gender" id="gender">
            <option value="">Ընտրել սեռը</option>
            <option value="male">Արական</option>
            <option value="female">Իգական</option>
            <option value="other">Այլ</option>
        </select>

        <label for="address">Հասցե</label>
        <textarea id="address" name="address" rows="3"></textarea>

        <label for="password">Գաղտնաբառ</label>
        <input type="password" id="password" name="password" >

        <label for="confirm_password">Գաղտնաբառի հաստատում</label>
        <input type="password" id="confirm_password" name="confirm_password" >

        <button type="submit">Գրանցվել</button>
    </form>
</div>

</body>
</html>
