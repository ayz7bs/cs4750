<?php
session_start(); 

$mysqli = new mysqli('stardock.cs.virginia.edu', 'cs4750ayz7bs', 'cs4750', 'cs4750ayz7bs');
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$smoothie_id = $_GET['smoothie_id'];

 
// Getting Smoothie Name
if (!($stmt = $mysqli->prepare("SELECT smoothie_name FROM Smoothie where smoothie_id = ?"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$stmt->bind_param("i", $smoothie_id);

if (!$stmt->execute()) {
    echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!$stmt->bind_result($name)) {
    echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}


      while($stmt->fetch()) {
      	// should only be one result cause id is unique
		$smoothie_name = $name;		
       }
       
// Getting Place for Smoothie
if (!($stmt = $mysqli->prepare("SELECT place_name FROM Smoothie natural join sold_at natural join Place where smoothie_id = ?"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$stmt->bind_param("i", $smoothie_id);

if (!$stmt->execute()) {
    echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!$stmt->bind_result($location)) {
    echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

      while($stmt->fetch()) {
      	// should only be one result cause id is unique
		$place_name = $location;

       }
//Getting Ingredients and amount of Ingredients
if (!($stmt = $mysqli->prepare("SELECT name, amount FROM Smoothie NATURAL JOIN made_of NATURAL JOIN Ingredient WHERE Smoothie_id = ?
"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$stmt->bind_param("i", $smoothie_id);

if (!$stmt->execute()) {
    echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!$stmt->bind_result($Name, $Amount)) {
    echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}



      #while($row = $stmt->fetch_array(MYSQLI_ASSOC)) {
      	// should only be one result cause id is unique
      #	$row[name];
      	#$row[amount];
	  

      # }
      	$names = array();
      	$amounts = array();
      	
		while($stmt->fetch()) {
      	// store the values
      	array_push($names, $Name);
      	array_push($amounts, $Amount);

       }

//Getting Nutrition info
if (!($stmt = $mysqli->prepare("SELECT calories, sugar, fiber, protein, calcium FROM Smoothie natural join smoothie_nutrition natural join Nutrition_Info where smoothie_id = ?
"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$stmt->bind_param("i", $smoothie_id);

if (!$stmt->execute()) {
    echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!$stmt->bind_result($Calories, $Sugar, $Fiber, $Protein, $Calcium)) {
    echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

      while($stmt->fetch()) {
      	// should only be one result cause id is unique
		$calories = $Calories;
		$sugar = $Sugar;
		$fiber = $Fiber;
		$protein = $Protein;
		$calcium = $Calcium;

       }

 // Check if smoothie is already in favorites list
 
if (!($stmt = $mysqli->prepare("SELECT username, smoothie_id from User natural join favorites natural join Smoothie where username = ? AND smoothie_id = ? LIMIT 1"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$stmt->bind_param("si", $_SESSION["user"], $smoothie_id);

if (!$stmt->execute()) {
    echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!$stmt->bind_result($username, $smoothie_id)) {
    echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

	  $favorite = False;
	 
      while($stmt->fetch()) {

		  if($username == $_SESSION["user"]){
			  $favorite = True;
		  }
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

    <title>SQ - SMOOTHIE</title>

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
  </head>
  
   <script>
			$(document).ready(function() {
			
				$("#favoriteHeart").click(function(){
					
					$.ajax({
						url: 'favorite.php',
						type: 'GET',
						data: {smoothie_id: <?=$smoothie_id?>, username: '<?echo $_SESSION["user"]?>' },
						success: function(data){
							
							$('#message').html(data);
							if(data.indexOf('added') != -1) {
								document.getElementById("favoriteHeart").style.color = "#ff7878";
							}else {
								document.getElementById("favoriteHeart").style.color = "white";
							}
							
							
						}
					});
				});
				
				
				$("#remove").click(function(){
					if (confirm("Are you sure you want to delete this smoothie?")) {
						$.ajax({
						url: 'remove.php',
						type: 'GET',
						data: {smoothie_id: <?=$smoothie_id?> },
						success: function(data){
							alert("Smoothie has been deleted! Now returning to search index.");
							window.location.replace("search_index.php");
							//$('#message').html(data);
						}

					 });
						
					}
				});
				
				
				$(function () {
					$('[data-toggle="tooltip"]').tooltip()
				})

			});
 
		</script>


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
				<h4>SMOOTHIE INFORMATION</h4>
				<p>Love it? Add it to your favorites.</p>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!--  bluewrap -->


	<div class="container desc">
	<h2><strong><?=$smoothie_name?> <button <? if ($favorite) { ?> style="color: #ff7878" <? } ?> id="favoriteHeart" type="button" class="btn btn-primary raised btn-sm" <? if (!$favorite) { ?> data-toggle="tooltip" data-placement="right" title="Add to favorites." <? } ?> >
  <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
</button>


<? if ($_SESSION["admin"]) { ?>
<button id="remove" type="button" class="btn btn-primary raised btn-sm pull-right" data-toggle="tooltip" data-placement="right" title="Delete smoothie." >
  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
</button>
<? } ?>

 
</strong> </h2>

<hr>
	<div id="message"></div>
	<br>
	<left><h3>Location: <?=$place_name?></h3></left>
   <!--<left><h3>ing:<?=$name?></h3></left>-->
   <br>

	<left><h3>Ingredients</h3>
	<table class="table table-striped">
			 <tr>
			    <th>Ingredient</th>
			    <th>Amount</th> 
			     
 			 </tr>
 			 
 			 <? foreach($names as $index => $name){ ?>
  			<tr>
			    <td> <?=$name?> </td>
			    <td> <?=$amounts[$index]?> </td>
			    	  
  			</tr>
  			
  			<? } ?>
  			
		</table>
		<br>

    <left><h3> Nutrition Information </h3>
	<table class="table table-striped">
			 <tr>
			    <th>Calories</th>
			    <th>Sugar</th> 
			    <th>Fiber</th>
			    <th>Protein</th>
			    <th>Calcium</th>
 			 </tr>
  			<tr>
			    <td> <?=$calories?> cal </td>
			    <td> <?=$sugar?> g </td>
			    <td> <?=$fiber?> g </td>
			    <td> <?=$protein?> g </td>
			    <td> <?=$calcium?> % </td>			  
			
  			</tr>
		</table>
	</left>
	</div><!-- container -->
	<br><br>
	
	
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
		<iframe height="300" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
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
