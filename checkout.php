<?php
include "functions.php";
session_start();

$conn = connectToDB();

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
    
$query = "SELECT * FROM basketItems WHERE basketID = ".$_SESSION["basketID"]; 
	 
$result = $conn->query($query);

$allQueriesToInsert = array();
$row = $result->fetch_all(MYSQLI_ASSOC);
for($i = 0; $i < count($row); $i = $i + 1){
    $queryGetSalePrice = "SELECT price FROM Products WHERE productID = ".$row[$i]["productID"];
    $result = $conn->query($queryGetSalePrice);
    $salePriceRow = $result->fetch_assoc();
    $salePrice = $salePriceRow["price"];
	$allQueriesToInsert[$i] = "INSERT INTO orderItems (orderID, productID, quantity, price) VALUES (".$orderID.",".$row[$i]["productID"].",".$row[$i]["quantity"].",".$salePrice.")";
}

$conn->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

$addOrder1 = "INSERT INTO Orders (orderID, userID, orderDate, orderStatus) VALUES (".$orderID.",".$_SESSION["userID"].", '".date("y-m-d")."', 'incomplete')";
if(!$conn->query($addOrder1)){
    echo "order fuk";
}

for($ix = 0; $ix < count($allQueriesToInsert); $ix = $ix + 1){
    if(!$conn->query($allQueriesToInsert[$ix])){
        echo "dumb bitch";
        exit();
    }
}

$del = "DELETE FROM basketItems WHERE basketID = ".$_SESSION["basketID"];
$conn->query($del);

if(!$conn->commit()){
    echo "Register failed";
    exit();
}

header("Location: buypage.php");
?>