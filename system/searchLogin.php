<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";

$query = $db -> query("SELECT * FROM users WHERE login = '$_POST[login]'");

if($query -> num_rows > 0){
    echo "Login занят!";
}
else{

}
?> 