<!DOCTYPE html>
<?php
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
</head>
<body>

<!--<div class="container">
	<nav class="navbar navbar-expand bg-dark navbar-dark fixed-top justify-content-center">
		<div class="buttons">
			<button type="button" class="btn btn1 btn-dark btn-lg">Movies</button>
			<button type="button" class="btn btn-dark btn-lg">Order</button>
			<button type="button" class="btn btn-dark btn-lg">Shopping Basket</button>
			<button type="button" class="btn btn-dark btn-lg">Log in</button>
		</div>
	</nav>
</div>-->
<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
		<a class="navbar-brand" href="#" style="font-size: 25px;"><img src="QTicon.jpg" width="30" height="30" class="d-inline-block align-top" alt="">  Home</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<a class="nav-link" href="http://utbweb.its.ltu.se/~albved-7/Products/test/test.php" style="font-size: 20px;">Movies</a>
			<a class="nav-link" href="#" style="font-size: 20px;">Order</a>
		</ul>
		</div>
  
		<ul class="navbar-nav">
			<a class="nav-link" href="#" style="font-size: 20px;">Shopping Basket</a>
			<a class="nav-link" href="#" style="font-size: 20px;"> Log in</a>
		</ul>
		</div>
  
</nav>
<div class="images">
	<a href="product.php?productID=11"><img class="movies1" src="Bilder/IB.jpg" alt="Movie1" ></a>
	<a href="product.php?productID=13"><img class="movies2" src="Bilder/pulpfiction.jpg" alt="Movie2"></a>
	<a href="product.php?productID=12"><img class="movies4" src="Bilder/killbill.jpg" alt="Movie3"></a>
	<a href="product.php?productID=14"><img class="movies3" src="Bilder/django.jpg" alt="Movie4"></a>
	<a href="product.php?productID=15"><img class="movies5" src="Bilder/Hollywood.jpg" alt="Movie5"></a>
</div>

</body>
</html>