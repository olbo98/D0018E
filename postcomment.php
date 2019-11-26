<?php

session_start();

include "functions.php";

if(!checkUserLoginStatus())
{
    header("Location: login.php");
}

$servername = "127.0.0.1";
$username = "98102221";
$password = "98102221";
$dbname = "db98102221";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT userID FROM Comments WHERE userID = ".$_SESSION["userID"];
$result = $conn->query($query);
$row = $result->fetch_assoc();

$date = date("Y/m/d");

$query = "INSERT INTO `Comments`(`userID`, `date`, `commentText`, `productID`)VALUES(".$_SESSION['userID'].", '".$date."', '".$_POST['commentText']."', ".$_POST["productID"].")";
$conn->query($query);

header("Location: product.php?productID=".$_POST["productID"]);

?>