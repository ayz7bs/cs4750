<!DOCTYPE html>
<? session_start(); 

$mysqli = new mysqli('stardock.cs.virginia.edu', 'cs4750ayz7bs', 'cs4750', 'cs4750ayz7bs');
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$test = ($_SESSION["user"]);
$admin = ($_SESSION["admin"]);

if (!($stmt = $mysqli->prepare("SELECT smoothie_name, smoothie_id FROM favorites natural join Smoothie WHERE username='$test'"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
if (!$stmt->execute()) {
    echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
if (!$stmt->bind_result($s_name, $s_id)) {
    echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}
$stmt -> store_result();
echo "<br>";
$stupid = 1;
$dumb = 2;

if($admin){
	echo "this is a test for admin truth";
}
echo "<br>";

?>
<script>
	document.write(<?php echo $admin ?>);
</script>