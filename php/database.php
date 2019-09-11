<?php
$host = 'localhost';
$user = 'root';
$pass = 'mojehaslo';
$db = 'accounts';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
?>
