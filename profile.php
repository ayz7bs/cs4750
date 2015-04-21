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
if (!$stmt->bind_result($smoothie_name, $smoothie_id)) {
    echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}
$stmt -> store_result();



	
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>SQ - PROFILE</title>

        <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	
		<script>
	$(document).ready(function(){
		if('<?php echo $admin; ?>' == "0"){
			document.getElementById("adminOnly").style.display = 'none';
		}	

		$("#export").click(function(){
			alert("here");
			$.ajax({
				url: 'export.php',
				type: 'GET',
				data: {smoothie_id: <?=$smoothie_id?>, username: '<?echo $_SESSION["user"]?>' },
				success: function(data){
				}
			});
		});	

		$("#totoggle").click(function() {
			document.getElementById("showTables").style.display = 'none';
		});

		
	});
	</script>
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></i></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">HOME</a></li>
            <li><a href="about.html">ABOUT</a></li>
            <li><a href="search_index.php">SEARCH</a></li>
            <li><a href="create.php">CREATE</a></li>
            <li class="active"><a href="profile.php">PROFILE</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
            <!--<li><a data-toggle="modal" data-target="#myModal" href="#myModal"><i class="fa fa-envelope-o"></i></a></li>-->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<div id="blue">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-8 col-lg-offset-2">
				<h4>PROFILE PAGE</h4>
				<p><?php echo strtoupper($_SESSION["user"]) ?>, CHECK OUT YOUR SAVED SMOOTHIES</p>
				<p><div class='col-lg-4'>
					<?php 
						while( $stmt -> fetch()){
							echo "<div class='pricing-option'>";
								echo "<a href='smoothie.php?smoothie_id=$smoothie_id' class='pricing-signup'>$smoothie_name</a> ";
							echo "</div>";
						}
					?>
				</div></p>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!--  bluewrap -->


	<div id = "adminOnly" class="container w">
		<div class="row centered">
			<br><br>
			<h1> If you are aren't an admin you shouldn't see this</h1>
			<button id = "totoggle">Display Tables</button>
			<div id = "showTables" class="col-lg-8 col-lg-offset-2" style = 'display:none'>
				<p><div class='col-lg-4'>
					<?php 
					$sql = "SHOW TABLES";
					$result = $mysqli->query($sql);

					if ($result->num_rows > 0) {
					// output data of each row
						while($row = $result->fetch_assoc()) {
							echo $row["Tables_in_cs4750ayz7bs"]. "<br>";
						}
					}
					?>
				</div></p>
				</div>
			
		
		</div><!-- row -->
		<br>
		<br>
	</div><!-- container -->


	<!-- PORTFOLIO SECTION -->
	<div id="dg">
		<div class="container">
			<div class="row centered">
				<h4>SMOOTHES = LIFE</h4>
				<br>
	
				
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- DG -->



	
	<div id="r">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-8 col-lg-offset-2">
					<h4>EAT. PRAY. DRINK SMOOTHIES</h4>
					<p>We believe that smoothies are the future. Make them well and let them drink the way.</p>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><! -- r wrap -->
	
	
	<!-- FOOTER -->
	<div id="f">
		<div class="container">
			<div class="row centered">
				<a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-dribbble"></i></a>
		
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- Footer -->
	
	    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  </body>
</html>
