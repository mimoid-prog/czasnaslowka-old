<?php
require 'database.php';

if ($_POST['password'] == $_POST['confirm-password']) {    
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $_POST['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    
    if($result->num_rows > 0) {
        echo "Użytkownik z takim adresem email już istnieje!";
    }
    else {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $hash = $mysqli->escape_string(md5(rand(0,1000)));
        $stmt = $mysqli->prepare("INSERT INTO users (email, password, hash) VALUES (?,?,'$hash')");
        $stmt->bind_param("ss", $_POST['email'], $password);
        $stmt->execute();
        $stmt->close();

        echo "created";
    }
}else {
    echo "Hasła różnią się od siebie!";
}

?>