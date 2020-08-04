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
										<?php echo lang('edit_group_heading'); ?>
									</h3>
									<div class="float-right">
										<a href="<?php echo site_url('auth'); ?>" class="btn btn-sm btn-warning"><i class="fas fa-undo-alt"></i> Back</a>
									</div>
								</div>

								<?php echo form_open(current_url()); ?>

								<div class="card-body">

									<div id="infoMessage"><?php echo $message; ?></div>

									<div class="form-group">
										<?php echo lang('edit_group_name_label', 'group_name'); ?> <br />
										<?php echo form_input($group_name); ?>
									</div>

									<div class="form-group">
										<?php echo lang('edit_group_desc_label', 'description'); ?> <br />
										<?php echo form_input($group_description); ?>
									</div>
								</div>

								<div class="card-footer">
									<?php echo form_button(['name' => 'submit', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fas fa-save"></i> ' . lang('edit_group_submit_btn')]); ?>
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
