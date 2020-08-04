<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>MyBook | About</title>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css'); ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/dist/css/adminlte.min.css'); ?>">
	<!-- Google Font: Source Sans Pro -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
	<style>
		.card-costumize {
			border-radius: 0 !important;
			padding: 0 !important;
		}

		.card-title-costumize {
			float: none !important;
		}

		.card-image-top-costumize {
			max-height: 270px !important;
			min-height: 270px !important;
		}
	</style>
</head>

<body class="hold-transition layout-top-nav">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
			<div class="container">
				<a href="<?php echo base_url(); ?>" class="navbar-brand">
					<span class="brand-text font-weight-light">MyBook</span>
				</a>

				<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse order-3" id="navbarCollapse">
					<!-- Left navbar links -->
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>" class="nav-link">Home</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('home/about'); ?>" class="nav-link">About</a>
						</li>
					</ul>
				</div>

				<!-- Right navbar links -->
				<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
					<!-- Messages Dropdown Menu -->
					<li class="nav-item">
						<?php if ($this->ion_auth->logged_in()) : ?>
							<a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
								<i class="nav-icon fas fa-tachometer-alt"></i> Dashboard
							</a>
						<?php else : ?>
							<a class="nav-link" href="<?php echo base_url('auth'); ?>">
								<i class="fas fa-user"></i> Login
							</a>
						<?php endif; ?>
					</li>
				</ul>
			</div>
		</nav>
		<!-- /.navbar -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container">
					<div class="row mb-2">
						<div class="col-sm-12">
							<h1 class="m-0 text-dark"> About</h1>
						</div>
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="card card-primary card-outline">
								<div class="card-header">
									<h5 class="m-0">About App</h5>
								</div>
								<div class="card-body">
									<table class="table">
										<tr>
											<th>Name App</th>
											<td>MyBook</td>
										</tr>
										<tr>
											<th>Purpose</th>
											<td>To manage your collection pdf ebook, and you can read it via browser.</td>
										</tr>
										<tr>
											<th>Build With</th>
											<td><a href="https://www.php.net/">PHP Programming Language</a> With <a href="https://codeigniter.com/">Codeigniter 3 Framework</a></td>
										</tr>
										<tr>
											<th>And Also With</th>
											<td>
												> Template : <a href="https://adminlte.io/">AdminLTE3</a> <br>
												> Infinite Scroll : <a href="https://jscroll.com/">Jscroll</a> <br>
												> PDF Viewer : <a href="https://mozilla.github.io/pdf.js/">PdfJS</a>
											</td>
										</tr>
									</table>
								</div>
							</div>

							<div class="card card-primary card-outline">
								<div class="card-header">
									<h5 class="m-0">About Usage</h5>
								</div>
								<div class="card-body">
									<table class="table">
										<tr>
											<th>Installation Requirement </th>
											<td>
												1. Apache 2 <br>
												2. PHP 5.6 or Above <br>
												3. MySQL or MariaDB <br>
												or you can install Xampp To get All Installation Requirement
											</td>
										</tr>
										<tr>
											<th>Installation</th>
											<td>
												1. Download or Clone this Repo to your htdocs Folder Or your Web Server Folder. <br>
												2. Configuration database.php (application/config/database.php) to your database environment such as hostname,username,password and database name. <br>
												3. Create database on MySQL or MariaDB with database name like your set on database.php <br>
												4. Open migration.php (application/config/migration.php) set $config['migration_enabled'] to TRUE, set $config['migration_version'] to 3. <br>
												5. Open on your browser -> [Your Domain Local]/mybook/db_migrate to migrate database table structure. example: localhost/mybook/db_migrate. <br>
												6. Open migration.php again, and set $config['migration_enabled'] to FALSE for turn off migration. <br>
												7. Open on your browser [Your Domain Local]/mybook. example: localhost/mybook <br>
												8. To insert a book you can click to Login button on right side navbar and you will redirected to login page. <br>
												9. Default Email is 'admin@admin.com' and Password is 'password'.
											</td>
										</tr>
									</table>
								</div>
							</div>

							<div class="card card-success card-outline">
								<div class="card-header">
									<h5 class="m-0">About Me</h5>
								</div>
								<div class="card-body">
									<table class="table">
										<tr>
											<th>Full Name</th>
											<td>Rahmat</td>
										</tr>
										<tr>
											<th><i class="fas fa-envelope-square"></i> Email</th>
											<td>rahmatbatam14@gmail.com</td>
										</tr>
										<tr>
											<th><i class="fab fa-github-square"></i> Github</th>
											<td><a target='_blank' href="https://github.com/rahmat1996">rahmat1996</a></td>
										</tr>
										<tr>
											<th><i class="fab fa-linkedin"></i> Linkedin</th>
											<td><a target='_blank' href="https://id.linkedin.com/in/rahmat-saja-35371513b">Rahmat Saja</a></td>
										</tr>
									</table>
								</div>
							</div>

						</div>
					</div>
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Main Footer -->
		<footer class="main-footer">
			<!-- To the right -->
			<div class="float-right d-none d-sm-inline">
				Rahmat1996
			</div>
			<!-- Default to the left -->
			<strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->

	<!-- jQuery -->
	<script src="<?php echo base_url('assets/adminlte/plugins/jquery/jquery.min.js'); ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('assets/adminlte/dist/js/adminlte.min.js'); ?>"></script>
	<!-- Jscroll -->
	<script src="<?php echo base_url('assets/jscroll/dist/jquery.jscroll.min.js'); ?>"></script>
	<script>
		var options = {
			padding: 20,
			nextSelector: 'a.next'
		};

		$('div#page').jscroll(options);
	</script>
</body>

</html>
