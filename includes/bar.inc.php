	<nav class="navbar navbar-default top-bar" role="navigation">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href=".">TSS Library</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="."><span class="glyphicon glyphicon-home"></span> Home </a></li>
	        <li><a href="books.php"><span class="glyphicon glyphicon-book"></span> Books </a></li>
	        <li><a href="vdos.php"><span class="glyphicon glyphicon-play"></span> Video Lectures </a></li>
	        <li><a href="#" data-toggle="modal" data-target="#comingSoon"> Discussions </a></li>
	        <li><a href="#" data-toggle="modal" data-target="#comingSoon"><span class="glyphicon glyphicon-envelope"></span> Suggest Us </a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-user"></span> Login </a></li>
	        <li><a href="#" data-toggle="modal" data-target="#registerModal"><span class="glyphicon glyphicon-plus"></span> Register </a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<!-- Coming Soon Modal -->
	<div class="modal fade" id="comingSoon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h1 class="modal-title">Coming Soon...</h1>
	      </div>
	      <div class="modal-body">
	        This area is still under construction. Re-visit later!
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Login Modal -->
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h1 class="modal-title">User Login</h1>
	      </div>
	      <div class="modal-body">
	      	<form name="loginForm" role="form">
			      <div class="form-group">
			        <label for="loginUsername">Username</label>
			        <input class="form-control" name="username" id="loginUsername" type="text">
			      </div>
			      <div class="form-group">
			        <label for="loginPassword">Password</label>
			        <input class="form-control" name="password" id="loginPassword" type="password">
			      </div>
			      <div class="checkbox">
			        <label>
			          <input type="checkbox" name="remember">
			          Remember Me
			        </label>
			      </div>
			      <div class="row">
			      	<div class="col-xs-4"><button type="submit" class="btn btn-primary btn-lg">Login</button></div> <div class="col-xs-4"><button type="button" class="btn btn-primary btn-lg">Register</button></div>
			      </div>
                  <div class="row note" id="loginNote"></div>
			    </form>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h1 class="modal-title">Registration Form</h1>
	      </div>
	      <div class="modal-body">
	        <form name="registerForm" role="form">
			      <div class="form-group">
			      	<div class="row">
				      	<div class="col-md-6">
					        <label for="registerUsername">Username</label>
					        <input class="form-control" name="username" id="registerUsername" type="text">
				  			</div>
				  		</div>
			      </div>
			      <div class="form-group">
			      	<div class="row">
				      	<div class="col-md-8">
					        <label for="registerFName">Full Name</label>
					        <input class="form-control" name="fname" id="registerFName" type="text">
					      </div>
					    </div>
			      </div>
			      <div class="form-group">
			      	<div class="row">
				      	<div class="col-md-6">
					        <label for="registerPassword">Password</label>
					        <input class="form-control" name="password" id="registerPassword" type="password">
					      </div>
					      <div class="col-md-6">
					        <label for="registerConfPassword">Confirm Password</label>
					        <input class="form-control" name="confirmPassword" id="registerConfPassword" type="password">
					      </div>
					    </div>
			      </div>
			      <div class="form-group">
			      	<div class="row">
				      	<div class="col-md-6">
					        <label for="registerEmail">E-Mail Address</label>
					        <input class="form-control" name="email" id="registerEmail" type="text">
				  			</div>
				  			<div class="col-md-6">
					        <label for="registerConfEmail">Confirm E-Mail Address</label>
					        <input class="form-control" name="confirmEmail" id="registerConfEmail" type="text" autocomplete="off">
				  			</div>
				  		</div>
			      </div>
			      <div class="form-group">
			      	<div class="row">
				      	<div class="col-md-2">
					        <label for="registerDept">Dept.</label>
					        <input class="form-control" name="dept" id="registerDept" type="text">
					      </div>
					      <div class="col-md-5">
					        <label for="registerRNo">Roll No.</label>
					        <input class="form-control" name="rno" id="registerRNo" type="text" maxLength="12">
					      </div>
					      <div class="col-md-5">
					        <label for="registerPhone">Phone No.</label>
					        <input class="form-control" name="phone" id="registerPhone" type="text" maxLength="10">
					      </div>
					    </div>
			      </div>
			      <div class="row">
			      	<div class="col-md-5">
			      		<label for="registerCaptcha">Prove that you are a human :</label>
				      	<div id="registerCaptcha">
                                            <div class="panel panel-default">
                                              <div class="panel-body" style="padding:0px">
                                                <img id="captchaImage" src="includes/displayCaptcha.inc.php"><button type="button" id="reloadCaptcha" class="btn btn-default" style="margin-left:5px"><span class="glyphicon glyphicon-refresh" ></span></button>
                                              </div>
                                            </div>
                                        </div>
                                        <input type="text" placeHolder="Captcha goes here..." class="form-control" name="captcha" id="registerCaptcha" maxLength="5">
							</div>
			      </div>
			      <div class="checkbox">
			        <label>
			          <input name="terms" type="checkbox">
			          I agree to <a href="terms.html" target="_blank">terms and conditions</a>
			        </label>
			      </div>
			      <div class="row">
			      	<div class="col-md-4"><button type="submit" class="btn btn-primary btn-lg btn-block">Login</button></div> <div class="col-md-4"><button type="button" class="btn btn-primary btn-lg btn-block">Register</button></div>
			      </div>
                  <div class="row note" id="registerNote"></div>  
			    </form>
	      </div>
	    </div>
	  </div>
	</div>