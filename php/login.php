<?php
session_start();
require 'database.php';

$stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $_POST['email']);
$stmt->execute();
$result = $stmt->get_result();
$response = $result->fetch_assoc();
$stmt->close();

 if($result->num_rows == 0){
    echo "Użytkownik o takim adresie email nie istnieje!";
}
else {
    $email = $response['email'];
    $passwords = $response['password'];

    if(password_verify($_POST['password'], $response['password'])) {
        $_SESSION['email'] = $email;
        $_SESSION['logged_in'] = true;
        $_SESSION['id'] = $response['id'];

        echo "mojeSlowka.php";
    }
    else {
        echo "Wprowadzono niepoprawne hasło!";
    }       
}
?>