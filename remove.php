<?php
 // General Info
  
 $smoothie_id = $_GET['smoothie_id'];
 
  // Database connection 
  $db_connection = new mysqli('stardock.cs.virginia.edu', 'cs4750ayz7bs', 'cs4750', 'cs4750ayz7bs');
  if (mysqli_connect_errno()) {
      echo "Error";
  }
  
  $stmt = $db_connection->stmt_init();
  
  
  // Add favorite
  if(!$stmt->prepare("DELETE from Smoothie where smoothie_id = ?")) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
  }
      $stmt->bind_param("i", $smoothie_id);
      $stmt->execute();
      $inserts = $db_connection->affected_rows;
      echo $inserts . " Smoothie removed <br>";
      


?>
