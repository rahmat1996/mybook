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
							<!-- general form elements -->
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Add Category</h3>

									<div class="float-right">
										<a href="<?php echo site_url('category'); ?>" class="btn btn-sm btn-warning"><i class="fas fa-undo-alt"></i> Back</a>
									</div>
								</div>
								<!-- /.card-header -->
								<!-- form start -->

								<?php echo form_open('', ['role' => 'form']); ?>

								<div class="card-body">
									<div class="form-group">
										<?php echo form_label('Category ID', 'category_id'); ?>
										<?php echo form_input('category_id', set_value('category_id'), ['class' => 'form-control', 'id' => 'category_id', 'autofocus' => 'autofocus', 'autocomplete' => 'off']); ?>
										<?php echo form_error('category_id', '<p class="text-danger">', '</p>'); ?>
									</div>
									<div class="form-group">
										<?php echo form_label('Category Name', 'category_name'); ?>
										<?php echo form_input('category_name', set_value('category_name'), ['class' => 'form-control', 'id' => 'category_name', 'autofocus' => 'autofocus', 'autocomplete' => 'off']); ?>
										<?php echo form_error('category_name', '<p class="text-danger">', '</p>'); ?>
									</div>
								</div>

								<div class="card-footer">
									<?php echo form_button(['name' => 'form_submit', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fas fa-save"></i> Save']); ?>
								</div>

								<?php echo form_close(); ?>

							</div>
							<!-- /.card -->
						</div>
					</div>
				</div>
			</section>
			<!-- /.content -->
		</div>
		<?php $this->load->view('admin/_partials/footer'); ?>
	</div>
	<?php $this->load->view('admin/_partials/js'); ?>
	<script>
		$(document).ready(function() {
			<?php if (!empty($this->session->flashdata('notif'))) : ?>
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				Toast.fire({
					icon: '<?php echo $this->session->flashdata('notif'); ?>',
					title: '<?php echo $this->session->flashdata('notif_msg'); ?>'
				});
			<?php endif; ?>
		});
	</script>
</body>

</html>
