<!DOCTYPE html>
<html>
    <head>
        <title>My first blog</title>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <style>
            main{
                box-shadow: 0 6px 20px #1d72b8 !important;
            }
        </style>
    </head>
    <body>
        <div class="site">
            <?php require "includes/header.php"; ?>

            <main>
                <h2>Կապ մեզ հետ</h2>
                <form>
                    <div>
                        <label for="name">Անուն Ազգանուն</label>
                        <input type="text" id="name" name="name" placeholder="Գրեք ձեր անուն ազգանունը" >
                    </div>

                    <div>
                        <label for="phone">Հեռախոսահամար</label>
                        <input type="tel" id="phone" name="phone" placeholder="+374 ..." >
                    </div>

                    <div>
                        <label for="email">Էլ. հասցե</label>
                        <input type="email" id="email" name="email" placeholder="example@mail.com" >
                    </div>

                    <div>
                        <label for="age">Տարիք</label>
                        <input type="number" id="age" name="age" min="1" max="120" >
                    </div>

                    <div>
                        <label>Սեռ</label>
                        <div class="gender-group">
                            <label><input type="radio" name="gender" value="male" > Արական</label>
                            <label><input type="radio" name="gender" value="female"> Իգական</label>
                        </div>
                    </div>

                    <div>
                        <label for="message">Նամակ</label>
                        <textarea id="message" name="message" placeholder="Գրեք ձեր նամակը այստեղ..."></textarea>
                    </div>
                    <button type="submit" >Ուղարկել</button>
                </form>
            </main>
            <?php require "includes/footer.php"; ?>

        </div>
    </body>
</html>