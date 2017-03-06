<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>管理者登入</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/adminLogin.css">

	</head>
	<body>
		
		<div class="holder">
			
				<div class="loginInput">

					<form action="<?php echo base_url(); ?>admin_login" method="post">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="account" name="adminAccount">
						</div>
						<div class="input-group">
							<input type="password" class="form-control" placeholder="password" name="adminPassword">
						</div>
						<div class="input-group">
							<button class="btn btn-info" type="submit">登入</button>
						</div>
					</form>	
				
				</div>
		</div>
			
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
