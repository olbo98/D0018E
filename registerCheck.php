<?php

include "functions.php";

$conn = connectToDB();

$username = $_POST["username"];
$password = $_POST["password"];

$insertUserQuery = "INSERT INTO Users(username, password) VALUES ('".$username."','".$password."')";

if($conn->query($insertUserQuery)){
    echo "User registerd";
}else{
    echo "Register failed";
}

?>