,<?php
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
    header("Location: login.php");
}
$query = "SELECT COUNT(productID) FROM basketItems WHERE basketID = ".$_SESSION["basketID"];
$result = $conn->query($query);
$row = $result->fetch_assoc();
$count = $row["COUNT(productID)"];
if($count <= 0){
    header("Location: basket.php");
    exit();
}
$ordID = "SELECT COUNT(orderID) FROM Orders";
$ordRes = $conn->query($ordID);
$rowORD = $ordRes->fetch_assoc();
$orderID = $rowORD["COUNT(orderID)"] + 1;
$addOrder1 = "INSERT INTO Orders (orderID, userID, orderDate, orderStatus) VALUES (".$orderID.",".$_SESSION["userID"].", '".date("m.d.y")."', 'incomplete')";
if(!$conn->query($addOrder1)){
    echo "fail add ord 1";
}
    
$query = "SELECT * FROM basketItems WHERE basketID = ".$_SESSION["basketID"]; 
	 
$result = $conn->query($query);
while($row = $result->fetch_assoc()){
    $queryGetSalePrice = "SELECT price FROM Products WHERE productID = ".$row["productID"];
    $result = $conn->query($queryGetSalePrice);
    $salePriceRow = $result->fetch_assoc();
    $salePrice = $salePriceRow["price"];
    
	$addOrder2 = "INSERT INTO orderItems (orderID, productID, quantity, price) VALUES (".$orderID.",".$row["productID"].",".$row["quantity"].",".$salePrice.")";
    $conn->query($addOrder2);
}
$del = "DELETE FROM basketItems WHERE basketID = ".$_SESSION["basketID"];
if(!$conn->query($del)){
    echo "fail del";
}
header("Location: buypage.php");
?>