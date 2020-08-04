<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown user user-menu">
			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
				<img src="<?php echo base_url('assets/adminlte/dist/img/avatar5.png'); ?>" class="user-image img-circle elevation-2" alt="user_image" />
				<?php $user = $this->ion_auth->user()->row(); ?>
				<span class="hidden-xs"><?php echo $user->first_name; ?></span>
			</a>
			<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<!-- User image -->
				<li class="user-header bg-primary">
					<img src="<?php echo base_url('assets/adminlte/dist/img/avatar5.png'); ?>" class="img-circle elevation-2" alt="User Image">

					<p>
						<?php $user = $this->ion_auth->user()->row(); ?>
						<?php echo $user->first_name; ?> <?php echo $user->last_name; ?> - <?php echo $this->ion_auth->get_users_groups()->row()->description; ?>
						<small>Member since <?php echo date('d M Y', $user->created_on); ?></small>
					</p>
				</li>
				<!-- Menu Footer-->
				<li class="user-footer">
					<div style="float:left" class="pull-left">
						<a href="<?php echo site_url('auth/change_password'); ?>" class="btn btn-default btn-flat">Edit Password</a>
					</div>
					<div style="float:right" class="pull-right">
						<a href="<?php echo site_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign Out</a>
					</div>
				</li>
			</ul>
		</li>
	</ul>
</nav>
<!-- /.navbar -->
