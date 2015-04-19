<?php
 // General Info
 $smoothie_id = $_GET['smoothie_id'];
 $username = $_GET['username'];
  
  // Database connection 
  $db_connection = new mysqli('stardock.cs.virginia.edu', 'cs4750ayz7bs', 'cs4750', 'cs4750ayz7bs');
  if (mysqli_connect_errno()) {
      echo "Error";
  }
  $stmt = $db_connection->stmt_init();
  
  // Add favorite
  if($stmt->prepare("INSERT INTO favorites values(?, ?)")) {
      $stmt->bind_param("si", $username, $smoothie_id);
      $stmt->execute();
      $inserts = $db_connection->affected_rows;
      // echo $inserts . " Smoothie Added <br>";
      
  }
  
  
  if($inserts == -1){
	      echo "Smoothie already added to favorites.";
  }else{
	  echo "This smoothie has been added to your favorites!";
  }
 
 ?>
