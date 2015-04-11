<?php

# Add a smoothie to the database

# Get Different parts of smoothie

  
  $db_connection = new mysqli('stardock.cs.virginia.edu', 'cs4750ayz7bs', 'cs4750', 'cs4750ayz7bs');
  if (mysqli_connect_errno()) {
      echo "Error";
  }

  $stmt = $db_connection->stmt_init();

  if($stmt->prepare("INSERT INTO Smoothie values(NULL, ?)")) {
      $stmt->bind_param("s", $name);
      $stmt->execute();
      $inserts = $db_connection->affected_rows;
      echo $inserts . " Smoothie Addded!";
  }


