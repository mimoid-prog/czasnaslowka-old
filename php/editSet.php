<?php 
require 'database.php';
$mysqli->query("SET NAMES 'utf8'");

$stmt = $mysqli->prepare("SELECT name_of_set, language_of_set FROM sets WHERE id=?");
$stmt->bind_param("s", $_POST["setIDdb"]);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
$set = $result->fetch_assoc();

$stmt = $mysqli->prepare("SELECT language1, language2 FROM words WHERE set_id=?");
$stmt->bind_param("s", $_POST["setIDdb"]);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

while( $row = $result->fetch_assoc()){
    $words[] = $row;
}

$set_of_words = array($set, $words);
echo json_encode($set_of_words);

?>