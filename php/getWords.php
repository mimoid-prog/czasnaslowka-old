<?php 
session_start();
require 'database.php';
$mysqli->query("SET NAMES 'utf8'");

$stmt = $mysqli->prepare("SELECT language1, language2 FROM words WHERE set_id=?");
$stmt->bind_param("s", $_POST["setIDdb"]);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

while($row = $result->fetch_assoc()){
    $words[] = $row;
}

echo json_encode($words);
?>