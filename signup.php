<?php 
$mysqli = new mysqli('stardock.cs.virginia.edu', 'cs4750ayz7bs', 'cs4750', 'cs4750ayz7bs');
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$username = $_POST['myusername'];
$password = $_POST['mypassword']; 
$cpassword = $_POST['cmypassword'];

if($password != $cpassword){
	echo "Error: Passwords do not match!";
	// echo "password: $password, confirmed password: $cpassword";
	
}else{

	if (!($stmt = $mysqli->prepare("INSERT INTO User VALUES(?, ?, 0)"))) {
    	echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}

	$stmt->bind_param("ss", $username, md5($password));

	if (!$stmt->execute()) {
		echo "Sign up failed. Username: $username has already been registered.";
		// echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}else{
		echo "<h3> Welcome $username! You have been signed up for Smoothie Queens! </h3>";
	}
}


?>