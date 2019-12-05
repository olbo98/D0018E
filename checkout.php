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

$ordID = "SELECT COUNT(orderID) FROM Orders";
$ordRes = $conn->query($ordID);
$rowORD = $ordRes->fetch_assoc();
$orderID = $rowORD["COUNT(orderID)"] + 1;

$addOrder1 = "INSERT INTO Orders (orderID, userID, orderDate, orderStatus) VALUES (".$orderID.",".$_SESSION["userID"].", '".date("m.d.y")."', 'incomplete')";
if(!$conn->query($addOrder1)){
    echo "fail stupid bitch aad ord 1";
}
    
$query = "SELECT * FROM basketItems WHERE basketID = ".$_SESSION["basketID"]; 
	 
$result = $conn->query($query);

while($row = $result->fetch_assoc()){
	$addOrder2 = "INSERT INTO orderItems (orderID, productID, quantity) VALUES (".$orderID.",".$row["productID"].",".$row["quantity"].")";
    $conn->query($addOrder2);
}

$del = "DELETE FROM basketItems WHERE basketID = ".$_SESSION["basketID"];
if(!$conn->query($del)){
    echo "fail stupid bitch del";
}

header("Location: buypage.php");
?>