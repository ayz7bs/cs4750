<!DOCTYPE html>
<? session_start(); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>SQ - Search</title>

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
			$(document).ready(function() {
				
				$("#smoothieSearch").change(function(){
					$.ajax({
						url: 'search.php',
						type: 'GET',
						data: {name: $("#smoothieSearch").val()},
						success: function(data){
							// clear current div
							$('#dg').empty();
							
							// show new data
							$('#dg').html(data);
						}
					});
				});
				$("#restriction").change(function(){
					$.ajax({
						url: 'restriction.php',
						type: 'GET',
						data: {type: $("#restriction").val()},
						success: function(data){
							// clear current div
							$('#dg').empty();
							
							// show new data
							$('#dg').html(data);
						}
					});
				});
				$("#place").change(function(){
					$.ajax({
						url: 'place_search.php',
						type: 'GET',
						data: {type: $("#place").val()},
						success: function(data){
							// clear current div
							$('#dg').empty();
							
							// show new data
							$('#dg').html(data);
						}
					});
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
            <li class="active"><a href="search_index.php">SEARCH</a></li>
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
				<h4>WE HAVE A LOT OF SMOOTHIES</b></h4>
				<p>JUST TAKE A LOOK</p>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- blue wrap -->

<br><br><br>
<div class="container">
	<div class="row centered">
	  <div class="col-lg-2"></div>
	  <div class="col-lg-8">
	    <div class="input-group">
	      <input type="text" name="smoothie" id="smoothieSearch" class="form-control" placeholder="I'm craving...">
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="button">Find Smoothie!</button>
	      </span>
	    </div><!-- /input-group -->
	  </div><!-- /.col-lg-8 -->
	  
	</div><!-- /.row --> 
	<br/>
	<div class="row centered">
		 <div class="col-lg-6"><h4><b>DIETARY RESTRICTION?</b></h4></div>
		 <div class="col-lg-4"><h4><b>LOCATION</b></h4></div>
	</div>
		 <div class="col-lg-2"></div>
		 <div class="col-lg-5">

		
			<?php
				$link = mysqli_connect("stardock.cs.virginia.edu","cs4750ayz7bs","cs4750","cs4750ayz7bs");
				$sql = "SELECT type FROM Dietary_Restriction;";
				$result = mysqli_query($link,$sql);
				if ($result != 0) {
				    echo '<select name="type" id="restriction">';
    				echo '<option value=></option>';
				    $num_results = mysqli_num_rows($result);
				    for ($i=0;$i<$num_results;$i++) {
				        $row = mysqli_fetch_array($result);
				        $type = $row['type'];
				        echo '<option value="' .$type. '">No ' .$type. '</option>';
				    }
				    echo '</select>';
				    echo '</label>';
				}
				mysqli_close($link);
			?>
		</div>

		<div class="col-lg-5">

		
			<?php
				$link = mysqli_connect("stardock.cs.virginia.edu","cs4750ayz7bs","cs4750","cs4750ayz7bs");
				$sql = "SELECT distinct place_name FROM Place;";
				$result = mysqli_query($link,$sql);
				if ($result != 0) {
				    echo '<select name="type" id="place">';
    				echo '<option value=></option>';
				    $num_results = mysqli_num_rows($result);
				    for ($i=0;$i<$num_results;$i++) {
				        $row = mysqli_fetch_array($result);
				        $type = $row['place_name'];
				        echo '<option value="' .$type. '">' .$type. '</option>';
				    }
				    echo '</select>';
				    echo '</label>';
				}
				mysqli_close($link);
			?>
		</div>
	</div>
</div>
			
			
	<div class="container">
		<div class="row centered">
			<br><br>
			<!--
			<div class="col-lg-4">
				<i class="fa fa-desktop"></i>
				<h4>WEB DESIGN</h4>
				<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
			</div><!-- col-lg-4 -->
			<!--
			<div class="col-lg-4">
				<i class="fa fa-cogs"></i>
				<h4>WEB DEVELOPMENT</h4>
				<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
			</div><!-- col-lg-4 -->
			<!--
			<div class="col-lg-4">
				<i class="fa fa-eye"></i>
				<h4>SEO SERVICES</h4>
				<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
			</div><!-- col-lg-4 -->
		</div><!-- row -->
		<br>
		<div class="row centered">
			<br><br>
			<!--
			<div class="col-lg-4">
				<i class="fa fa-heart"></i>
				<h4>SOCIAL MEDIA</h4>
				<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
			</div><!-- col-lg-4 -->
			<!--
			<div class="col-lg-4">
				<i class="fa fa-shopping-cart"></i>
				<h4>E-COMMERCE</h4>
				<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
			</div><!-- col-lg-4 -->
			<!--
			<div class="col-lg-4">
				<i class="fa fa-cloud"></i>
				<h4>CLOUD SERVICES</h4>
				<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
			</div><!-- col-lg-4 -->
		</div><!-- row -->
	</div><!-- container -->


	<!-- SMOOTHIE SECTION -->
	<div id="dg"> <! -- Smoothies will appear below -->
		<!--
		<div class="container">
			<div class="row centered">
				<h4>SMOOTHIES</h4>
				<br>
				<div class="col-lg-4">
                    <!-- START PRICING TABLE -->
                    <!--
                    <div class="pricing-option">
                        <div class="pricing-top">
                            <span class="pricing-edition">Banana Mango</span>
                        </div>
                        <ul>
                            <li><strong>Location</strong></li>
                        </ul>
                        <a href="smoothie.php" class="pricing-signup">SELECT</a>
                    </div><!-- /pricing-option -->
                    <!-- END PRICING TABLE -->
                    <!--
				</div><!-- /col -->
				<!--
				<div class="col-lg-4">
                    <!-- START PRICING TABLE -->
                    <!--
                    <div class="pricing-option">
                        <div class="pricing-top">
                            <span class="pricing-edition">Strawberry</span>
                        </div>
                        <ul>
                            <li><strong>Location</strong></li>
                        </ul>
                        <a href="index.html#" class="pricing-signup">SELECT</a>
                    </div><!-- /pricing-option -->
                    <!-- END PRICING TABLE -->
                    <!--
				</div><!-- /col -->
				<!--
				<div class="col-lg-4">
                    <!-- START PRICING TABLE -->
                    <!--
                    <div class="pricing-option">
                        <div class="pricing-top">
                            <span class="special-label">NEW!</span>
                            <span class="pricing-edition">Mega Green</span>
                        </div>
                        <ul>
                            <li><strong>Location</strong></li>
                        </ul>
                        <a href="index.html#" class="pricing-signup">SELECT</a>
                    </div><!-- /pricing-option -->
                    <!-- END PRICING TABLE -->
                    <!--
				</div><!-- /col -->
				<!--
			</div><!-- row -->
			<!--
		</div><!-- container -->
		<?php
			$mysqli = new mysqli('stardock.cs.virginia.edu', 'cs4750ayz7bs', 'cs4750', 'cs4750ayz7bs');
			if ($mysqli->connect_errno) {
			    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			$name = $_GET['name'];
			if (!($stmt = $mysqli->prepare("SELECT smoothie_id, smoothie_name FROM Smoothie"))) {
			    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$stmt->bind_param("s", $name);
			if (!$stmt->execute()) {
			    echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!$stmt->bind_result($id, $name)) {
			    echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
			}
			echo "<h4> Available Smoothies</h4>";
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
			                     
								 # change to url to show smoothie information
			                echo "<a href='smoothie.php?smoothie_id=$id' class='pricing-signup'>SELECT</a>";
			            echo "</div>"; # /pricing-option
			        # END SMOOTHIE TABLE
					echo "</div>"; # /col 		
			       }
			echo "</div>";
				echo "</div>";
			?>
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