<?php
$host = "localhost";
$username = "root";
$password = "";
$table = "respos2";

$connect = new mysqli($host, $username, $password, $table) or die ('Cannot connect to database');
mysqli_set_charset($connect, 'UTF8');

if($connect === false){ 
die("ERROR: Could not connect. " . mysqli_connect_error()); 
}
?>