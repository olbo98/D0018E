<?php
session_start();
$servername = "127.0.0.1";
$username = "98102221";
$password = "98102221";
$dbname = "db98102221";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

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