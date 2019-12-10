<!doctype html>
<?php
session_start();
if($_SESSION["username"] != "admin" || !isset($_SESSION["username"])){
    header("Location: index.php");
}
include "functions.php";
$conn = connectToDB();
$query = "SELECT productID, name FROM Products";
$result = $conn->query($query);

$query2 = "SELECT orderID, orderStatus FROM Orders";
$result2 = $conn->query($query2);

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Edit price</title>
  </head>
  <body>
    <div class="container">
        <div class="shadow-sm p-3 mb-5 bg-white rounded register-form">
            <form method="post" action="editProductCheck.php">
                <div class="form-group">
                    <label for="productToEdit">
                        Product to edit
                    </label>
                    <select class="form-control" id="productToEdit" name="movieToEdit">
                        <?php
						$rows = $result->fetch_all(MYSQLI_ASSOC);
                        for($i = 0; $i < count($rows); $i = $i + 1){
                            echo '<option value="'.$rows[$i]["productID"].'">'.$rows[$i]["name"].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>New price</label>
                    <input type="number" class="form-control" id="newPrice" name="newPrice" placeholder="Value" required>
                </div>
                <button type="submit" class="btn btn-outline-primary btn-block">Submit</button>
            </form><br>
			
			<form method="post" action="orderStatusChange.php">
				<div class="form-group">
					<label for="orderToEdit">
						Order to edit
					</label>
					<select class="form-control" id="orderToEdit" name="orderToEdit">
						<?php
						$rows2 = $result2->fetch_all(MYSQLI_ASSOC);
						for($i = 0; $i < count($rows2); $i = $i + 1){
                            echo '<option value="'.$rows2[$i]["orderID"].'">'.$rows2[$i]["orderID"].'</option>';
                        }
                        ?>
                    </select>
				</div>
				<div class="form-group">
					<label>Set Order Status </label>
					<select class="form-control" id="orderStatus" name="orderStatus2">
							<option value="complete">complete</option>
							<option value="incomplete">incomplete</option>
                    </select>
				</div>
				<?php 
					if(count($rows2)==0){
						echo '<input type="submit" class="btn btn1 btn-outline-dark btn-block" disabled value="No orders!">';
					}else{
						echo '<button type="submit" class="btn btn-outline-primary btn-block">Submit</button>';
					}
				?>
			</form><br>
			
			<form method="post" action="removeOrder.php">
				<div class="form-group">
					<label for="orderToRemove">
						Order to remove
					</label>
					<select class="form-control" id="orderToRemove" name="orderToRemove2">
						<?php
                        for($i = 0; $i < count($rows2); $i = $i + 1){
							
                            echo '<option value="'.$rows2[$i]["orderID"].'">'.$rows2[$i]["orderID"].'</option>';
                        }
                        ?>
                    </select>
				</div>
				<?php 
					if(count($rows2)==0){
						echo '<input type="submit" class="btn btn1 btn-outline-dark btn-block" disabled value="No orders!">';
					}else{
						echo '<button type="submit" class="btn btn-outline-primary btn-block">Submit</button>';
					}
				?>
			</form>
        </div>  
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>