<?php
session_start();
if($_SESSION["username"] != "admin" || !isset($_SESSION["username"])){
    header("Location: index.php");
}
include "functions.php";

$conn = connectToDB();

$order = $_POST["orderToRemove2"];



$query3 = "SELECT quantity FROM orderItems WHERE orderID =".$order;
$getQuantity = $conn->query($query3);
$row = $getQuantity->fetch_assoc();
$quantity = $row["quantity"];

$conn->autocommit(FALSE);

$query = "DELETE FROM orderItems WHERE orderID =".$order;
$query2 = "DELETE FROM Orders WHERE orderID =".$order;

$addBack = 'UPDATE Products SET quantity = quantity + '.$quantity.' WHERE productID IN(SELECT productID FROM orderItems WHERE orderID = '.$order.')';
$conn->query($addBack);
$conn->query($query);
$conn->query($query2);

if(!$conn->commit()){
	echo "edit failed";
	exit();
}else{
	echo "edit successful<br><br>"; 
	echo '<a href="index.php">Back to startpage</a>';
}

?>