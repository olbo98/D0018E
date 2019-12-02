<!doctype html>
<?php
session_start();

include "functions.php";

if(!checkUserLoginStatus())
{
    header("Location: login.php");
}

$conn = connectToDB();

$queryProductOrder = "SELECT Orders.userID, Orders.orderDate, Orders.orderStatus, orderItems.*, Products.name, Products.quantity, Products.price FROM ((Orders INNER JOIN orderItems ON Orders.orderID = orderItems.orderID) INNER JOIN Products ON orderItems.productID = Products.productID) WHERE userID=".$_SESSION["userID"]." ORDER BY orderDate DESC";

$resultQueryProductOrder = $conn->query($queryProductOrder);
$orderRow = $resultQueryProductOrder->fetch_assoc();

$queryCountOrders = "SELECT COUNT(orderItems.itemID), Orders.orderID FROM (Orders INNER JOIN orderItems ON Orders.orderID = orderItems.orderID) WHERE userID=".$_SESSION['userID']." GROUP BY(Orders.orderID)";

$resultCountOrders = $conn->query($queryCountOrders);



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
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
		<a class="navbar-brand" href="index.php" style="font-size: 25px;"><img src="Bilder/QTicon.jpg" width="30" height="30" class="d-inline-block align-top" alt="">  Home</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<a class="nav-link" href="movies.php" style="font-size: 20px;">Movies</a>
			<a class="nav-link" href="orders.php" style="font-size: 20px;">Order</a>
		</ul>
		</div>
  
		<ul class="navbar-nav">
			<a class="nav-link" href="basket.php" style="font-size: 20px;">Shopping Basket</a>
            <?php
            if(isset($_SESSION["username"])){
                echo '<a class="nav-link" href="logout.php" style="font-size: 20px;"> Log out</a>';
            }
            else
            {
                echo '<a class="nav-link" href="login.php" style="font-size: 20px;"> Log in</a>';
            }
            ?>
		</ul>
		</div>
  
    </nav>
    
    <div style="padding-top: 3%;">
    <?php
      while($row = $resultCountOrders->fetch_row()){
          
          $total = 0;
          
          echo '<div class="d-flex order-head">
        <div class="flex-grow-1" style="font-size: 20px;">Order ID: '.$orderRow["orderID"].'</div>
        <div style="font-size: 20px; padding-right: 10px">Date: '.$orderRow["orderDate"].'</div>
    </div>';
          
          echo '<div class="d-flex order-products">
        <div class="orderText1" style="font-size: 17px;">Product</div>
        <div class="orderText2" style="font-size: 17px;">Quantity</div>
        <div class="orderText2" style="font-size: 17px;">Sub-total</div>
    </div>';
          
          for($i=0; $i<$row[0]; $i++){
              $subTotal = $orderRow["quantity"] * $orderRow["price"];
              $total += $subTotal;
    
              echo '<div class="d-flex order-products">
        <div class="orderText1" style="font-size: 17px;">'.$orderRow["name"].'</div>
        <div class="orderText2" style="font-size: 17px;">'.$orderRow["quantity"].'</div>
        <div class="orderText2" style="font-size: 17px;">'.$subTotal.'$</div>
    </div>';
              $orderRow = $resultQueryProductOrder->fetch_assoc();
          }
          
          echo '<div class="d-flex order-products">
        <div class="orderText1" style="font-size: 17px;"></div>
        <div class="orderText2" style="font-size: 17px;"></div>
        <div class="orderText2" style="font-size: 17px;"><b>Total: '.$total.'$</b></div>
    </div>'; 
      }
      
    ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>