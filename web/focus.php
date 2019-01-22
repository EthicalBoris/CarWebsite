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
    <img src="Images/focus.png">

    

		<form class="configuration" action="confirm.php" method="get">
    <div class = "hiddens">  
        <input type="radio" name = "car" value = "mondeo">
        <input type="radio" name = "car" value = "focus" checked="checked" >
        <input type="radio" name = "car" value = "fiesta">
    </div>
      <section class = "trim config">    
        <h1>Choose a Trim:</h1>

        <?php        
        $query = "SELECT * FROM trims WHERE carID=2 ORDER BY price";
        $result = mysqli_query($conn,$query);
        //echo "<p>Before loop</p>";        
        $first = true;
        while($row = mysqli_fetch_array( $result, MYSQLI_ASSOC )){
          echo "<input type='radio' name='carTrim' value='{$row['carTrim']}'";
          if($first){
          echo "checked='checked'>";
          $first = false;
          }else{
            echo ">";
          }
          echo "<label>{$row['carTrim']}, £{$row['price']}</label>";

        }
      
        mysqli_free_result($result);
        

        ?>       
      </section>		    

      <section class= "colour config">
      <h1>Choose a colour:</h1>
        <?php
          $query = "SELECT*From colours WHERE carID=2 ORDER BY price";
          $result = mysqli_query($conn,$query);        

          $first = true;
        while($row = mysqli_fetch_array( $result, MYSQLI_ASSOC )){
          echo "<input type='radio' name='colour' value='{$row['colour']}'";
          if($first){
            echo "checked='checked'>";
            $first = false;
            }else{
              echo ">";
            }
          echo "<label>{$row['colour']}, £{$row['price']}</label>";

        }
      
        mysqli_free_result($result);
        ?>
      </section>

      <section class = "Interior Config">
      <h1>Interior</h1>
      <?php
          $query = "SELECT*From interiors WHERE carID=2 ORDER BY price";
          $result = mysqli_query($conn,$query);        

          $first = true;
        while($row = mysqli_fetch_array( $result, MYSQLI_ASSOC )){
          echo "<input type='radio' name='interior' value='{$row['interior']}'";
          if($first){
            echo "checked='checked'>";
            $first = false;
            }else{
              echo ">";
            }
          echo "<label>{$row['interior']}, £{$row['price']}</label>";
        }      
        mysqli_free_result($result);
        ?>
      </section>

    <section class = "Engine Config">
    <h1>Choose an Engine:</h1>
    <?php
          $query = "SELECT*From engines WHERE carID=2 ORDER BY price";
          $result = mysqli_query($conn,$query);        

          $first = true;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC )){
          echo "<input type='radio' name='engine' value='{$row['engine']}'";
          if($first){
            echo "checked='checked'>";
            $first = false;
            }else{
              echo ">";
            }
          echo "<label>{$row['engine']}, £{$row['price']}</label>";
        }
      
        mysqli_free_result($result);
        ?>
    </section>

    <section class= "Wheels config">
    <h1>Select your wheels:</h1>
    <?php
          $query = "SELECT*From wheels WHERE carID=2 ORDER BY price";
          $result = mysqli_query($conn,$query);        

          $first = true;
        while($row = mysqli_fetch_array( $result, MYSQLI_ASSOC )){
          echo "<input type='radio' name='wheel' value='{$row['wheel']}'";
          if($first){
            echo "checked='checked'>";
            $first = false;
            }else{
              echo ">";
            }
          echo "<label>{$row['wheel']}, £{$row['price']}</label>";
        }
      
        mysqli_free_result($result);
        ?>
    </section>

    <section class = "sensors config">
    <h1>Parking sensors options:</h1>
    <?php
          $query = "SELECT*From sensors WHERE carID=2 ORDER BY price";
          $result = mysqli_query($conn,$query);        

          $first = true;
        while($row = mysqli_fetch_array( $result, MYSQLI_ASSOC )){
          echo "<input type='radio' name='sensors' value='{$row['sensors']}'";
          if($first){
            echo "checked='checked'>";
            $first = false;
            }else{
              echo ">";
            }
          echo "<label>{$row['sensors']}, £{$row['price']}</label>";
        }
      
        mysqli_free_result($result);
        mysqli_close($conn);
        ?>
    </section>
    <input class="submit" type="submit" value="Submit">		
		</form>
    
  </div>


  
<footer>
  <p>Made by <a href="https://github.com/EthicalBoris">Boris Descubes</a> </p>
</footer>

  </body>