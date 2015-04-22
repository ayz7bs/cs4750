<!DOCTYPE html>
<?php
$fruits = array("Strawberries" => 1, "Bananas" => 2, "Blueberries" => 3, "Rasberries" => 4, "Oranges" => 5, "Mangos" => 6, "Pineapples" => 7, "Peaches" => 8, "Apples" => 9);
$veggies = array("Mixed Greens" => 10, "Carrots" => 11, "Spinach" => 12, "Avocados" => 13, "Broccoli" => 14, "Celery" => 15, "Beets" => 16, "Kale" => 17);
$liquids = array("Milk" => 18, "Water" => 19, "Coconut Milk" => 20, "Coconut Water" => 21, "Almond Milk" => 22, "Fruit Juice" => 23);
$others = array("Ice Cubes" => 24, "Chia Seeds" => 25, "Peanut Butter"=> 26, "Yogurt" => 27, "Sugar" => 29, "Honey" => 30);
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>SQ - CREATE</title>

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
            <li class="active"><a href="create.php">CREATE</a></li>
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
				<h4>WE HAVE PLENTY OF SMOOTHIES TO TRY</h4>
				<p>FEEL FREE TO ADD YOUR OWN</p>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!--  bluewrap -->


	<div class="container desc">
		<div class="row">
			<br><br>
			<div class="col-lg-6">
			<form action="create_smoothie.php" method="GET">
				<h4>SMOOTHIE NAME</h4>
					<div class="input-group">
						<input name="smoothie_name" type="text" class="form-control" placeholder="Yummy-in-my-tummy" aria-describedby="basic-addon2">
						
					</div>
					<!-- Development<br/>
					<i class="fa fa-link"></i> <a href="#">BlackTie.co</a>-->
				</p>
			
			</div>
			<div class="col-lg-6">
			<form action="create_smoothie.php" method="GET">
				<h4>LOCATION</h4>
					<div class="input-group">
						<input name="place_name" type="text" class="form-control" placeholder="Smoothie Land" aria-describedby="basic-addon2">
					</div>
					<!-- Development<br/>
					<i class="fa fa-link"></i> <a href="#">BlackTie.co</a>-->
				</p>
			</div>
		</div><!-- row -->
		
		<br><br>
		<hr>
		<br><br>
		
		<div class="row">
			<div class="col-lg-12">
				<h4>INGREDIENTS</h4>
				<p>Use the following as a guide.</p>
				<!-- Replace value with ingredient id -->
				<div class="row">
					<div class="col-lg-3">
					<h4><i class="fa fa-circle-o"></i>Fruits</h4>
					<!-- List all the fruits -->
					<? foreach ($fruits as $fruit => $id){ ?>
					
					<div class="panel-group driving-license-settings" id="accordion">
						<div class="panel panel-default no-background">
							<div class="panel-heading no-border">
								<h4 class="panel-title">
                                      <div class="checkbox no-margin">
										  <label data-toggle="collapse" data-target="#collapse<?=(string)$id?>">
										  <input type="checkbox" name="ingredient[]" value=<?=$id?> /> <?=$fruit?>	
										  </label>
									</div>
								  </h4>
							</div>
								  <div id="collapse<?=(string)$id?>" class="panel-collapse collapse">
									  <div class="panel-body no-padding no-background ">
										  <div id="amount" class="input-group col-lg-8">
										  <form action="create_smoothie.php" method="GET">
											  <input class="form-control" name="quantity[]" type="number">
											  <div class="input-group-btn">
												  <select class="form-control" name="measurement[]">
													  <option>cup(s)</option>
													  <option>ounce(s)</option>
												</select>
											  </div>
										</div>
									</div>
								</div>
						   </div>
					</div>						
					<? } ?>
					</div> 
					
					<div class="col-lg-3">
					<h4><i class="fa fa-circle-o"></i>Vegetables</h4>
					<!-- List all the veggies -->
					<? foreach ($veggies as $veggie => $id){ ?>
					
					<div class="panel-group driving-license-settings" id="accordion">
						<div class="panel panel-default no-background">
							<div class="panel-heading no-border">
								<h4 class="panel-title">
                                      <div class="checkbox no-margin">
										  <label data-toggle="collapse" data-target="#collapse<?=(string)$id?>">
										  <input type="checkbox" name="ingredient[]" value=<?=$id?> /> <?=$veggie?>	
										  </label>
									</div>
								  </h4>
							</div>
								  <div id="collapse<?=(string)$id?>" class="panel-collapse collapse">
									  <div class="panel-body no-padding no-background ">
										  <div id="amount" class="input-group col-lg-8">
										  <form action="create_smoothie.php" method="GET">
											  <input class="form-control" name="quantity[]" type="number">
											  <div class="input-group-btn">
												  <select class="form-control" name="measurement[]">
													  <option>cup(s)</option>
													  <option>ounce(s)</option>
												</select>
											  </div>
										</div>
									</div>
								</div>
						   </div>
					</div>						
					<? } ?>					
					</div>
					
					<div class="col-lg-3">
					<h4><i class="fa fa-circle-o"></i>Liquids</h4>
					<!-- List all the liquids -->
					<? foreach ($liquids as $liquid => $id){ ?>
					
					<div class="panel-group driving-license-settings" id="accordion">
						<div class="panel panel-default no-background">
							<div class="panel-heading no-border">
								<h4 class="panel-title">
                                      <div class="checkbox no-margin">
										  <label data-toggle="collapse" data-target="#collapse<?=(string)$id?>">
										  <input type="checkbox" name="ingredient[]" value=<?=$id?> > <?=$liquid?>	
										  </label>
									</div>
								  </h4>
							</div>
								  <div id="collapse<?=(string)$id?>" class="panel-collapse collapse">
									  <div class="panel-body no-padding no-background ">
										  <div id="amount" class="input-group col-lg-8">
											  <input class="form-control" name="quantity[]" type="number">
											  <div class="input-group-btn">
												  <select class="form-control" name="measurement[]">
													  <option>cup(s)</option>
													  <option>ounce(s)</option>
												</select>
											  </div>
										</div>
									</div>
								</div>
						   </div>
					</div>						
					<? } ?>					
					</div>
					
					<div class="col-lg-3">
					<h4><i class="fa fa-circle-o"></i>Other</h4>
						 <!-- List all the liquids -->
					<? foreach ($others as $other => $id){ ?>
					
					<div class="panel-group driving-license-settings" id="accordion">
						<div class="panel panel-default no-background">
							<div class="panel-heading no-border">
								<h4 class="panel-title">
                                      <div class="checkbox no-margin">
										  <label data-toggle="collapse" data-target="#collapse<?=(string)$id?>">
										  <input type="checkbox" name="ingredient[]" value=<?=$id?> /> <?=$other?>	
										  </label>
									</div>
								  </h4>
							</div>
								  <div id="collapse<?=(string)$id?>" class="panel-collapse collapse">
									  <div class="panel-body no-padding no-background ">
										  <div id="amount" class="input-group col-lg-8">
											  <input class="form-control" name="quantity[]" type="number ">
											  <div class="input-group-btn">
												  <select class="form-control" name="measurement[]">
													  <option>cup(s)</option>
													  <option>ounce(s)</option>
												</select>
											  </div>
										</div>
									</div>
								</div>
						   </div>
					</div>						
					<? } ?>				
					</div>
				</div>
	
		<br><br>
		<div class="row">
			<div class="col-lg-12">
				<h4>NUTRITIONAL INFO</h4>
				<p>Fill in the following information.</p>
				<p>
				<class="row">
					<div class="col-sm-2">
					<form action="create_smoothie.php" method="GET">
					 <i class="fa fa-circle-o"></i> Total Calories <div class="input-group">
						<input name="calories" type="number" class="form-control" placeholder="200" aria-describedby="basic-addon2" value="0">
						<span class="input-group-addon" id="basic-addon2">cal</span>
					</div></div>
					<div class="col-sm-2">
					 <i class="fa fa-circle-o"></i> Sugar <div class="input-group">
						<input name="sugar" type="number" class="form-control" placeholder="50" aria-describedby="basic-addon2" value="0">
						<span class="input-group-addon" id="basic-addon2">g</span>
					</div></div>
					<div class="col-sm-2">
					 <i class="fa fa-circle-o"></i> Fiber <div class="input-group">
						<input name="fiber" type="number" class="form-control" placeholder="100" aria-describedby="basic-addon2" value="0">
						<span class="input-group-addon" id="basic-addon2">g</span>
					</div></div>
					<div class="col-sm-2">
					 <i class="fa fa-circle-o"></i> Protein <div class="input-group">
						<input name="protein" type="number" class="form-control" placeholder="200" aria-describedby="basic-addon2" value="0">
						<span class="input-group-addon" id="basic-addon2">g</span>
					</div></div>
					<div class="col-sm-2">
					 <i class="fa fa-circle-o"></i> Calcium <div class="input-group">
						<input name="calcium" type="number" class="form-control" placeholder="100" aria-describedby="basic-addon2" value="0">
						<span class="input-group-addon" id="basic-addon2">%</span>
					</div>
					
				</div>
			</div>
		</div><!-- row -->
		<br><br>
		
		<div class="row">
			<div class="col-lg-12">
				<p>The smoothie contains the following:</p>
				<p>
				<class="row">
					<div class="col-sm-2">
					<div class="checkbox">
						<label>
						<input type="checkbox" name="restriction[]" value=3 > Lactose
						</label>
					</div></div>
					<div class="col-sm-2">
					 	<div class="checkbox">
						<label>
						<input type="checkbox" name="restriction[]" value=1 > Nuts
						</label>
					</div></div>
					<div class="col-sm-2">
					 	<div class="checkbox">
						<label>
						<input type="checkbox" name="restriction[]" value=5 > Sugars
						</label>
					</div></div>
					<div class="col-sm-2">
					</div>
					<div class="col-sm-2">
					</div>
					
				</div>
			</div>
		</div><!-- row -->
		<br><br>
		
		<br/>
		<div class="pricing-option">
		<class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
			<button type="submit" formaction="create_smoothie.php" class="pricing-signup">CREATE SMOOTHIE</button>
			</div>
			</form>
			<div class="col-lg-4"></div>
		</class="row">
        </div><!-- /pricing-option -->
        <br/><br/>
	</div><!-- container -->
</div>
</div>

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
  </body></html>