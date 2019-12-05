<?php

include "functions.php";

$conn = connectToDB();
$conn->autocommit(FALSE);

$username = $_POST["username"];
$password = $_POST["password"];

$insertUserQuery = "INSERT INTO Users(username, password) VALUES ('".$username."','".$password."')";

$userIDQuery = "SELECT userID FROM Users WHERE username ='".$username."'";
$result = $conn->query($userIDQuery);
$row = $result->fetch_assoc();
$userID = $row["userID"];

$createBasketQuery = "INSERT INTO Baskets(userID) VALUES(".$userID.")";
if($conn->query())

?>