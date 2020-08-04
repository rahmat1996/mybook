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
										<?php echo lang('deactivate_heading'); ?>
									</h3>
									<div class="float-right">
										<a href="<?php echo site_url('auth'); ?>" class="btn btn-sm btn-warning"><i class="fas fa-undo-alt"></i> Back</a>
									</div>
								</div>

								<?php echo form_open("auth/deactivate/" . $user->id); ?>

								<div class="card-body">
									<p><?php echo sprintf(lang('deactivate_subheading'), $user->username); ?></p>

									<div class="form-group">
										<?php echo lang('deactivate_confirm_y_label', 'confirm'); ?>
										<input type="radio" name="confirm" value="yes" checked="checked" />
										<?php echo lang('deactivate_confirm_n_label', 'confirm'); ?>
										<input type="radio" name="confirm" value="no" />
									</div>

									<?php echo form_hidden($csrf); ?>
									<?php echo form_hidden(['id' => $user->id]); ?>
									<!-- /.card-body -->
								</div>
								
								<div class="card-footer">
									<?php echo form_button(['name' => 'submit', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fas fa-save"></i> ' . lang('deactivate_submit_btn')]); ?>
								</div>

								<?php echo form_close(); ?>
								
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
