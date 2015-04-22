<?php

$host="stardock.cs.virginia.edu"; // Host name 
$username="cs4750ayz7bs"; // Mysql username 
$password="cs4750"; // Mysql password 
$db_name="cs4750ayz7bs"; // Database name 
$tbl_name="User"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword 
$myusername=$_POST['myusername']; 
$mypassword=md5($_POST['mypassword']);

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

# TODO: Need to use prepared statement
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

$row = mysql_fetch_row($result);
$admin_status = $row[2];
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "index.php"
session_register("myusername");
session_register("mypassword"); 
session_register('$admin_status');
session_start();

$_SESSION['user'] = $_POST['myusername'];
$_SESSION['admin'] = "$admin_status";

header("location:index.php");
}
else {
echo '
        <script type="text/javascript">
            alert("Incorrect login"); 
            window.location.href = "login.php";</script>';
}
ob_end_flush();

?>