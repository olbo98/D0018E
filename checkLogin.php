<?php
session_start();

include "functions.php";

$conn = connectToDB();

$username = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT Username, Password FROM Users WHERE Username ='".$username."' AND Password ='".$password."'";
$result = $conn->query($query);
if($result->num_rows == 0)
{
    echo "login failed";
    session_destroy();
    header("Location: http://utbweb.its.ltu.se/~olobou-7/shop/login.php");
}
else
{
    $_SESSION["username"] = $username;
    header("Location: http://utbweb.its.ltu.se/~olobou-7/shop/index.php");
}
?>