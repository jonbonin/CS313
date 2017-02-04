<?php

$dsn = 'mysql:host=localhost; dbname=bononeon_c4_society';
$username = 'bononeon_visitor';
$password = 'Tq2[5Ra69,$T';

try {
//    echo "trying to fix";
    $db = new PDO($dsn, $username, $password);
//    echo "ths the second";
} catch (PDOException $e) {
    $error_message = "database error. Please type in correct info again";
//    var_dump($e);
    exit();
}