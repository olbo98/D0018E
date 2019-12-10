<?php
session_start();

include "functions.php";

$conn = connectToDB();

$query = "SELECT * FROM Users WHERE Username = ? AND Password = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $username, $password);
$username = $_POST["username"];
$password = $_POST["password"];
$stmt->execute();
$result = $stmt->get_result();
if(!($row = $result->fetch_assoc())){
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