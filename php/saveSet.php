<?php
session_start();
require 'database.php';
$mysqli->query("SET NAMES 'utf8'");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['id'];
    $data = json_decode($_POST['data']);
    $name_of_set = $data->nameOfSet;
    $language_of_set = $data->languageOfSet;
    $words_of_set = $data->wordsOfSet;
    $type = $data->type;
    $set_id = 0;
    $message = "";
    
    if($type=="edit"){
        $set_id = $data->setID;
        $stmt = $mysqli->prepare("SELECT * FROM sets WHERE user_id='$user_id' AND id=?");
        $stmt->bind_param("i", $set_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        
        if ($result->num_rows==0) {
            $message = "Błąd! Ten zestaw nie istnieje.";
        }else {
            $set_id = $data->setID;
            $stmt = $mysqli->prepare("UPDATE sets SET name_of_set=?, language_of_set=? WHERE id=?");
            $stmt->bind_param("ssi", $name_of_set, $language_of_set, $set_id);
            $stmt->execute();
            $stmt->close();

            $stmt = $mysqli->prepare("DELETE FROM words WHERE set_id=?");
            $stmt->bind_param("i", $set_id);
            $stmt->execute();
            $stmt->close();
            
            $set_id = $mysqli->real_escape_string($set_id);
        }
    }
    else{
        $stmt = $mysqli->prepare("SELECT * FROM sets WHERE user_id='$user_id' AND name_of_set=? AND language_of_set=?");
        $stmt->bind_param("ss", $name_of_set, $language_of_set);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        
        if ($result->num_rows>0) {
            $message = "Już istnieje taki zestaw!";
        }else {
            $quantity_of_sets = $mysqli->query("SELECT * FROM sets WHERE user_id='$user_id'") or die($mysqli->error());
                       
                $stmt = $mysqli->prepare("INSERT INTO sets (name_of_set,language_of_set,user_id) VALUES (?,?,'$user_id')");
                $stmt->bind_param("ss", $name_of_set, $language_of_set);
                $stmt->execute();
                $stmt->close();
                $set_id = $mysqli->insert_id;
            
        }
    }
    
    if(!$message) {
        $words_sql = "INSERT INTO words (language1,language2,set_id,user_id) VALUES ";
        $quantity_of_words = count($words_of_set);  

        for($i=0; $i<$quantity_of_words; $i++) {
            if($i%2!=0) {
                $language2 = $words_of_set[$i];
                $language2 = $mysqli->real_escape_string($language2);
                $words_sql .= "'$language2','$set_id','$user_id')";
                if($i<$quantity_of_words-1) {
                    $words_sql .= ", ";
                }
            }
            else {
                $language1 = $words_of_set[$i];
                $language1 = $mysqli->real_escape_string($language1);
                $words_sql .= "('$language1',";
            }
        }

        if($mysqli->query($words_sql)){
            $save = "Zapisano!";
            $sets = array($set_id,$name_of_set,$language_of_set,$save);
            echo json_encode($sets);
        }else {
            echo "Błąd wprowadzania słów do bazy!";
        }
    }else {
        echo json_encode($message);
    }

}
?>