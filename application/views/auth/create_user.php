<html>

<head>
	<?php $this->load->view('admin/_partials/head'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<?php $this->load->view('admin/_partials/navbar'); ?>
		<?php $this->load->view('admin/_partials/sidebar'); ?>
		<div class="content-wrapper">
			<?php $this->load->view('admin/_partials/header_content'); ?>
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">

							<!-- Default box -->
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">
										<?php echo lang('create_user_heading'); ?>
									</h3>
									<div class="float-right">
										<a href="<?php echo site_url('auth'); ?>" class="btn btn-sm btn-warning"><i class="fas fa-undo-alt"></i> Back</a>
									</div>
								</div>

								<?php echo form_open("auth/create_user"); ?>

								<div class="card-body">

									<div id="infoMessage"><?php echo $message; ?></div>

									<div class="form-group">
										<?php echo lang('create_user_fname_label', 'first_name'); ?>
										<?php echo form_input($first_name); ?>
									</div>

									<div class="form-group">
										<?php echo lang('create_user_lname_label', 'last_name'); ?>
										<?php echo form_input($last_name); ?>
									</div>

									<?php
									if ($identity_column !== 'email') {
										echo '<div class="form-group">';
										echo lang('create_user_identity_label', 'identity');
										echo '<br />';
										echo form_error('identity');
										echo form_input($identity);
										echo '</div>';
									}
									?>

									<div class="form-group">
										<?php echo lang('create_user_company_label', 'company'); ?> <br />
										<?php echo form_input($company); ?>
									</div>

									<div class="form-group">
										<?php echo lang('create_user_email_label', 'email'); ?> <br />
										<?php echo form_input($email); ?>
									</div>

									<div class="form-group">
										<?php echo lang('create_user_phone_label', 'phone'); ?> <br />
										<?php echo form_input($phone); ?>
									</div>

									<div class="form-group">
										<?php echo lang('create_user_password_label', 'password'); ?> <br />
										<?php echo form_input($password); ?>
									</div>

									<div class="form-group">
										<?php echo lang('create_user_password_confirm_label', 'password_confirm'); ?> <br />
										<?php echo form_input($password_confirm); ?>
									</div>
								</div>

								<div class="card-footer">
									<?php echo form_button(['name' => 'submit', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fas fa-save"></i> ' . lang('create_user_submit_btn')]); ?>
								</div>

								<?php echo form_close(); ?>

								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
					</div>
				</div>
			</section>
			<!-- /.content -->
		</div>
	</div>
	<?php $this->load->view('admin/_partials/js'); ?>
</body>

</html>
