<?php


$server_name='localhost';
$dbname='library';
$server_port='3307';
$server_user="parsa1";
$server_pass='1068';
global $conn;
try {

    $conn = new PDO("mysql:host=$server_name;port=$server_port;dbname=$dbname",$server_user,$server_pass);
    $conn-> setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

//    $user_name='parsa';
//    $sql='INSERT INTO user (id,user_name,user_last_name,user_email,user_password) VALUES (NULL,,user_lastname,user_email,user_password)';
//    $conn-> exec($sql);
}
catch(PDOException $conn_failed) {
    echo $conn_failed->getMessage();
}

