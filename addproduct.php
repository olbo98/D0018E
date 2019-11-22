<?php
#Page for adding to shop
session_start();

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

$query = "INSERT INTO `basketItems`(`basketID`, `productID`, `quantity`) VALUES(".$_POST['basketID'].", ".$_POST["productID"]." , 1)";
$conn->query($query);


$query = "UPDATE Products SET quantity = quantity - 1 WHERE productID = ".$_POST["productID"]." and quantity > 0 ";
$conn->query($query);

header("Location: http://utbweb.its.ltu.se/~albved-7/Products/test/product.php?productID=".$_POST["productID"]);
?>