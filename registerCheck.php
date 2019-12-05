<?php

include "functions.php";

$conn = connectToDB();

$username = $_POST["username"];
$password = $_POST["password"];

$countUsersQuery = "SELECT COUNT(userID) FROM Users";
$result = $conn->query($countUsersQuery);
$row = $result->fetch_assoc();
$userID = $row["COUNT(userID)"] + 1;

$conn->autocommit(FALSE);

$insertUserQuery = "INSERT INTO Users(username, password) VALUES ('".$username."','".$password."')";
$createBasketQuery = "INSERT INTO Baskets(userID) VALUES(".$userID.")";

$conn->query($insertUserQuery);
$conn->query($createBasketQuery);

if(!$conn->commit()){
    echo "Register failed";
    exit();
}

$conn->close();

?>