<?php
session_start();
require 'database.php'; 
$mysqli->query("SET NAMES 'utf8'");

$user_id = $_SESSION['id'];
$get_sets = $mysqli->query("SELECT id, name_of_set, language_of_set FROM sets WHERE user_id='$user_id'") or die($mysqli->error());

if($get_sets->num_rows>0){
    while($row = $get_sets->fetch_assoc()){
        $sets_to_load[] = $row;
    }
    echo json_encode($sets_to_load);
}
?>
