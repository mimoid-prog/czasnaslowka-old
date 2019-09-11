<?php 
session_start();
require 'database.php';

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE email=? AND hash=? AND active='0'");
    $stmt->bind_param("ss", $_GET['email'], $_GET['hash']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    
    if ($result->num_rows==0){
        $_SESSION['title'] = "Błąd!";
        $_SESSION['message'] = "Konto zostało już zweryfikowane lub link jest uszkodzony.";
        header("location: ../message.php");
        exit;
    }
    else {
        $stmt = $mysqli->prepare("UPDATE users SET active='1' WHERE email=?");
        $stmt->bind_param("s", $_GET['email']);
        $stmt->execute();
        $stmt->close();
        
        $_SESSION['title'] = "Sukces!";
        $_SESSION['message'] = "Twoje konto zostało aktywowane.";
        header("location: ../message.php");
        exit;
    }
}
else {
    $_SESSION['title'] = "Błąd!";
    $_SESSION['message'] = "Wprowadzono nieprawidłowe wartości dla weryfikacji konta";
    header("location: ../message.php");
    exit;
}     
?>