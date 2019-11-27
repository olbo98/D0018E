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

$query = "SELECT * FROM Products WHERE productID =".$_GET['productID'];
$query2 = "SELECT * FROM Pictures WHERE productID= ".$_GET['productID'];
$query3 = "SELECT * FROM Comments WHERE productID =".$_GET['productID'];
$query4 = "SELECT Comments.*, Users.username FROM (Comments INNER JOIN Users ON Comments.userID = Users.userID)";


$result = $conn->query($query);  
$result2 = $conn->query($query2);
$result3 = $conn->query($query3);
$result4 = $conn->query($query4);



$row = $result->fetch_assoc();
$row2 = $result2->fetch_all(MYSQLI_ASSOC);




?>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="product.css">
</head>
<body>

</div>
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

<div class="moviename">
	<?php echo $row['name']; ?>
</div>


<div class="groupie">
	<div class="rate">Star rating:</div><br>
	<div class="price">Priceeee: <?php echo $row["price"]; ?> </div><br>
	<div class="stock">Leeeeeft: <?php echo $row["quantity"]; ?></div><br><br>
	<div class="buttons">
		<!--<a href="addproduct.php"><button type="button" class="btn btn1 btn-dark btn-lg">Add to shoppingbag</button></a>-->
		<form action = "addproduct.php" method ="post">
		<?php
			if($row['quantity'] > 0){ 
				echo '<input style="display: none;" name= "productID" type = "text" value='.$row["productID"].'>';
				echo '<input type="submit" class="btn btn1 btn-dark btn-lg" style="width:350px;" value="Add to cart">';
			}else{
				echo '<input type="submit" class="btn btn1 btn-dark btn-lg" style="width:350px;" disabled value="Out of Stock!">';
			}
			?>
		</form>
		
	</div>
</div>

<div class="images">
	<a href="#"><img class="movies1" src= <?php echo "Bilder/".$row2[0]["picture"]; ?> alt="Movie1"></a>
	<!-- <a href="<?php// echo $row["link"]?>" target="_blank" ><img class="trailer1" src= <?php //echo "Bilder/".$row2[1]["picture"]; ?> alt="Trailer1"></a> -->
	 <iframe class="trailer1" src="<?php echo $row2[1]["link"]?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<div class="description">
	<p><?php echo $row["description"];?>
	</p>

</div>


<form action="postcomment.php" method="post">
    <div class="form-group">
      <textarea maxlength = "255" placeholder= "Write your comment here" class="form-control" name = "commentText" rows="8"></textarea>
	  <input style="display: none;" name= "productID2" type = "text" value=<?php echo $row["productID"];?>>
	  <input class="btn btn-primary" type="submit" value="Comment">
    </div> 
</form>


<div class="commentsection">
	<?php
	
	while($row4=$result4->fetch_assoc()){
		$user = $row4['userID'];
		$username = $row4['username'];
		$comments = $row4['commentText'];
		$date = date("Y/m/d");
		
		
		echo "$user - $username - $comments----$date<br>";
				
	}
		
		
	?>
	
</div>


</body>
</html>