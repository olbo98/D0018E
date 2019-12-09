<?php
session_start();
if($_SESSION["username"] != "admin" || !isset($_SESSION["username"])){
    header("Location: index.php");
}
include "functions.php";

$conn = connectToDB();



$productID = $_POST["movieToEdit"];
$newPrice = $_POST["newPrice"];

$query = "UPDATE Products SET price = ".$newPrice." WHERE productID =".$productID;



if($newPrice <= 0){
	echo "edit failed<br><brb>";
	echo '<a href="index.php">Back to startpage and try again!</a>';
}else{
	if(!$conn->query($query)){
		echo "edit failed";
		exit();
	}else{
		echo "edit successful<br><br>"; 
		echo '<a href="index.php">Back to startpage</a>';
	}
}
?>