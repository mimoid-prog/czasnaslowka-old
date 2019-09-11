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

                    <div id="forgot-password-form" class="forgot-password-form active">
                        <form id="f-form" action="php/forgot.php" method="post" autocomplete="off" class="get-to-account-form">  
                            <h2>Resetowanie hasła</h2>
                            <p>Podaj swój adres email, aby otrzymać link umożliwający zmianę hasła.</p>
                            <input type="email" placeholder="Podaj Email" name="email" class="text-field" required>
                            <button id="forgot-act" type="submit" class="pure-btn ess-btn normal-btn submit-btn">Wyślij</button>
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