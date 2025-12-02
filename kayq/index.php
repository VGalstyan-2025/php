<!DOCTYPE html>
<html>
    <head>
        <title>My first blog</title>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body>
        <div class="site">
            <?php require "includes/header.php"; ?>


            <main>
                <section class="news-grid">
                    <article class="news-card">
                        <img src="./images/logo.jpg" alt="logo" >        
                        <div class="news-body">
                            <h3>Ապրանք 1</h3>
                            <h4>1500դրամ</h4>
                            <p>Սա է կարճ նկարագրությունը Նորություն 1-ի մասին։ Երբեք մի դադարեք հետաքրքրվել և ուսումնասիրել նոր բաներ։</p>
                        </div>
                    </article>

                    <article class="news-card">
                        <img src="./images/logo.jpg" alt="logo" >        
                        <div class="news-body">
                            <h3>Ապրանք 2</h3>
                            <h4>2500դրամ</h4>
                            <p>Երբեք մի դադարեք հետաքրքրվել և ուսումնասիրել նոր բաներ։</p>
                        </div>
                    </article>

                    <article class="news-card">
                        <img src="./images/logo.jpg" alt="logo" >        
                        <div class="news-body">
                            <h3>Ապրանք 3</h3>
                            <h4>500դրամ</h4>
                            <p>Սա է կարճ նկարագրությունը Նորություն 3-ի մասին։</p>
                        </div>
                    </article>

                    <article class="news-card">
                        <img src="./images/logo.jpg" alt="logo" >        
                        <div class="news-body">
                            <h3>Ապրանք 4</h3>
                            <h4>10․000դրամ</h4>
                            <p>Սա է կարճ նկարագրությունը Նորություն 4-ի  Երբեք մի դադարեք հետաքրքրվել և ուսումնասիրել նոր բաներ։</p>
                        </div>
                    </article>

                </section>
            </main>
            <?php require "includes/footer.php"; ?>

        </div>
    </body>
</html>