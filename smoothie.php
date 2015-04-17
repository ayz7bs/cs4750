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
				<h4>SMOOTHIE NAME</h4>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Yummy-in-my-tummy" aria-describedby="basic-addon2">
					</div>
					<!--<i class="fa fa-circle-o"></i> Development<br/>
					<i class="fa fa-link"></i> <a href="#">BlackTie.co</a>-->
				</p>
			</div>
			<div class="col-lg-6">
				<h4>LOCATION</h4>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Smoothie Land" aria-describedby="basic-addon2">
					</div>
					<!--<i class="fa fa-circle-o"></i> Development<br/>
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
				<div class="row">
					<div class="col-lg-3">
					<h4>Fruits</h4>
						<i class="fa fa-circle-o"></i> <label>Strawberries <input type="checkbox" name="ingredient" value="strawberries"></label><br/>
						<i class="fa fa-circle-o"></i> <label>Bananas <input type="checkbox" name="ingredient" value="bananas"></label><br/>
						<i class="fa fa-circle-o"></i> <label>Blueberries <input type="checkbox" name="ingredient" value="blueberries"></label><br/>
						<i class="fa fa-circle-o"></i> <label>Rasberries <input type="checkbox" name="ingredient" value="rasberries"></label><br/>
						<i class="fa fa-circle-o"></i> <label>Oranges <input type="checkbox" name="ingredient" value="oranges"></label><br/>	
						<i class="fa fa-circle-o"></i> <label>Mangos <input type="checkbox" name="ingredient" value="mangos"></label><br/>				
						<i class="fa fa-circle-o"></i> <label>Pineapples <input type="checkbox" name="ingredient" value="pineapples"></label><br/>	
						<i class="fa fa-circle-o"></i> <label>Peaches <input type="checkbox" name="ingredient" value="peaches"></label><br/>	
						<i class="fa fa-circle-o"></i> <label>Apples <input type="checkbox" name="ingredient" value="apples"></label><br/>
						
					</div>
					<div class="col-lg-3">
					<h4>Vegetables</h4>
						<i class="fa fa-circle-o"></i> <label>Mixed Greens <input type="checkbox" name="ingredient" value="mixed greens"></label><br>	
						<i class="fa fa-circle-o"></i> <label>Carrots <input type="checkbox" name="ingredient" value="carrots"></label><br/>		
						<i class="fa fa-circle-o"></i> <label>Spinach <input type="checkbox" name="ingredient" value="spinach"></label><br/>		
						<i class="fa fa-circle-o"></i> <label>Avocado <input type="checkbox" name="ingredient" value="avocado"></label><br/>		
						<i class="fa fa-circle-o"></i> <label>Broccoli <input type="checkbox" name="ingredient" value="broccoli"></label><br/>			
						<i class="fa fa-circle-o"></i> <label>Celery <input type="checkbox" name="ingredient" value="celery"></label><br/>	
						<i class="fa fa-circle-o"></i> <label>Beets <input type="checkbox" name="ingredient" value="beets"></label><br/>
						<i class="fa fa-circle-o"></i> <label>Kale <input type="checkbox" name="ingredient" value="kale"></label><br/>
					</div>
					
					<div class="col-lg-3">
					<h4>Liquids</h4>
						<i class="fa fa-circle-o"></i> <label>Milk <input type="checkbox" name="ingredient" value="milk"></label><br/>	
						<i class="fa fa-circle-o"></i> <label>Water <input type="checkbox" name="ingredient" value="water"></label><br/>
						<i class="fa fa-circle-o"></i> <label>Coconut Milk <input type="checkbox" name="ingredient" value="coconut milk"></label><br/>	
						<i class="fa fa-circle-o"></i> <label>Coconut Water <input type="checkbox" name="ingredient" value="coconut water"></label><br/>
						<i class="fa fa-circle-o"></i> <label>Almond Milk <input type="checkbox" name="ingredient" value="almond milk"></label><br/>
						<i class="fa fa-circle-o"></i> <label>Fruit Juice <input type="checkbox" name="ingredient" value="fruit juice"></label><br/>
					</div>
					
					<div class="col-lg-3">
					<h4>Other</h4>
						<i class="fa fa-circle-o"></i> <label>Ice Cubes <input type="checkbox" name="ingredient" value="ice cubes"></label><br/>
						<i class="fa fa-circle-o"></i> <label>Chia Seeds <input type="checkbox" name="ingredient" value="chia seeds"></label><br/>
						<i class="fa fa-circle-o"></i> <label>Peanut Butter <input type="checkbox" name="ingredient" value="peanut butter"></label><br/>
						<i class="fa fa-circle-o"></i> <label>Yogurt <input type="checkbox" name="ingredient" value="yogurt"></label><br/>
						<i class="fa fa-circle-o"></i> <label>Sugar <input type="checkbox" name="ingredient" value="sugar"></label><br/>
						<i class="fa fa-circle-o"></i> <label>Honey <input type="checkbox" name="ingredient" value="honey"></label><br/>
					</div>
				</div>
			</div>
		</div><!-- row -->

		<br><br>
		<hr>
		<br><br>
		<div class="row">
			<div class="col-lg-12">
				<h4>NUTRITIONAL INFO</h4>
				<p>Fill in the following information.</p>
				<p>
				<class="row">
					<div class="col-lg-4">
					<i class="fa fa-circle-o"></i> Total Calories <div class="input-group">
						<input type="text" class="form-control" placeholder="200" aria-describedby="basic-addon2">
						<span class="input-group-addon" id="basic-addon2">cal</span>
					</div></div>
					<div class="col-lg-4">
					<i class="fa fa-circle-o"></i> Total Fat <div class="input-group">
						<input type="text" class="form-control" placeholder="50" aria-describedby="basic-addon2">
						<span class="input-group-addon" id="basic-addon2">g</span>
					</div></div>
					<div class="col-lg-4">
					<i class="fa fa-circle-o"></i> Vitamin C <div class="input-group">
						<input type="text" class="form-control" placeholder="100" aria-describedby="basic-addon2">
						<span class="input-group-addon" id="basic-addon2">%</span>
					</div></div>
				</class="row">
				</p>
			</div>
		</div><!-- row -->
		<br><br>
		
		<br/>
		<div class="pricing-option">
		<class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4"><a href="create.html#" class="pricing-signup">CREATE SMOOTHIE</a></div>
			<div class="col-lg-4"></div>
		</class="row">
        </div><!-- /pricing-option -->
        <br/><br/>
	</div><!-- container -->

	
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
