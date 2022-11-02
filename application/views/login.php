<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Dashboard">
	<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<title>Dashio - Bootstrap Admin Template</title>

	<!-- Favicons -->
	<link href="img/favicon.png" rel="icon">
	<link href="img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/lib/bootstrap/css/bootstrap.min.css') ?>">
	<!--external css-->
	<link href="<?php echo base_url('assets/lib/font-awesome/css/font-awesome.css') ?>" rel="stylesheet"/>
	<!-- Custom styles for this template -->
	<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/style-responsive.css') ?>" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!--	<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css" rel="stylesheet">-->
	<link href="<?php echo base_url('assets/lib/advanced-datatable/css/DT_bootstrap.css') ?>" rel="stylesheet">
	<!-- =======================================================
  Template Name: Dashio
  Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
  Author: TemplateMag.com
  License: https://templatemag.com/license/
======================================================= -->
</head>

<body>
<!-- **********************************************************************************************************************************************************
	MAIN CONTENT
	*********************************************************************************************************************************************************** -->
<div id="login-page">
	<div class="container">
		<form class="form-login" method="post" id="login" name="login" action="<?php echo base_url('user/login')?>">
			<h2 class="form-login-heading">sign in now</h2>
			<span class="response_msg"></span>
			<div class="login-wrap">
				<div class="form-group">
				<input type="text" id="username" name="username" class="form-control" placeholder="User ID" autofocus>
				<span class=" username text-danger"></span>
			</div>
			<div class="form-group">
				<input type="password" id="password" name="password" class="form-control" placeholder="Password">
				<span class=" password text-danger"></span>
			</div>
				<label class="checkbox">
					<span class="pull-right">
            <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
            </span>
				</label>
				<button class="btn btn-theme btn-block" id="userLogin"  type="submit"><i class="fa fa-lock"></i> SIGN
					IN
				</button>
				<hr>

				<div class="registration">
					Don't have an account yet?<br/>
					<a class="" href="#">
						Create an account
					</a>
				</div>
			</div>
			<!-- Modal -->
			<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal"
				 class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Forgot Password ?</h4>
						</div>
						<div class="modal-body">
							<p>Enter your e-mail address below to reset your password.</p>
							<input type="text" name="email" placeholder="Email" autocomplete="off"
								   class="form-control placeholder-no-fix">
						</div>
						<div class="modal-footer">
							<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
							<button class="btn btn-theme" type="button">Submit</button>
						</div>
					</div>
				</div>
			</div>
			<!-- modal -->
		</form>
	</div>
</div>
<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url('assets/lib/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/lib/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/login.js') ?>"></script>
</body>

</html>
