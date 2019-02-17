<?php

$dsn = 'mysql:host=localhost;dbname=clash_of_clans';
$username = 'root';
$password = '';



//    $username = 'D00204250';
//    $password = 'TUXUBoI%';

try
{
    $db = new PDO($dsn, $username, $password);
}
catch (PDOException $e)
{
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
}
?>