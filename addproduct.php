<?php
#Page for adding to shop
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
$query = "SELECT basketID FROM Baskets WHERE basketID = ".$_SESSION["basketID"];
$result = $conn->query($query);
$row = $result->fetch_assoc();

$query = "INSERT INTO `basketItems`(`basketID`, `productID`, `quantity`) VALUES(".$_SESSION['basketID'].", ".$_POST["productID"]." , 1)";
$conn->query($query);


$query = "UPDATE Products SET quantity = quantity - 1 WHERE productID = ".$_POST["productID"]." and quantity > 0 ";
$conn->query($query);

header("Location: product.php?productID=".$_POST["productID"]);
?>