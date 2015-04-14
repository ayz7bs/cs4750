<?php
$mysqli = new mysqli('stardock.cs.virginia.edu', 'cs4750ayz7bs', 'cs4750', 'cs4750ayz7bs');
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$name = $_GET['type'];

if ($name != ""){
  if (!($stmt = $mysqli->prepare("SELECT name FROM Smoothie Natural Join restricted Natural Join Dietary_Restriction WHERE type = ?"))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
  }

  $stmt->bind_param("s", $name);


  if (!$stmt->execute()) {
      echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
  }

  if (!$stmt->bind_result($name)) {
      echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
  }



  echo "<h4> Smoothie Results </h4>";
  echo "<br><br>";
  echo "<div class='container'>";
    echo "<div class='row centered'>";


        while($stmt->fetch()) {
            echo "<div class='col-lg-4'>";
              # START SMOOTHIE TABLE
              echo "<div class='pricing-option'>";
                echo "<div class='pricing-top'>";
                      echo "<span class='pricing-edition'>" . $name . "</span>";
                  echo "</div>";
                       echo "<ul>";
                          echo "<li><strong>Location</strong></li>";
             echo "</ul>";
             # change to url to show smoothie information
                  echo "<a href='search.html?smoothie_id=$id' class='pricing-signup'>SELECT</a>";
              echo "</div>"; # /pricing-option
          # END SMOOTHIE TABLE
      echo "</div>"; # /col     
         }
  echo "</div>";
    echo "</div>";
}
else{
  if (!($stmt = $mysqli->prepare("SELECT name FROM Smoothie"))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
  }

  $stmt->bind_param("s", $name);


  if (!$stmt->execute()) {
      echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
  }

  if (!$stmt->bind_result($name)) {
      echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
  }



  echo "<h4> Smoothie Results </h4>";
  echo "<br><br>";
  echo "<div class='container'>";
    echo "<div class='row centered'>";


        while($stmt->fetch()) {
            echo "<div class='col-lg-4'>";
              # START SMOOTHIE TABLE
              echo "<div class='pricing-option'>";
                echo "<div class='pricing-top'>";
                      echo "<span class='pricing-edition'>" . $name . "</span>";
                  echo "</div>";
                       echo "<ul>";
                          echo "<li><strong>Location</strong></li>";
             echo "</ul>";
             # change to url to show smoothie information
                  echo "<a href='search.html?smoothie_id=$id' class='pricing-signup'>SELECT</a>";
              echo "</div>"; # /pricing-option
          # END SMOOTHIE TABLE
      echo "</div>"; # /col     
         }
  echo "</div>";
    echo "</div>";
}
?>