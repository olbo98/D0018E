<!doctype html>
<?php
session_start();

include "functions.php";

/*if(!checkUserLoginStatus())
{
    header("Location: http://utbweb.its.ltu.se/~olobou-7/shop/login.php");
}*/

$conn = connectToDB();

/*$query = "SELECT * FROM orderItems WHERE orderID IN(SELECT orderID FROM Orders where userID IN(SELECT userID FROM Users WHERE username ='".$_SESSION["username"]."'))";

$orderItems = $conn->query($query);
$allOrderItems = $orderItems->fetch_all(MYSQLI_ASSOC);

$query2 = "SELECT * FROM Products WHERE productID IN(";
for($i = 0; $i < count($allOrderItems); $i++){
    if($i == count($allOrderItems)-1){
        $query2 = $query2.$allOrderItems[$i]["productID"];
    }else{
        $query2 = $query2.$allOrderItems[$i]["productID"].",";
    }
}
$query2 = $query2.")";

echo $query2;

$products = $conn->query($query2);
$allProducts = $products->fetch_all(MYSQLI_ASSOC);*/

$query3 = "SELECT * FROM Orders WHERE userID IN(SELECT userID FROM Users WHERE username ='".$_SESSION["username"]."')";

$orders = $conn->query($query3);
$allOrders = $orders->fetch_all(MYSQLI_ASSOC);

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="ordersStyle.css" type="text/css">

    <title>QT</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
            </ul>
        </div>
    </nav>
      
    <div class="d-flex order-head">
        <div class="flex-grow-1" style="font-size: 20px;">Order ID</div>
        <div style="font-size: 20px; padding-right: 50px">Datum</div>
        <div style="font-size: 20px;">Pris</div>
    </div>
    <div class="d-flex order-products">
        <div class="flex-grow-1" style="font-size: 17px;">Product</div>
        <div style="font-size: 17px; padding-right: 50px">Quantity</div>
        <div style="font-size: 17px;">sub-total</div>
    </div>
    <div class="d-flex order-products">
        <div class="orderText1" style="font-size: 17px;">Product</div>
        <div class="orderText2" style="font-size: 17px;">Quantity</div>
        <div class="orderText2" style="font-size: 17px;">sub-total</div>
    </div>
    
    <?php
        
      for($j = 0; $j<count($allOrders); $j++){
          
          $totaltPris = 0;
          
          $queryOrderItems = "SELECT * FROM orderItems WHERE orderID =".$allOrders[$j]["orderID"];
          $result = $conn->query($queryOrderItems);
          $allOrderItems = $result->fetch_all(MYSQLI_ASSOC);
          
          $queryProducts = "SELECT * FROM Products WHERE productID IN(";
          for($i = 0; $i < count($allOrderItems); $i++){
            if($i == count($allOrderItems)-1){
                $queryProducts = $queryProducts.$allOrderItems[$i]["productID"];
            }else{
                $queryProducts = $queryProducts.$allOrderItems[$i]["productID"].",";
            }
          }
          $queryProducts = $queryProducts.")";
          $productsResult = $conn->query($queryProducts);
          $allProducts = $productsResult->fetch_all(MYSQLI_ASSOC);
          
          for($
              
            echo '<div class="d-flex order-head">
        <div class="flex-grow-1" style="font-size: 20px;">Order ID: '.$allOrders[$j]["orderID"].'</div>
        <div style="font-size: 20px; padding-right: 50px">Datum: '.$allOrders[$j]["orderDate"].'</div>
        <div style="font-size: 20px;">Pris</div>
            </div>';
          
          for($i=0; $i<count($allProducts); $i++){
          echo '<div class="d-flex order-products">
        <div class="orderText1" style="font-size: 17px;">'.$allProducts[$i]["name"].'</div>
        <div class="orderText2" style="font-size: 17px;">'.$allOrderItems[$i]["quantity"].'</div>
        <div class="orderText2" style="font-size: 17px;">'.$allProducts[$i]["price"]*$allOrderItems[$i]["quantity"].'</div>
            </div>';
        }
      }
      
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>