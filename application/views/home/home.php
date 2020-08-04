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

	<title>MyBook | Home</title>

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

					<!-- SEARCH FORM -->
					<form action="<?php $_SERVER['PHP_SELF']; ?>" type="GET" class="form-inline ml-0 ml-md-3">
						<div class="input-group input-group-sm">
							<?php if (!empty($this->input->get('search')) || !is_null($this->input->get('search'))) : ?>
								<input class="form-control form-control-navbar" value="<?php echo $this->input->get('search'); ?>" name="search" type="search" placeholder="Search" aria-label="Search">
							<?php else : ?>
								<input class="form-control form-control-navbar" name="search" type="search" placeholder="Search" aria-label="Search">
							<?php endif; ?>
							<div class="input-group-append">
								<button class="btn btn-navbar" type="submit">
									<i class="fas fa-search"></i>
								</button>
							</div>
						</div>
					</form>
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
							<h1 class="m-0 text-dark"> Book List</h1>
						</div>
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<div class="content">
				<div class="container">
					<div id="page">
						<?php if (!empty($this->input->get('search')) || !is_null($this->input->get('search'))) : ?>
							<a href="<?php echo base_url() . 'home/page/?search=' . $this->input->get('search'); ?>" class="next"></a>
						<?php else : ?>
							<a href="<?php echo base_url() . 'home/page/'; ?>" class="next"></a>
						<?php endif; ?>
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
