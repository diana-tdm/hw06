<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";

$query = $db -> query("SELECT * FROM (SELECT * FROM msg ORDER BY id DESC LIMIT 20) as res ORDER BY id");
foreach($query as $row){
    echo "<div> <b>$row[login]:</b> $row[msg] </div>";
}
?>  