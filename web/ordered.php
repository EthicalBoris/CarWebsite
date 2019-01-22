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
<?php


$mail = $_POST['email'];
$subject = "HTML MAIL";

$car = $_POST['car'];
$trim = $_POST['trim'];
$colour = $_POST['colour'];
$interior = $_POST['interior'];
$engine  = $_POST['engine'];
$wheel = $_POST['wheel'];
$sensors=$_POST['sensors'];
$price = $_POST['price'];
/*
echo $car;
echo $trim;
echo $colour;
echo $interior;
echo $engine;
echo $wheel;
echo $sensors;
echo $price;
*/

$message = "
<html>
<head>
<title>Thank you for your order!</title>
</head>
<body>
<h1>Your order:</h1>
<p>car: $car </br>
trim: $trim</br>
colour: $colour</br>
interior: $interior</br>
engine: $engine</br>
wheels: $wheel</br>
sensors: $sensors</br>
price: $price</br></p> 
</body>
</html>
";

if($car == "mondeo"){
    $carID = 1;
  }else if($car == "focus"){
    $carID = 2;
  }else if($car == "fiesta"){
    $carID = 3;
  }

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <www-data@essex.ac.uk>' . "\r\n";


echo $message;

$query1 = "INSERT INTO customers (email) VALUES (\"$mail\")";
$query = "INSERT INTO orders (carID,carTrim,colour,interior,engine,wheel,sensors,price) VALUES ($carID,\"$trim\",\"$colour\",\"$interior\",\"$engine\",\"$wheel\",\"$sensors\",$price)";
if (mysqli_query($conn, $query1)) {
    echo "<p>New cust record created successfully<br/></p>";
} else{
    echo "Welcome back ".$mail;
}
if (mysqli_query($conn, $query)) {
    echo "<p>New order record created successfully<br/></p>";
} else{
    echo "Failed to create order record";
}
$query3 = "SELECT last_insert_id()";
$result = mysqli_query($conn,$query3);
$row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
$orderID = $row['last_insert_id()'];

mysqli_free_result($result);

echo "<p>ORDER ID:".$orderID."</p>";

$message = "
<html>
<head>
<title>Thank you for your order!</title>
</head>
<body>
<h1>Your order: $orderID</h1>
<p>car: $car </br>
trim: $trim</br>
colour: $colour</br>
interior: $interior</br>
engine: $engine</br>
wheels: $wheel</br>
sensors: $sensors</br>
price: $price</br></p> 
</body>
</html>
";
$subject = "Dzik Cars order: ".$orderID;
mail($mail,$subject,$message,$headers);

?>
<p>mail sent!</p>
</div>

<footer>
  <p>Made by <a href="https://github.com/EthicalBoris">Boris Descubes</a> </p>
</footer>

  </body>