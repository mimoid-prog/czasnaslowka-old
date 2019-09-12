<?php 
	$pass = "mojehaslo";
	$conn = new mysqli('localhost', 'root', $pass);
	$createDB = "CREATE DATABASE accounts2";
	$conn->query($createDB);
	$conn->close();
			
	$db_conn = new mysqli('localhost', 'root', $pass, 'accounts2');
			
	if($db_conn->connect_error) die("Nie udało połączyć się z bazą danych. <br>");
	else {
		$createTable1 = "CREATE TABLE sets (
		id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		name_of_set VARCHAR (50),
		language_of_set VARCHAR (50),
		user_id INT(11)
		)";
		
		$createTable2 = "CREATE TABLE users (
		id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		email VARCHAR (100),
		password VARCHAR (100),
		hash VARCHAR(32),
		active TINYINT(1)
		)";
		
		$createTable3 = "CREATE TABLE words(
		language1 VARCHAR(30),
		language2 VARCHAR(30),
		set_id INT(11),
		user_id INT(11)
		)";
			
		$db_conn->query($createTable1);	
		$db_conn->query($createTable2);	
		$db_conn->query($createTable3);	
	}
			
	$db_conn->close();
?>