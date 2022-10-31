<?php
$password = "qwerty";
$md5Password = md5($password);
$salt = mt_rand(1000,9999);
echo $salt. "<br>";
$saltPassword = md5($password.$salt);
$hashPassword = password_hash($password,PASSWORD_DEFAULT);


echo $password. "<br>";
echo $md5Password. " (md5)<br>";
echo $saltPassword. " (md5+salt)<br>";
echo $hashPassword. " (password_hash)<br>";

// for($i = 0; $i<10; $i++){
//     echo md5($i), "<br>";    
// }


