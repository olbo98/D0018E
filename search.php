<?php

include "functions.php";
session_start();
$servername = "127.0.0.1";
$username = "98102221";
$password = "98102221";
$dbname = "db98102221";
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(!checkUserLoginStatus()){
    header("Location: index.php");
}

$input = $_GET["input"];
$query = "SELECT * FROM Products where name = ".$input;


?>

<a href="index.php" class="btn btn-lg btn-secondary">Go to startpage</a>