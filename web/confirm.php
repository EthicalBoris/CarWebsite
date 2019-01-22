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
  <h1>Confirm your order:</h1>
  <h2>You ordered</h2>
    <?php
        $car = $_GET['car'];
        $trim = $_GET['carTrim'];
        $colour = $_GET['colour'];
        $interior = $_GET['interior'];
        $engine  = $_GET['engine'];
        $wheel = $_GET['wheel'];
        $sensors=$_GET['sensors'];
        $price = 0.0;

        if($car == "mondeo"){
          $carID = 1;
        }else if($car == "focus"){
          $carID = 2;
        }else if($car == "fiesta"){
          $carID = 3;
        }
        //echo $carID;
        echo "<p>car: ".$car;
        echo "<br/>trim: ".$trim;
        echo "<br/>colour: ".$colour;
        echo "<br/>interior: ".$interior;
        echo "<br/>engine: ".$engine;
        echo "<br/>wheel: ".$wheel;
        echo "<br/>sensors: ".$sensors;
        echo "<br/>total price: ";

       //price adding trim
       
        $query = "SELECT price FROM trims WHERE carTrim=\"$trim\" AND carID=$carID limit 1";
        //SELECT * FROM trims WHERE carID=2 AND trim='EcoMax' ORDER BY price;
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
        $price += $row['price'];   

        mysqli_free_result($result);

      
        $query = "SELECT price FROM colours WHERE colour=\"$colour\" AND carID=$carID limit 1";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
        $price += $row['price'];       

        mysqli_free_result($result);

        $query = "SELECT price FROM interiors WHERE interior=\"$interior\" AND carID=$carID limit 1";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
        $price += $row['price'];       

        mysqli_free_result($result);

        $query = "SELECT price FROM engines WHERE engine=\"".$engine."\" AND carID=$carID limit 1";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
        $price += $row['price'];       

        mysqli_free_result($result);        

        $query = "SELECT price FROM wheels WHERE wheel=\"$wheel\" AND carID=$carID.limit 1";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
        $price += $row['price'];       

        mysqli_free_result($result);

        $query = "SELECT price FROM sensors WHERE sensors=\"$sensors\" AND carID=$carID limit 1";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
        $price += $row['price'];       

        mysqli_free_result($result);

        $query = "SELECT price FROM cars WHERE carID=$carID limit 1";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
        $price += $row['price'];       

        mysqli_free_result($result);
        echo $price."</p>";

      // mysqli_free_result($result);

       //price adding colour        
    ?>

    <form action="ordered.php" method="post"> 
      Email: <input type="text" name="email">
      
      <div class="hiddens">
      <?php     
     
      echo "<input type='text' name='car' value='$car'>" ;
      echo "<input type='text' name='trim' value='$trim'>";
      echo "<input type='text' name='colour' value='$colour'>";
      echo "<input type='text' name='interior' value='$interior'>";
      echo "<input type='text' name='engine' value='$engine'>";
      echo "<input type='text' name='wheel' value='$wheel'>";
      echo "<input type='text' name='sensors' value='$sensors'>";
      echo "<input type='text' name='price' value='$price'>";      
      ?>
      </div>
      <input type="submit" value="Order">
    </form>

  </div>
<footer>
  <p>Made by <a href="https://github.com/EthicalBoris">Boris Descubes</a> </p>
</footer>

  </body>