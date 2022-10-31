<?php

// echo time(), "<br>";
// echo microtime(true), "<br>";

$start = microtime(true);

$arr = [];

// for($i = 0; $i < 1e7; $i++){
//     $arr[] = md5($i);
// } 

for($i = 0; $i < 1e2; $i++){
    $arr[] = password_hash($i,PASSWORD_DEFAULT);
}

$end = microtime(true);
$result = $end - $start;
echo $result; 