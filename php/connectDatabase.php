<?php 
    
$database = "hoho";
$serverName = "localhost";
$userName = "root";
$password = "";


$connect = new mysqli($serverName, $userName, $password, $database);

if($connect->connect_error)
{
    die("Connection Failed " . $connect->connect_error);
}

?>

