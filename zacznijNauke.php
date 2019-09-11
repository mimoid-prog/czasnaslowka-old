<?php
session_start();

if ( $_SESSION['logged_in'] != 1 ) {
    $_SESSION['title'] = "Błąd!";
    $_SESSION['message'] = "Zaloguj się zanim wejdziesz na swój profil.";
    header("location: message.php");
    exit;
}
?>

<!doctype html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="CzasNaSlowka.pl to strona służąca do nauki słówek z dowolnych języków"/>
        <meta name="keywords" content="czasnaslowka.pl, czasnaslowka, słówka, nauka słówek, nauka języków, angielskie słówka, niemieckie słówka, rosyjskie słówka"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CzasNaSlowka.pl</title>
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,500&amp;subset=latin-ext" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">   
        <link rel="stylesheet" href="css/style.css"> 
        <link rel="stylesheet" href="css/zacznijNauke.css"> 
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    </head>
    <body>
        <header>
            <div class="container box header-box">
                <a href="http://czasnaslowka.pl/">
                    <img class="logo-full" src="img/logo.png" alt="logo full">
                    <img class="logo-title" src="img/logoNoFlags.png" alt="logo title">
                    <img class="logo-flags" src="img/flags.png" alt="logo flags"> 
                </a>

                <nav class="main-nav">
                    <ul>
                        <li><a href="zacznijNauke.php" class="pure-btn">Zacznij naukę</a></li>
                        <li><a href="mojeSlowka.php" class="pure-btn">Moje słówka</a></li>
                        <li><a href="#" class="pure-btn">Mój profil</a></li>
                        <li><a href="php/logout.php" class="pure-btn logout">Wyloguj</a></li>
                    </ul>
                </nav>         
            </div>
        </header>
        
        <main class="main-box">
            <section class="start-learning">
                <div class="container box start-learning-box">
                    <div class="learning-preferences">
                        <div class="choose-set-of-words">
                            <h2 class="banner-normal banner-small">Wybierz zestaw słówek</h2>
                            <select name="sets-to-choose">
                            </select>
                        </div>

                        <div class="way-of-learning">
                            <h2 class="banner-normal banner-small">Sposób</h2>
                            <select name="ways">
                                <option value="with-writing">Z pisaniem</option>
                                <option value="without-writing">Bez pisania</option>
                            </select>
                        </div>

                        <div class="start-box">
                            <button id="start" class="pure-btn reverse-btn start-button">START</button>
                        </div> 
                    </div>

                   <div class="give-and-see-answer-box">
                        <div class="give-answer-box">
                               <p id="others-words" class="others-words"></p>
                                <div class="random-word-box">
                                    <p id="random-word" class="random-word"></p>
                                </div>

                                <div id="with-writing" class="give-answer">
                                    <div class="write-answer-box">
                                        <input name="answer" class="write-answer pure-btn" type="text">
                                    </div>
                                    <button id="check-btn" class="pure-btn check-btn">sprawdź</button>
                                    <p>enter</p>
                                </div>

                                <div id="without-writing" class="give-answer2">
                                    <button id="known-btn" class="pure-btn known-btn">znam</button>
                                    <button id="unknown-btn" class="pure-btn unknown-btn">nie znam</button>  
                                    <div class="keys">
                                        <div><p>enter</p></div>                        
                                        <div><p>ctrl</p></div>   
                                    </div>                               
                                </div>
                        </div>

                        <div class="answers-box">
                           <p>Odpowiedzi:</p>
                            <ul id="answers" class="answers">
                            </ul>
                        </div>
                    </div>
                    
                </div>              
            </section>      
             
            <section class="information">
                <div class="container box information-box">
                    <h1 class="banner banner-reverse result">Wyniki</h1>
                      <div class="chart-and-timer">
                           <div class="chart-box">
                                <div id="piechart"></div>
                            </div>

                            <div id="timer" class="timer">
                                <p class="minutes"></p>
                                <p class="seconds"></p>
                            </div>
                    </div>
                </div>
            </section>
        </main>
        
        <footer>
            <div class="container footer-box">
                <p class="footer-element">czasnaslowka@az.pl</p>
                <p class="footer-element">regulamin</p>  
                <img class="footer-element" src="img/logoNoFlagsWhite.png">
            </div>
        </footer>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="js/loadSets2.js"></script>
        <script src="js/startLearning.js"></script>
    </body>
</html>