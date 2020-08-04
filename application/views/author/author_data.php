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
									<h3 class="card-title">Author List</h3>
									<div class="float-right">
										<a href="<?php echo site_url('author/add'); ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus-square"></i> Add New</a>
									</div>
								</div>

								<div class="card-body">
									<table id="tbl_data" class="table table-bordered table-sm">
										<thead>
											<tr>
												<th class='text-center' style="width:50px;">No</th>
												<th class='text-center'>Author Name</th>
												<th class='text-center' style="width:150px;">Menu</th>
											</tr>
										</thead>
									</table>
								</div>
								<!-- /.card-body -->
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

			// load datatables.
			$('#tbl_data').DataTable({
				responsive: true,
				autoWidth: false,
				serverSide: true,
				processing: true,
				order: [
					[1, "asc"]
				],

				ajax: {
					url: '<?php echo site_url('author/data'); ?>',
					dataSrc: 'data',
					type: 'POST'
				},
				columns: [{
						data: null,
						width: 50,
						sortable: false,
						searchable: false,
						class: 'text-center align-middle',
						render: function(data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1;
						}
					},
					{
						data: 'author_name',
						class: 'text-left align-middle'
					},
					{
						data: null,
						sortable: false,
						searchable: false,
						class: 'text-center align-middle',
						width: 150,
						render: function(data, type, row) {
							var btn_menu = "";
							btn_menu += "<a class='btn btn-primary btn-sm btn_edit' href='<?php echo site_url('author/edit/'); ?>" + row.author_id + "'><i class='fas fa-edit'></i> Edit</a> "
							btn_menu += "<a class='btn btn-danger btn-sm btn_delete' href='<?php echo site_url('author/delete/'); ?>" + row.author_id + "'><i class='fas fa-trash-alt'></i> Delete</a>"
							return btn_menu;
						}
					}
				]
			});
		});

		// popup message before delete data.
		$("table#tbl_data").on("click", ".btn_delete", function(event) {
			event.preventDefault();
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.value) {
					window.location.href = event.currentTarget.href;
				}
			});
		});

		// return a message from server.
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
	</script>

</body>

</html>
