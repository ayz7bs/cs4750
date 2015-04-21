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
	if($stmt->prepare("DELETE FROM favorites where username = ? AND smoothie_id = ?")) {
      $stmt->bind_param("si", $username, $smoothie_id);
      $stmt->execute();
      $inserts = $db_connection->affected_rows;
      // echo $inserts . " Smoothie Added <br>";
      
	}
	
	echo "This smoothie has been removed from your favorites!";
  }else{
	  echo "This smoothie has been added to your favorites!";
  }
 
 ?>
