<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8" />
    <title>Dzik Cars</title>
    <link rel="stylesheet" href="DzikStyle.css" type="text/css" />	
  </head>
  <body>
  <?php
  error_reporting(E_ALL); ini_set('display_errors', 1);

  //Logging in to SQL database for later

  $servername = "cseemyweb.essex.ac.uk";
  $username = "bd17671";
  $password = "bIxCWDQ72LXCn";
  $database = "ce29x_bd17671";

  $conn = mysqli_connect($servername, $username, $password)
  or die("Unable to connect to '$servername'");

  mysqli_select_db($conn, $database)
  or die("Unable to open the DB '$database'");

  ?>



  <p class="cornersButton"><a href="orders.php"> Orders</a></p>  
  <div class="header">       
		<ul class="top">
		<li class="top"><a href="mondeo.php">Mondeo</a></li>
		<li class="top"><a href="focus.php">Focus</a></li>
    <li class="top"><a href="fiesta.php">Fiesta</a></li>
		</ul>
  </div>

  <div class="content">
  <p>Enter your order Number:</p>
  <form action = "order.php" method="post">
  <input type="text" name = "orderID">
  <input type="submit" value="submit">
   
  </div>
  
<footer>
  <p>Made by <a href="https://github.com/EthicalBoris">Boris Descubes</a> </p>
</footer>

  </body>