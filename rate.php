<?php
session_start();

include "functions.php";

if(!checkUserLoginStatus())
{
    header("Location: login.php");
	exit();
}

$servername = "127.0.0.1";
$username = "98102221";
$password = "98102221";
$dbname = "db98102221";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "INSERT INTO `Ratings`(`userID`,`productID`, rating) VALUES(".$_SESSION['userID'].", ".$_GET['productID']." , ".$_GET['rating'].")";
$result = $conn->query($query);

header("Location: product.php?productID=".$_GET["productID"]);


?>