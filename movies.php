<!DOCTYPE html>
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

?>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="Test.css">
  <meta charset="utf-8">
  <meta <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Test.css">
	<link rel="short icon" href="Bilder/swede.png">
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
            <form method="get" action="search.php"> 
                <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="input">
                <button type="submit">Submit</button>
            </form>
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
            
            if(isset($_SESSION["username"]) && $_SESSION["username"] == "admin"){
                echo '<a class="nav-link" href="editProduct.php" style="font-size: 20px;">...</a>';
            }
            ?>
		</ul>
		</div>
  
    </nav>
<div class="images">
	<a href="product.php?productID=1"><img class="movies1" src="Bilder/IB.jpg" alt="Movie1" ></a>
	<a href="product.php?productID=3"><img class="movies2" src="Bilder/pulpfiction.jpg" alt="Movie2"></a>
	<a href="product.php?productID=2"><img class="movies4" src="Bilder/killbill.jpg" alt="Movie3"></a>
	<a href="product.php?productID=4"><img class="movies3" src="Bilder/django.jpg" alt="Movie4"></a>
	<a href="product.php?productID=5"><img class="movies5" src="Bilder/Hollywood.jpg" alt="Movie5"></a>
</div>

</body>
</html>