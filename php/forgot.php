<?php 
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{   
    $email = $mysqli->escape_string($_POST['email']);
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $_POST["email"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows == 0){ 
        echo "Użytkownik z takim emailem nie istnieje.";
    }
    else {
        $response = $result->fetch_assoc();
        
        $email = $_POST["email"];
        $hash = $response['hash'];

        $to = $email;
        $subject = 'CzasNaSlowka.pl - zmiana hasła';
        $message_body = '
            Cześć,

            Wciśnij link poniżej, aby zmienić swoje hasło:

            http://czasnaslowka.pl/reset.php?email='.$email.'&hash='.$hash;  

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: <kontakt@czasnaslowka.pl>' . "\r\n";

        mail($to,$subject,$message_body,$headers);

        echo "send";
  }
}
?>
