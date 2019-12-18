<?php
session_start();
include "functions.php";
$conn = connectToDB();
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Result: <br>";
$input = $_GET["input"];
$query = "SELECT name, productID FROM Products WHERE name LIKE '%".$input."%'";
if(!$result = $conn->query($query)){
    echo " none";
}

while($row = $result->fetch_assoc()){
    echo '<a href="product.php?productID='.$row["productID"].'">'.$row["name"].'</a><br>';
}

?>

<a href="index.php" class="btn btn-lg btn-secondary">Go to startpage</a>