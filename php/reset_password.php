<?php
require 'database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    if ($_POST['newpassword'] == $_POST['confirm-password']) { 
        if(isset($_POST['hash']) && isset($_POST['email'])){
            $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);

            $stmt = $mysqli->prepare("UPDATE users SET password=?, hash=? WHERE email=?");
            $stmt->bind_param("sss", $new_password, $_POST['hash'], $_POST['email']);
            $stmt->execute();
            $stmt->close();

            $_SESSION['title'] = "Sukces!";
            $_SESSION['message'] = "Zmiana hasła przebiegła pomyślnie.";
            header("location: http://czasnaslowka.pl/message.php"); 
            exit;
        }else {
            $_SESSION['title'] = "Błąd!";
            $_SESSION['message'] = "Spróbuj ponownie.";
            header("location: http://czasnaslowka.pl/message.php");
            exit;
        }
    }
    else {
        $_SESSION['title'] = "Błąd!";
        $_SESSION['message'] = "Hasła różnią się od siebie. Spróbuj ponownie.";
        header("location: http://czasnaslowka.pl/message.php");
        exit;
    }

}
?>