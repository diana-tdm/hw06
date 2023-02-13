<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";

$time_out = time() - 60 * 15 ;
$query = $db -> query("SELECT * FROM online WHERE time_out > $time_out");

foreach($query as $row){
    $date = date("Y-m-d H:i:s",$row['time_out']);
    echo "<div> <b> $row[login] : </b> $date </div>";
}
?>    