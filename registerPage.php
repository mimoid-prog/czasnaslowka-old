<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,500,700&amp;subset=latin-ext" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">   
        <link rel="stylesheet" href="css/index.css">   
        <title>CzasNaSlowka.pl</title>
        <style>           
            .header-box {
                padding-bottom: 50px;
            }
            
            .link-send {
                padding-top: 0;
            }
        </style>
    </head>

    <body>
        <header>
            <div class="container box header-box">
                <a href="http://czasnaslowka.pl">
                    <img class="logo-full" src="img/logo.png" alt="logo full">
                    <img class="logo-title" src="img/logoNoFlags.png" alt="logo title"> 
                    <img class="logo-flags" src="img/flags.png" alt="logo flags">  
                </a>  
            </div>
            
            <div id="get-to-account-modal" class="get-to-account-modal">
                <div id="get-to-account-box" class="get-to-account-box">

                    <div id="signup-form" class="signup-form active">
                        <form id="r-form" action="php/register.php" method="post" autocomplete="off" class="get-to-account-form">  
                            <h1>Rejestracja</h1>
                            <label>Email</label>
                            <input type="email" placeholder="Podaj Email" name="email" class="text-field" required>
                            <label>Hasło</label>
                            <input type="password" placeholder="Podaj hasło" name="password" class="text-field" required>
                            <label>Powtórz hasło</label>
                            <input type="password" placeholder="Podaj hasło" name="confirm-password" class="text-field" required>
                            <p class="signup-info">Tworząc konto akceptujesz warunki i zasady <a href="#" style="color:dodgerblue">regulaminu</a>.</p>
                            <button id="register-act" type="submit" class="pure-btn ess-btn normal-btn submit-btn">Utwórz konto</button>
                        </form>
                        <p class="errors-info"></p>
                    </div>
                    
                    <p id="link-send" class="link-send"></p>
                </div>
            </div>
        </header>

        <footer>
            <div class="container footer-box">
                <p class="footer-element">czasnaslowka@az.pl</p>
                <p class="footer-element">regulamin</p>  
                <img class="footer-element" src="img/logoNoFlagsWhite.png">
            </div>
        </footer>

        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/loginRegisterForms.js"></script>
    </body>
</html>