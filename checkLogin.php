<?php
session_start();

include "functions.php";

$conn = connectToDB();

$username = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT * FROM Users WHERE Username ='".$username."' AND Password ='".$password."'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

$query = "SELECT basketID FROM Baskets WHERE userID=".$row["userID"];
$result = $conn->query($query);
$row2 = $result->fetch_assoc();

if($result->num_rows == 0)
{
    echo "login failed";
    session_destroy();
    header("Location: http://utbweb.its.ltu.se/~olobou-7/shop/login.php");
}
else
{
    $_SESSION["username"] = $username;
    $_SESSION["userID"] = $row["userID"];
    $_SESSION["basketID"] = $row2["basketID"];
    header("Location: http://utbweb.its.ltu.se/~olobou-7/shop/index.php");
}
?>