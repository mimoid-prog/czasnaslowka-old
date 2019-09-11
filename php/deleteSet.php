<?php 
session_start();
require 'database.php';

$user_id = $_SESSION["id"];

$stmt = $mysqli->prepare("DELETE FROM sets WHERE id = ? AND user_id='$user_id'");
$stmt->bind_param("s", $_GET["data"]);
$stmt->execute();
$stmt->close();

$stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $_GET["data"]);
$stmt->execute();
$stmt->close();

echo "Usunięto!";
?>