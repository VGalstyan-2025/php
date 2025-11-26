<!DOCTYPE html>
<html>
    <head>
        <title>My first blog</title>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <style>
            main {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 2rem;
            }

            @media (max-width: 768px) {
                main {
                flex-direction: column;
                text-align: center;
                }
            }

        </style>
    </head>
    <body>
        <div class="site">
            <?php require "includes/header.php"; ?>

            <main>
                <img src="./images/logo.jpg" alt="logo" >        
                <div class="text-block">
                <p>
                    Սա իմ առաջին բլոգի էջն է։ Այստեղ կարող եք կարդալ հետաքրքիր թեմաների մասին:  
                    Նկարը ցուցադրվում է կողքին, իսկ հեռախոսային տարբերակում՝ վերևում։
                </p>
                </div>
            </main>

            <?php require "includes/footer.php"; ?>
        </div>
    </body>
</html>
