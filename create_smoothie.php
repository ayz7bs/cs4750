<?php
 // General Info
 $smoothie_name = $_GET['smoothie_name'];
 $place_name = $_GET['place_name'];
 
 // Nutritional Info
 $calories = $_GET['calories'];
 $sugar = $_GET['sugar'];
 $fiber = $_GET['fiber'];
 $protein = $_GET['protein'];
 $calcium = $_GET['calcium'];
 
  // Array for storing ingredient amoungs
 $amounts = array();
 // Create amounts varchar
 foreach($_GET['quantity'] as $index => $quantity){
	 if($quantity != ""){
		array_push($amounts, $quantity . " " . $_GET['measurement'][$index] );
	 }
 }
 // Array for storing ingredeints and amounts
 $ingredients = array();
 
 foreach($_GET['ingredient'] as $index => $ingredient_id){
 	$ingredients[$ingredient_id] = $amounts[$index];
 }
 // var_dump($ingredients);
 
 /*
 
 Dietary restriction checks
 $lactose = array()
 $peanut = array()
 
 */
  // Database connection 
  $db_connection = new mysqli('stardock.cs.virginia.edu', 'cs4750ayz7bs', 'cs4750', 'cs4750ayz7bs');
  if (mysqli_connect_errno()) {
      echo "Error";
  }
  $stmt = $db_connection->stmt_init();
  $smoothie_added = True;
  
  // Add smoothie
  if($stmt->prepare("INSERT INTO Smoothie values(NULL, ?)")) {
      $stmt->bind_param("s", $smoothie_name);
      $stmt->execute();
      $inserts = $db_connection->affected_rows;
      $smoothie_id = $db_connection->insert_id;
      // $inserts . " Smoothie Added <br>";
      if($inserts == -1){
	      $smoothie_added = False;
      }
      
  }
  
 
  // Add place
  if($stmt->prepare("INSERT INTO Place values(NULL, ?)")) {
      $stmt->bind_param("s", $place_name);
      $stmt->execute();
      $inserts = $db_connection->affected_rows;
      $place_id = $db_connection->insert_id;
      // $inserts . " Place Added <br>";
      if($inserts == -1){
	      $smoothie_added = False;
      }
  }
  
  // Add smoothie - place relationship
  if ($stmt->prepare("INSERT INTO sold_at VALUES(?, ?)")) {
       $stmt->bind_param("ii", $smoothie_id, $place_id);
	   $stmt->execute();
	   $inserts = $db_connection->affected_rows;
	   // $inserts . " SP Added <br>";
	   if($inserts == -1){
	      $smoothie_added = False;
      }  
  }
  
  
  // Add smoothie - ingredient and amount relationship  
  foreach ($ingredients as $ingredient_id => $amount) {
  if ($stmt->prepare("INSERT INTO made_of VALUES(?, ?, ?)")) {
       $stmt->bind_param("iis", $smoothie_id, $ingredient_id, $amount);
	   $stmt->execute();
	   $inserts = $db_connection->affected_rows;
	   // $inserts . " Ingredient Added <br>";
	   if($inserts == -1){
	      $smoothie_added = False;
      }
  }
  }
  
  // Add nutrition info
  if ($stmt->prepare("INSERT INTO Nutrition_Info VALUES(NULL, ?, ?, ?, ?, ?)")) {
       $stmt->bind_param("iiiii", $calories, $sugar, $fiber, $protein, $calcium);
	   $stmt->execute();
	   $inserts = $db_connection->affected_rows;
	   $info_id = $db_connection->insert_id;
	   // $inserts . " Info Added <br>";
	   if($inserts == -1){
	      $smoothie_added = False;
      }
  }
  
  // Add smoothie - nutrition relationship
  if ($stmt->prepare("INSERT INTO smoothie_nutrition VALUES(?, ?)")) {
       $stmt->bind_param("ii", $smoothie_id, $info_id);
	   $stmt->execute();
	   $inserts = $db_connection->affected_rows;
	   // $inserts . " SN Added <br>";
	   if($inserts == -1){
	      $smoothie_added = False;
      }
  }
  // Adding dietary restrictions
  
  // Add a bookmark?
  
  if($smoothie_added){
	  $result = "<center><h1> Smoothie Added! Thank you for contributing to the site.</h1> <br> <h3> You are now an honorary Smoothie Queen! </h3> <br> <p>  Share your favorite smoothie with us! </p> </center>";
  }else{
	  $result = "<center><h1> Apologies, but an error has occurred. </h1> <br> <h3> We will fix this error as soon as we can. </h3> <br> <p> Feel free to contact us about any other issues </p> </center>";
  }
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

    <title>SQ - ABOUT</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">

	<script src="assets/js/Chart.js"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
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
            <li><a href="create.html">CREATE</a></li>
            <li><a href="profile.php">PROFILE</a></li>
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
				<h4>LEARN MORE ABOUT THE SMOOTHIE QUEENS</h4>
				<p>WE ARE COOL PEOPLE</p>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!--  bluewrap -->
	<div> <?=$result?> </div>

	<div class="container w">
		<div class="row centered">
			<br><br>
			<div class="col-lg-3">
				<img class="img-circle" src="assets/img/pic.jpg" width="110" height="110" alt="">
				<h4>Christine Danzi</h4>
				<p><strong>Favorite Smoothie</strong><br> Peanut Butter Protein. Cause Chocolate.</p>
				<p><a href="#">@Choco_Holic</a></p>
			</div><!-- col-lg-3 -->

			<div class="col-lg-3">
				<img class="img-circle" src="assets/img/pic2.jpg" width="110" height="110" alt="">
				<h4>Ami Jagodara</h4>
				<p><strong>Favorite Smoothie</strong><br> Are there any with mint?</p>
				<p><a href="#">@Mint_2Be</a></p>
			</div><!-- col-lg-3 -->

			<div class="col-lg-3">
				<img class="img-circle" src="assets/img/pic3.jpg" width="110" height="110" alt="">
				<h4>Megan Joyner</h4>
				<p><strong>Favorite Smoothie</strong><br> Everything with onion and chive. Oh wait, you said smoothie...</p>
				<p><a href="#">@Yo_True</a></p>
			</div><!-- col-lg-3 -->

			<div class="col-lg-3">
				<img class="img-circle" src="assets/img/pic4.jpg" width="110" height="110" alt="">
				<h4>Alice Zhang</h4>
				<p><strong>Favorite Smoothie</strong><br> Ever have an avocado smoothie? That's pretty good.</p>
				<p><a href="#">@Dance_Life</a></p>
			</div><!-- col-lg-3 -->

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
				
			<!-- First Chart -->
			<!--
			<div class="col-lg-3">
				<canvas id="canvas" height="130" width="130"></canvas>
				<br>
				<script>
					var doughnutData = [
							{
								value: 70,
								color:"#3498db"
							},
							{
								value : 30,
								color : "#ecf0f1"
							}
						];
						var myDoughnut = new Chart(document.getElementById("canvas").getContext("2d")).Doughnut(doughnutData);
				</script>
				<p><b>Design & Brand</b></p>
				<p><small>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</small></p>
			</div><!-- /col-lg-3 -->

			<!-- Second Chart -->
			<!--<div class="col-lg-3">
				<canvas id="canvas2" height="130" width="130"></canvas>
				<br>
				<script>
					var doughnutData = [
							{
								value: 90,
								color:"#3498db"
							},
							{
								value : 10,
								color : "#ecf0f1"
							}
						];
						var myDoughnut = new Chart(document.getElementById("canvas2").getContext("2d")).Doughnut(doughnutData);
				</script>
				<p><b>Web Development</b></p>
				<p><small>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</small></p>
			</div><!-- /col-lg-3 -->
			
			<!-- Third Chart -->
			<!--<div class="col-lg-3">
				<canvas id="canvas3" height="130" width="130"></canvas>
				<br>
				<script>
					var doughnutData = [
							{
								value: 50,
								color:"#3498db"
							},
							{
								value : 50,
								color : "#ecf0f1"
							}
						];
						var myDoughnut = new Chart(document.getElementById("canvas3").getContext("2d")).Doughnut(doughnutData);
				</script>
				<p><b>Seo Services</b></p>
				<p><small>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</small></p>
			</div><!-- /col-lg-3 -->
			
			<!-- Fourth Chart -->
			<!--<div class="col-lg-3">
				<canvas id="canvas4" height="130" width="130"></canvas>
				<br>
				<script>
					var doughnutData = [
							{
								value: 80,
								color:"#3498db"
							},
							{
								value : 20,
								color : "#ecf0f1"
							}
						];
						var myDoughnut = new Chart(document.getElementById("canvas4").getContext("2d")).Doughnut(doughnutData);
				</script>
				<p><b>Printing</b></p>
				<p><small>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</small></p>
			</div><!-- /col-lg-3 -->
				
				
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


	<!-- MODAL FOR CONTACT -->
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">contact us</h4>
	      </div>
	      <div class="modal-body">
		        <div class="row centered">
		        	<p>We are available 24/7, so don't hesitate to contact us.</p>
		        	<p>
		        		Somestreet Ave, 987<br/>
						London, UK.<br/>
						+44 8948-4343<br/>
						hi@blacktie.co
		        	</p>
		        	<div id="mapwrap">
		<iframe height="300" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.es/maps?t=m&amp;ie=UTF8&amp;ll=52.752693,22.791016&amp;spn=67.34552,156.972656&amp;z=2&amp;output=embed"></iframe>
					</div>	
		        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Save & Go</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>