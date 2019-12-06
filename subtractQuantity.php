<?php
session_start();
include "functions.php";

$conn = connectToDB();
$query = "SELECT quantity FROM basketItems WHERE basketID =".$_SESSION["basketID"]." AND productID =".$_GET["productID"];

$result = $conn->query($query);
$row = $result->fetch_assoc();
$quantity = $row["quantity"];
if($quantity == 1){
    header("Location: removeproduct.php?productID=".$_GET["productID"]);
    exit();
}else{
    $conn->autocommit(FALSE);

    $queryUpdateBasket = "UPDATE basketItems SET quantity = quantity - 1 WHERE basketID =".$_SESSION["basketID"]." AND  productID=".$_GET["productID"];
    $queryUpdateProducts = "UPDATE Products SET quantity = quantity + 1 WHERE productID =".$_GET["productID"];
    
    $conn->query($queryUpdateBasket);
    $conn->query($queryUpdateProducts);
    if(!$conn->commit()){
        echo "error";
    }else{
        $conn->close();
        header("Location: basket.php");
    }
}

?>