<?php
function connectToDB()
{
    $servername = "127.0.0.1";
    $username = "98102221";
    $password = "98102221";
    $dbname = "db98102221";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
        return $conn;
    }
}

function checkUserLoginStatus()
{
    if(isset($_SESSION["username"]))
    {
        return true;
    }
    else
    {
        return false;
    }
}
?>