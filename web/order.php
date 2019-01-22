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
          
         $orderID = $_POST['orderID'];
         if($orderID != "admin"){
          $query = "SELECT*From orders WHERE OrderID=$orderID limit 1";
          $result = mysqli_query($conn,$query);        
          $row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
          echo "<p>OrderID: ".$row['OrderID']."</br>";
          if($row['carID'] == 1){
            echo "<p>car: mondeo</p>";
          }else if($row['carID']==2){
            echo "<p>car: focus</p>";
          }else if($row['carID']==3){
            echo "<p>car: fiesta</p>";
          }
          echo "<p>carID: ".$row['carID']."</br>";
          echo "<p>trim: ".$row['carTrim']."</br>";
          echo "<p>colour: ".$row['colour']."</br>";
          echo "<p>interior: ".$row['interior']."</br>";
          echo "<p>engine: ".$row['engine']."</br>";
          echo "<p>wheel: ".$row['wheel']."</br>";
          echo "<p>sensors: ".$row['sensors']."</br>";
          echo "<p>price: ".$row['price']."</br>";
        mysqli_free_result($result);
      
      } else {
          echo "<h1>ADMIN MODE:</h1>";
        
        $query = "SELECT * FROM orders ORDER BY OrderID";
        $result = mysqli_query($conn,$query);
        //echo "<p>Before loop</p>";        
        
        echo "<table>";
        echo "<tr><th>OrderID</th><th>carID</th><th>carTrim</th><th>colour</th><th>interior</th><th>engine</th><th>wheel</th><th>sensors</th><th>price</th></tr>";
        while($row = mysqli_fetch_array( $result, MYSQLI_ASSOC )){
         echo "<tr>";
         echo "<th>{$row['OrderID']}</th><th>{$row['carID']}</th><th>{$row['carTrim']}</th><th>{$row['colour']}</th><th>{$row['interior']}</th><th>{$row['engine']}</th><th>{$row['wheel']}</th><th>{$row['sensors']}</th><th>{$row['price']}</th>";
         echo "</tr>";
        }
        echo "<table>";      
        mysqli_free_result($result);
        }
        ?>
  </div>
  
<footer>
  <p>Made by <a href="https://github.com/EthicalBoris">Boris Descubes</a> </p>
</footer>

  </body>