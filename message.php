<?php
session_start();
if(!isset($_SESSION['title']) && empty($_SESSION['title'])){
    header( "location: index.php" );
    exit;
}
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,500,700&amp;subset=latin-ext" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/message.css">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <title>CzasNaSlowka.pl</title>
    </head>
    <body>
       <div>
           <header>
               <div class="container box header-box">
                <a href="http://czasnaslowka.pl/">
                    <img class="logo-full" src="img/logo.png" alt="logo full">
                    <img class="logo-title" src="img/logoNoFlags.png" alt="logo title">
                    <img class="logo-flags" src="img/flags.png" alt="logo flags"> 
                </a>         
               </div>
           </header>

            <div class="message-box">
               <div class="message">
                   <h2>
                       <?php  
                       echo $_SESSION['title']; 
                       ?>
                    </h2>
                    <p>
                        <?php  
                        echo $_SESSION['message']; 
                        ?>
                    </p>
                </div> 
                
                <a href="index.php" class="pure-btn ess-btn normal-btn back-to-home">Home</a>
            </div>
            
           <footer>
               <div class="container footer-box">
                   <p class="footer-element">czasnaslowka@az.pl</p>
                   <p class="footer-element">regulamin</p>  
                   <img class="footer-element" src="img/logoNoFlagsWhite.png">
               </div>
           </footer>
        </div>
    </body>
</html>
