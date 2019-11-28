<?php
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

$getNum = 'SELECT quantity FROM basketItems WHERE basketID = '.$_SESSION["basketID"].' AND productID = '.$_GET["productID"];

$num = $conn->query($getNum);
$row = $num->fetch_assoc();
$quantity = $row["quantity"];


$remove = 'DELETE FROM basketItems WHERE basketID ='.$_SESSION["basketID"].' AND productID = '.$_GET["productID"];

if(!$conn->query($remove)){
    echo "fail stupid bitch"
}


$add = 'UPDATE Products SET quantity = quantity + '.$quantity.' WHERE productID = '.$_GET["productID"];

header("Location: basket.php");
?>