<!doctype html>
<?php
session_start();
include "functions.php";
$conn = connectToDB();
$query = "SELECT productID, name FROM Products";
$result = $conn->query($query);

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
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
                        while($row = $result->fetch_assoc()){
                            echo '<option value="'.$row["productID"].'">'.$row["name"].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>New price</label>
                    <input type="number" class="form-control" id="newPrice" name="newPrice" placeholder="Value" required>
                </div>
                <button type="submit" class="btn btn-outline-primary btn-block">Submit</button>
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