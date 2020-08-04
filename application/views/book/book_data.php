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
									<h3 class="card-title">Book List</h3>
									<div class="float-right">
										<a href="<?php echo site_url('book/add'); ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus-square"></i> Add New</a>
									</div>
								</div>

								<div class="card-body">
									<table id="tbl_data" class="table table-bordered table-sm">
										<thead>
											<tr>
												<th class='text-center' style="width:50px">No</th>
												<th class='text-center'>Title</th>
												<th class='text-center' style="width: 150px;">Year</th>
												<th class='text-center' style="width: 150px;">Menu</th>
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

	<!-- Modal -->
	<div class="modal fade" id="book_detail">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">

				</div>
				<div class="modal-footer justify-content-end">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal -->

	<?php $this->load->view('admin/_partials/js'); ?>

	<script>
		$(document).ready(function() {
			// Datatable load
			$("table#tbl_data").DataTable({
				responsive: true,
				autoWidth: false,
				serverSide: true,
				processing: true,
				order: [
					[1, "asc"]
				],

				ajax: {
					url: "<?php echo site_url('book/data'); ?>",
					dataSrc: "data",
					type: "POST"
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
						data: 'book_title',
						class: 'text-left align-middle'
					},
					{
						data: 'book_year',
						class: 'text-center align-middle',
						width: 150
					},
					{
						data: null,
						sortable: false,
						searchable: false,
						class: 'text-center align-middle',
						width: 150,
						render: function(data, type, row) {
							var btn_menu = "";
							btn_menu += "<a data-toggle='modal' data-target='#book_detail' data-backdrop='static' class='btn btn-info btn-sm' href='<?php echo site_url('book/detail/'); ?>" + row.book_id + "' title='Detail'><i class='fas fa-info-circle'></i></a> "
							btn_menu += "<a class='btn btn-primary btn-sm btn_edit' href='<?php echo site_url('book/edit/'); ?>" + row.book_id + "' title='Edit'><i class='fas fa-edit'></i></a> "
							btn_menu += "<a class='btn btn-danger btn-sm btn_delete' href='<?php echo site_url('book/delete/'); ?>" + row.book_id + "' title='Delete'><i class='fas fa-trash-alt'></i></a>"
							return btn_menu;
						}
					}
				]
			});

			// popup the message warning before delete data.
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

			// bootstrap modal to show detail book
			$("#book_detail").on('show.bs.modal', function(event) {

				var modal = $(this);

				$.ajax({
					url: event.relatedTarget.href,
					type: 'get',
					dataType: 'json',
					success(data) {
						console.log(data);
						modal.find(".modal-title").text(data.book_title);

						var table = "<table class='table table-bordered table-sm'>";

						table += "<tr>";
						table += "<th style='width:150px'>Book Title:</th>";
						table += "<td>" + data.book_title + "</td>";
						table += "<td rowspan='8' style='width:150px'><img class='img-fluid' src='<?php echo base_url(); ?>/directory/" + data.book_id + "/" + data.book_thumb_image + "'></td>";
						table += "</tr>";

						table += "<tr>";
						table += "<th>Book Year:</th>";
						table += "<td>" + data.book_year + "</td>";
						table += "</tr>";

						var txt_category = "";

						$.each(data.categories, function(i, row) {
							txt_category += "<span class='badge badge-primary'>" + row.category_name + "</span> ";
						});

						table += "<tr>";
						table += "<th>Book Category:</th>";
						table += "<td>" + txt_category + "</td>";
						table += "</tr>";

						var txt_author = "";

						$.each(data.authors, function(i, row) {
							txt_author += "<span class='badge badge-success'>" + row.author_name + "</span> ";
						});

						table += "<tr>";
						table += "<th>Book Author:</th>";
						table += "<td>" + txt_author + "</td>";
						table += "</tr>";

						table += "<tr>";
						table += "<th>Book Language:</th>";
						var lang_name = !!(data.lang_name) ? data.lang_name : '';
						table += "<td>" + lang_name + "</td>";
						table += "</tr>";

						table += "<tr>";
						table += "<th>Book Description:</th>";
						table += "<td>" + data.book_description + "</td>";
						table += "</tr>";

						table += "<tr>";
						table += "<th>Date Added:</th>";
						table += "<td>" + data.date_added + "</td>";
						table += "</tr>";

						table += "<tr>";
						table += "<th>Date Modified:</th>";
						table += "<td>" + data.date_modified + "</td>";
						table += "</tr>";

						modal.find(".modal-body").html(table);
					}
				})
			});

			// reset bootstrap modal after close.
			$("#book_detail").on("hidden.bs.modal", function(event) {
				var modal = $(this);
				modal.find(".modal-title").html('');
				modal.find(".modal-body").html('');
			});

			// Script execute if there are message from server after insert or update data.
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
