<?php
session_start();
if($_SESSION["username"] != "admin" || !isset($_SESSION["username"])){
    header("Location: index.php");
}
include "functions.php";

$conn = connectToDB();


$order = $_POST["orderToEdit"];
$orderstatus = $_POST["orderStatus2"];

$query = "UPDATE Orders SET orderStatus = '".$orderstatus."' WHERE orderID =".$order;

if(!$conn->query($query)){
		echo "edit failed";
		exit();
}else{
		echo "edit successful<br><br>"; 
		echo '<a href="index.php">Back to startpage</a>';
}
?>