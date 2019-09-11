<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="CzasNaSlowka.pl to strona służąca do nauki słówek z dowolnych języków"/>
        <meta name="keywords" content="czasnaslowka.pl, czasnaslowka, słówka, nauka słówek, nauka języków, angielskie słówka, niemieckie słówka, rosyjskie słówka"/>
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

            @media (min-width: 650px) {
                .header-box {
                    padding-bottom: 40px;
                }
            }
            
            @media (min-width: 1350px) {
                .header-box {
                    padding-bottom: 20px;
                }
            }
        </style>     
    </head>

    <body>
        <header>
            <div class="container box header-box">
                <a href="index.php">
                    <img class="logo-full" src="img/logo.png" alt="logo full">
                    <img class="logo-title" src="img/logoNoFlags.png" alt="logo title"> 
                    <img class="logo-flags" src="img/flags.png" alt="logo flags">  
                </a>
                
                <nav class="main-nav">
                    <ul>
                        <li><button class="pure-btn login-btn">Zaloguj</button></li>
                        <li><button class="pure-btn signup-btn simple-btn">Rejestracja</button></li>
                    </ul>
                </nav>               
            </div>
            
            <div id="get-to-account-modal" class="get-to-account-modal">
                <div id="get-to-account-box" class="get-to-account-box">

                    <button id="close-btn" class="pure-btn close-btn">&#10006;</button>
                    <div id="login-form" class="login-form">
                        <form id="l-form" action="php/login.php" method="post" autocomplete="off" class="get-to-account-form"> 
                            <h1>Logowanie</h1>              
                            <label>Email</label>
                            <input type="email" value="" placeholder="Podaj Email" name="email" class="text-field" required>
                            <label>Hasło</label>
                            <input type="password" value="" placeholder="Podaj hasło" name="password" class="text-field" required>
                            <p class="remember-me"><input type="checkbox" checked="checked" class="remember-me-cb"> Zapamiętaj mnie</p>                              
                            <button id="login-act" type="submit" class="pure-btn ess-btn normal-btn submit-btn">Zaloguj</button>
                        </form>   

                        <button id="forgot-password" class="pure-btn forgot-password">Zapomniałeś/aś hasła?</button>
                        <button id="no-account" class="pure-btn no-account">Nie masz konta? <span>Zarejestruj się</span></button>
                        <p class="errors-info"></p>
                    </div>

                    <div id="signup-form" class="signup-form">
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

                    <div id="forgot-password-form" class="forgot-password-form">
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
        <main>
            <section class="intro">
                <div class="intro-box">
                  <div class="intro-text">
                        <h2>Co to jest?</h2>
                        <p>Czasnaslowka.pl to strona służąca do nauki słówek i utrwalania ich, z dowolnych języków na świecie.</p>
                        <p>Uczysz się na kartkówkę z niemieckiego, oglądasz serial lub czytasz książkę po angielsku i chcesz zapamiętać nieznane Ci wyrazy?</p>          
                        <p>W tym miejscu uda Ci się tego dokonać.</p>
                        <p>A więc, czas na słówka!</p>
                    </div>
                </div>
                <img class="snake" src="img/snake.png">
            </section>
            
            <section class="instructions">
                <div class="container instructions-box">
                    <div class="inst-element">
                        <h2 class="inst-title">Dodaj swój nowy, własny zestaw słówek.</h2>                           
                        <div class="inst-img inst-img1">                    
                        </div>       
                    </div>
                    <div class="inst-element">
                        <h2 class="inst-title">Wybierz nazwę, język oraz wypisz słówka do nauki.</h2>                           
                        <div class="inst-img inst-img2">                    
                        </div>       
                    </div>
                    <div class="inst-element">
                        <h2 class="inst-title">I zacznij powtarzać słówka, aż żadne nie będzie Ci obce.</h2>                         
                        <div class="inst-img inst-img3">                    
                        </div>       
                    </div>
                </div>
            </section>
        </main>
        
        <section class="cta">
            <div class="container cta-box">
                <button class="pure-btn ess-btn login-cta login-btn">Zaloguj</button>
                <button class="pure-btn ess-btn normal-btn signup-cta signup-btn">Rejestracja</button>
            </div>
        </section>
        
        <footer>
            <div class="container footer-box">
                <p class="footer-element">czasnaslowka@az.pl</p>
                <p class="footer-element">regulamin</p>  
                <img class="footer-element" src="img/logoNoFlagsWhite.png">
            </div>
        </footer>

        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/loginRegisterForms.js"></script>
        <script>
            $("#no-account").on('click', function() {
                if($(document).width()<650) {
                    window.location.href = "registerPage.php";
                }    
            }); 
            
            $(window).resize(function() {
                if($(document).width()<650) {
                    $("#link-send").removeClass("active");
                    $("#link-send").removeClass("active");
                }
            });
        </script>
    </body>
</html>