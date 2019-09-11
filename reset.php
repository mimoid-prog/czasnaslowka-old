<?php
require 'php/database.php';
session_start();

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) ){
    
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE email=? AND hash=?");
    $stmt->bind_param("ss", $_GET['email'], $_GET['hash']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    
    if ($result->num_rows == 0){ 
        $_SESSION['title'] = "Błąd!";
        $_SESSION['message'] = "Link uszkodzony.";
        header("location: http://czasnaslowka.pl/message.php");
        exit;
    }
}
else {
    $_SESSION['title'] = "Błąd!";
    $_SESSION['message'] = "Link uszkodzony.";
    header("location: http://czasnaslowka.pl/message.php");
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
        <link rel="stylesheet" href="css/index.css">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <style>
            .change-password-form {
                padding: 40px;
                background-color: #FFFFFF;
                width: 475px;
                margin: 0 auto;
                text-align: center;
            }
            
            .box {
                padding: 40px 0;
            }

            .logo-flags {
                margin: 20px 0;
            }
            
            @media (min-width: 500px) {
                .header-box {
                    flex-direction: column;
                }

            }
        </style>
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

            <div id="change-password-form" class="change-password-form">
                <form id="c-form" action="php/reset_password.php" method="post" autocomplete="off" class="get-to-account-form">  
                    <h1>Zmiana hasła</h1>
                    <label>Hasło</label>
                    <input type="password" placeholder="Podaj hasło" name="newpassword" class="text-field" required>
                    <label>Powtórz hasło</label>
                    <input type="password" placeholder="Podaj hasło" name="confirm-password" class="text-field" required>
                    
                    <input type="hidden" name="email" value="<?= $_GET['email'] ?>">    
                    <input type="hidden" name="hash" value="<?= $_GET['hash'] ?>"> 
                    
                    <button id="change-password-act" type="submit" class="pure-btn ess-btn normal-btn">Zatwierdź</button>
                </form>
                <p class="errors-info"></p>
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
