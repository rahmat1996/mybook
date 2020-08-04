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
										<?php echo lang('edit_user_heading'); ?>
									</h3>
									<div class="float-right">
										<a href="<?php echo site_url('auth'); ?>" class="btn btn-sm btn-warning"><i class="fas fa-undo-alt"></i> Back</a>
									</div>
								</div>

								<?php echo form_open(uri_string()); ?>

								<div class="card-body">

									<div id="infoMessage"><?php echo $message; ?></div>

									<div class="form-group">
										<?php echo lang('edit_user_fname_label', 'first_name'); ?> <br />
										<?php echo form_input($first_name); ?>
									</div>

									<div class="form-group">
										<?php echo lang('edit_user_lname_label', 'last_name'); ?> <br />
										<?php echo form_input($last_name); ?>
									</div>

									<div class="form-group">
										<?php echo lang('edit_user_company_label', 'company'); ?> <br />
										<?php echo form_input($company); ?>
									</div>

									<div class="form-group">
										<?php echo lang('edit_user_phone_label', 'phone'); ?> <br />
										<?php echo form_input($phone); ?>
									</div>

									<div class="form-group">
										<?php echo lang('edit_user_password_label', 'password'); ?> <br />
										<?php echo form_input($password); ?>
									</div>

									<div class="form-group">
										<?php echo lang('edit_user_password_confirm_label', 'password_confirm'); ?><br />
										<?php echo form_input($password_confirm); ?>
									</div>

									<?php if ($this->ion_auth->is_admin()) : ?>

										<h5><?php echo lang('edit_user_groups_heading'); ?></h5>
										<?php foreach ($groups as $group) : ?>
											<label class="checkbox">
												<?php
												$gID = $group['id'];
												$checked = null;
												$item = null;
												foreach ($currentGroups as $grp) {
													if ($gID == $grp->id) {
														$checked = ' checked="checked"';
														break;
													}
												}
												?>
												<input type="checkbox" name="groups[]" value="<?php echo $group['id']; ?>" <?php echo $checked; ?>>
												<?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
											</label>
										<?php endforeach ?>

									<?php endif ?>

									<?php echo form_hidden('id', $user->id); ?>
									<?php echo form_hidden($csrf); ?>
								</div>

								<div class="card-footer">
									<?php echo form_button(['name' => 'submit', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fas fa-save"></i> ' . lang('edit_user_submit_btn')]); ?>
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
