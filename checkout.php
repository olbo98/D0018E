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

$addOrder = "INSERT INTO Orders (userID, orderDate, orderStatus) VALUES ('.$_SESSION["basketID"].', '.$today = date("m.d.y").', 'incomplete')" 
$query = "SELECT * FROM example"; 
	 
$result = mysql_query($query) or die(mysql_error());


while($row = mysql_fetch_array($result)){
	
}


header("Location: buypage.php");
?>