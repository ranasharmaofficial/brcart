<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title><?php echo SITE_NAME; ?></title>
	<link href="<?php echo WEB_PATH_ADMIN;?>css/login.css" rel="stylesheet" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
	<style>
		star{
			color:red;
		}
		.error_prefix
		{
			color:red;
		}
		</style>
</head>
<body>

<section class="login-block">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4 login-sec">
				<h2 class="text-center">Login Now</h2>
				<form method="post" action="" autocomplete="off">
					<div class="form-group">
						<label for="exampleInputEmail1" class="text-uppercase">Username</label>
						<input name="username" type="text" placeholder="Enter username" class="form-control" />
						<?php echo form_error('username'); ?>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1" class="text-uppercase">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Enter password"/>
						<?php echo form_error('password'); ?>
					</div>


					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input">
							<small>Remember Me</small>
						</label>
						<button type="submit" type="submit" name="submit" value="submit" class="btn btn-login float-right">Login</button>
					</div>

				</form>
				<div style="cursor:pointer;" class="copy-text">Created with <i class="fa fa-heart"></i><a target="_blank" href="https://ranasharma.com"> by WebFinic</a></div>
			</div>
			<div class="col-md-4">
			</div>
			 
		</div>
</section>

</body>
</html>
