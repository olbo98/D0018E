<?php
session_start();

include "functions.php";

$conn = connectToDB();

$username = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT * FROM Users WHERE Username ='".$username."' AND Password ='".$password."'";
$result1 = $conn->query($query);
if(!($row = $result1->fetch_assoc())){
    echo "login failed";
    session_destroy();
    header("Location: login.php");
}else{
    $query = "SELECT basketID FROM Baskets WHERE userID=".$row["userID"];
    $result2 = $conn->query($query);
    $row2 = $result2->fetch_assoc();
    
    $_SESSION["username"] = $username;
    $_SESSION["userID"] = $row["userID"];
    $_SESSION["basketID"] = $row2["basketID"];
    header("Location: index.php");
}
?>