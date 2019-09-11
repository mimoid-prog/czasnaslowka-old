<?php
session_start();

if ($_SESSION['logged_in'] != 1) {
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,500,700&amp;subset=latin-ext" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <link rel="stylesheet" href="css/style.css">   
        <link rel="stylesheet" href="css/mojeSlowka.css">   
    </head>

    <body>
        <header>
            <div class="container box header-box">
                <a href="http://czasnaslowka.pl">
                    <img class="logo-full" src="img/logo.png" alt="logo full">
                    <img class="logo-title" src="img/logoNoFlags.png" alt="logo title"> 
                    <img class="logo-flags" src="img/flags.png" alt="logo flags">  
                </a> 
                       
                <nav class="main-nav">
                    <ul>
                        <li><a href="zacznijNauke.php" class="pure-btn">Zacznij naukę</a></li>
                        <li><a href="mojeSlowka.php" class="pure-btn">Moje słówka</a></li>
                        <li><a href="#" class="pure-btn">Mój profil</a></li>
                        <li><a href="php/logout.php" class="pure-btn simple-btn">Wyloguj</a></li>
                    </ul>
                </nav>         
            </div>
        </header>
        
        <main class="main-box">
            <section class="my-words">
                <div class="container box my-words-box">
                    <h1 class="banner banner-normal">Moje zestawy słówek</h1>

                    <ul id="list-of-sets" class="list-of-sets">
  
                    </ul>
                    
                    <button id="add-new-set" class="pure-btn ess-btn reverse-btn add-new-set">Dodaj nowy</button>
                    
                    <div id="delete-set-confirm">
                        <div class="speech-bubble">
                            <p>Czy na pewno chcesz usunąć ten zestaw?</p>
                            <a href="deleteSet.php" id="delete-set-btn" class="pure-btn delete-set-btn">Usuń</a>
                            <button id="cancel-delete-set-btn" class="pure-btn cancel-delete-set-btn">Anuluj</button>
                        </div>
                    </div>  
                </div>
            </section>

            <section id="edit-words" class="edit-words">
                <div id="edit-words-box" class="container box edit-words-box">
                    <form id="save-set" action="saveSet.php" method="POST">
                        <h1 id="edit-words-title" class="banner banner-reverse">Tworzenie nowego zestawu</h1>
                        <ul class="edit-words-elements">
                            <li class="edit-words-name">
                                <p class="edit-words-element-title">Nazwa zestawu:</p>
                                <input name="name-of-set" type="text" spellcheck="false" required>
                            </li>

                            <li class="edit-words-language">
                                <p class="edit-words-element-title">Wybierz język:</p>
                                <select name="language-of-set" required>
                                    <option value="united-kingdom">angielski</option>
                                    <option value="germany">niemiecki</option>
                                    <option value="russia">rosyjski</option>
                                    <option value="spain">hiszpański</option>
                                    <option value="france">francuski</option>
                                    <option value="italy">włoski</option>
                                    <option value="norway">norweski</option>
                                    <option value="sweden">szwedzki</option>
                                    <option value="finland">fiński</option>
                                    <option value="denmark">duński</option>
                                    <option value="netherlands">holenderski</option>                                       
                                    <option value="belarus">białoruski</option>
                                    <option value="bułgaria">bułgarski</option>
                                    <option value="china">chiński</option>
                                    <option value="croatia">chorwacja</option>
                                    <option value="czech-republic">czeski</option>
                                    <option value="greece">grecki</option>
                                    <option value="india">hindi</option>
                                    <option value="iceland">islandzki</option>
                                    <option value="japan">japoński</option>
                                    <option value="south-korea">koreański</option>
                                    <option value="latvia">łotweski</option>
                                    <option value="lithuania">litewski</option>
                                    <option value="portugal">portugalski</option>
                                    <option value="romania">rumuński</option>
                                    <option value="scotland">szkocki</option>
                                    <option value="slovakia">słowacki</option>
                                    <option value="slovenia">słoweński</option>
                                    <option value="turkey">turecki</option>
                                    <option value="tukraine">ukraiński</option>
                                    <option value="hungary">węgierski</option>
                                </select>
                            </li>

                            <li class="edit-words-words">
                               <div class="edit-words-words-title-box">
                                   <p class="edit-words-element-title edit-words-words-title">Język obcy:</p>
                                   <p class="edit-words-element-title edit-words-words-title">Język polski:</p>
                               </div>           
                                <ul id="words" class="words">
                                    <li id="word0"><input class="foreign-word"><input class="polish-word"></li>
                                    <li id="word1"><input class="foreign-word"><input class="polish-word"></li>
                                    <li id="word2"><input class="foreign-word"><input class="polish-word"></li>
                                    <li id="word3"><input class="foreign-word"><input class="polish-word"></li>
                                    <li id="word4"><input class="foreign-word"><input class="polish-word"></li>
                                    <li id="word5"><input class="foreign-word"><input class="polish-word"></li>
                                    <li id="word6"><input class="foreign-word"><input class="polish-word"></li>
                                    <li id="word7"><input class="foreign-word"><input class="polish-word"></li>
                                </ul>                      
                            </li>
                        </ul>
                            <div class="save-and-cancel">
                                <button type="submit" id="save" class="pure-btn ess-btn normal-btn">Zapisz</button>
                                <button type="reset" id="cancel" class="pure-btn ess-btn reverse-btn">Anuluj</button>
                            </div>

                            <div class="information">
                                <div class="loader"></div>
                                <p class="set-errors-info">Example</p>
                            </div>
                    </form>
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
        
        <input style="position:absolute; left:0; top:0; width:15px; height:15px; opacity: 0;" id="xD" type='file' accept='text/plain'>  
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/loadSets.js"></script>
        <script src="js/editSet.js"></script>
        <script src="js/deleteSet.js"></script>
    </body>
</html>