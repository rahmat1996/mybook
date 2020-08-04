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
										<?php echo lang('change_password_heading'); ?>
									</h3>
									<div class="float-right">
										<a href="<?php echo site_url('dashboard'); ?>" class="btn btn-sm btn-warning"><i class="fas fa-undo-alt"></i> Back</a>
									</div>
								</div>

								<?php echo form_open("auth/change_password"); ?>

								<div class="card-body">

									<div id="infoMessage"><?php echo $message; ?></div>

									<div class="form-group">
										<?php echo lang('change_password_old_password_label', 'old_password'); ?> <br />
										<?php echo form_input($old_password); ?>
									</div>

									<div class="form-group">
										<label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length); ?></label> <br />
										<?php echo form_input($new_password); ?>
									</div>

									<div class="form-group">
										<?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm'); ?> <br />
										<?php echo form_input($new_password_confirm); ?>
									</div>

									<?php echo form_input($user_id); ?>
								</div>

								<div class="card-footer">
									<?php echo form_button(['name' => 'submit', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fas fa-save"></i> ' . lang('change_password_submit_btn')]); ?>
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
