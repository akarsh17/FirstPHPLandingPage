<?php
  if(isset($_POST['name'])){
// Set connection variables
  $server = 'localhost';
  $user = 'phpmyadmin';
  $pass = "tictactoe";

// Create a database connection
  $con = mysqli_connect($server, $user, $pass);

    if(!$con){
      die("Connection to this database failed due to ". mysqli_connect_error());
    }
    // echo "Success connecting to the db!";

    // Collect POST variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $descr = $_POST['descr'];
    $sql = "INSERT INTO `trip`.`trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Descr`,`Date_created`) VALUES ('$name', '$age', '$gender','$email','$phone','$descr',current_timestamp());";
    // echo $sql;

    // Execute the query
    if ($con->query($sql) == true){
      // echo "Successfully inserted";

      // Flag for successfull insertion
      $insert = true;
    }
    else {

      // Display error
      echo "<footer>Error: $sql <br> $con->error </footer>";
    }

    // Closing of database connection
    $con->close();
  }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to Travel form</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <img class="amity" src="amity.jpg" alt="">
    <div class="container">
      <h1 style="color: yellow; padding:1px 1px 1px 1px; text-shadow: 5px 5px 5px magenta"> Welcome to Amity University - US SAP form </h1>
      <p style="size: 18px; text-align: center"><br>Enter your details and confirm your participation for the trip.</p>

<?php
  if($insert){
        echo "<p id='onsubmit'>Thanks for submitting your form. We are happy to see you joining us for the US trip.</p>";
}
?>

      <form class="" action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name buddy!!">
        <input type="text" name="age" id="age" placeholder="What's your age?">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <input type="phone" name="phone" id="phone" placeholder="Enter your Phone number">
        <textarea name="descr" rows="8" cols="20" id="descr" placeholder="Enter other relevent information here!" ></textarea>
        <button class="btn" name="submit">Submit</button>
        <button class="btn" name="reset">Reset</button>
        <input type="reset" value="Reset" onClick="window.location.reload()">
        
      </form>

    </div>
    <!-- <script type="text/javascript", src="index.js"> -->

    <!-- </script> -->
  </body>
</html>
