<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
	
    <title>Smoothie Queens</title>
    

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
			
				$("button#submit").click(function(){
					$.ajax({
						type: "POST",
						url: "signup.php",
						data: $('#signupform').serialize(),
						success: function(msg){
							$("#result").html(msg)
							$("#myModal").modal('hide');	
							},
							error: function(){
								alert("failure");
								}
					});
				});
				
				/* $("button#signin").click(function(){
					$.ajax({
						type: "POST",
						url: "checklogin.php",
						data: {myusername: ("#myusername").val(), mypassword: ("#mypassword").val() },
						error: function(){
								alert("Incorrect username or password.");
								}
					});
				}); */
				
				
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
          <a class="navbar-brand" href="#"><i class=""></i></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a data-toggle="modal" data-target="#myModal" href="#myModal"><i class="fa fa-envelope-o"></i></a></li>-->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<div class="container w">
		<div class="row centered">
		
			<div class="col-lg-4">
			</div><!-- col-lg-4 -->
			
			<div class="col-lg-4">
		
		<form id="loginform" name="form1" method="post" action="checklogin.php">
        	<h2 class="form-signin-heading">Welcome! Please Sign In.</h2>
			<label for="username" class="sr-only">Username</label>
			<input name="myusername" type="text" id="myusername" class="form-control" placeholder="Username" autocomplete="off" required autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
			<input name="mypassword" type="password" id="mypassword" class="form-control" placeholder="Password" required>
			<div class="checkbox">
			</div>
       		<button id="signin" class="btn btn-lg btn-success btn-block" type="submit" value="Login">Sign In</button>
       		<a href="#myModal" role="button" class="btn btn-large btn-primary btn-block" data-toggle="modal">Sign Up</a><br>
       		<!--<div id="result"></div>-->
       </form>

       <div id="result"></div>
      
	</div><!-- col-lg-4 -->

		<div class="col-lg-4">
		</div><!-- col-lg-4 -->
		</div><!-- row -->
		<br>
		<br>
	</div><!-- container -->

		<div id="headerwrap">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-8 col-lg-offset-2">
				<h1> <b>Smoothie Queens</b></h1>
				<h2>A Yummy Search Engine</h2>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- headerwrap -->
	
	
	<div id="r">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-8 col-lg-offset-2">
					<h4>EAT. PRAY. DRINK SMOOTHIES.</h4>
					<p>Who doesn't love a bunch of fruits or veggies mixed in a liquid form?</p>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><! -- r wrap -->

	<!-- REGISTRATION MODAL -->
	
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Join the Smoothie Queens</h4>
	      </div>
	      <div class="modal-body">
		        <div class="row centered">
		        	<div class="span3">
						<h2>Sign Up</h2>
	        
						<form id="signupform">
							<label for="username" class="sr-only">Username</label>
							<input name="myusername" type="text" id="myusername" class="form-control" placeholder="Username" autocomplete="off" required autofocus>
							<label for="inputPassword" class="sr-only">Password</label>
							<input name="mypassword" type="password" id="mypassword" class="form-control" placeholder="Password" required>
							<label for="cinputPassword" class="sr-only">Confirm Password</label>
							<input name="cmypassword" type="password" id="cmypassword" class="form-control" placeholder="Confirm Password" required><br>
							<!--<input id="submitform" name="submitform" class="btn btn-primary" type="submit" value="Sign-Up"></td> </tr><br>-->
						</form> 
						</div>
							<div class="modal-footer">
								<button class="btn btn-primary" id="submit">Sign Up</button>
								<!--<a href="#" class="btn" data-dismiss="modal">Close</a>-->
							</div>
						</div>
					</div>
				</div>
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



