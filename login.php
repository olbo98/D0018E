<!doctype html>
<?php
session_start();
if(isset($_SESSION["username"]))
{
    header("Location: http://utbweb.its.ltu.se/~olobou-7/shop/index.php");
}
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>QT</title>
  </head>
  <body style="background-color: #8C8887;">
    <div class="container" style="margin-top: 10%;">
        <h1 class="display-4 text-center">Login</h1>
        
        <div class="d-flex justify-content-center" style="margin-top: 50px;">
            <div class="shadow-sm p-3 mb-5 bg-white rounded">
                <form action="checkLogin.php" method="post">
                    <div class="form-group">
                        <label for="Username">
                            Username
                        </label>
                        
                        <input type="text" class="form-control" id="Username" aria-describedby="emailHelp" placeholder="Enter email" name="username" required>
                        
                        <small id="emailHelp" class="form-text text-muted">
                            We'll never share your email with anyone else.
                        </small>
                    </div>
            
                    <div class="form-group">
                        <label for="Password">
                            Password
                        </label>
                        
                        <input type="password" class="form-control" id="Password" placeholder="Password" name="password" required>
                    </div>
            
                    <button type="submit" class="btn btn-outline-primary btn-block">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>