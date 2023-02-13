<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";

$db -> query("INSERT INTO msg (login,msg) VALUES('$_SESSION[login]','$_POST[msg]')");


?>  