<!doctype html>
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
       <link href="startpage.css" rel="stylesheet" type="text/css">

    <title>QT</title>
      <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>
      
      <!--NAVBAR-->
      
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
    
    
  <div class="row">
      <img src="https://on-media.fr/wp-content/uploads/2019/09/once-upon-a-time-in-hollywood-1200-1200-675-675-crop-000000.jpg" alt="Once upon a time in Hollywood" style="width:100%;">
      <div class="centered">
          <h1 class="row">ONCE UPON A TIME IN HOLLYWOOD</h1> 
          <p><a class="btn btn-secondary" href="#" role="button">BUY NOW &raquo;</a></p>
      </div>
      </div>
   

    
  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <h3 class="mb-0">PRODUCTS</h3>
          <p class="card-text mb-auto">Tarantino's films have garnered both critical and commercial success as well as a dedicated cult-following. </p>
          <p><a class="btn btn-secondary" href="#" role="button">GO TO PRODUCT PAGE &raquo;</a></p>
      
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="https://www.quentintarantinofanclub.com/upload/img/02201907153018-written-and-directed-by-quentin-tarantino.jpg" width="330" height="250">
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <h3 class="mb-0">QUENTIN TARANTINO</h3>
          <p class="mb-auto">Quentin Jerome Tarantino (/ˌtærənˈtiːnoʊ/; born March 27, 1963) is an American filmmaker, actor, film programmer, and cinema owner. His films are characterized by nonlinear storylines, satirical subject matter, estheticization of violence, extended scenes of dialogue, ensemble casts, references to popular culture and a wide variety of other films, soundtracks primarily containing songs and score pieces from the 1960s to the 1980s, alternate history, and features of neo-noir film.</p>
            </div>
            <div class="col-auto d-none d-lg-block">
             <img src="https://www.indiewire.com/wp-content/uploads/2019/07/shutterstock_10248532cm-2.jpg?w=780" width="330" height="250">
        </div>
    
        </div>
      </div>
    </div>
  </div>
</div>
    
</main><!-- /.container -->


  </body>
</html>