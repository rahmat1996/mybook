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
									<h3 class="card-title">Edit Book</h3>

									<div class="float-right">
										<a href="<?php echo site_url('book'); ?>" class="btn btn-sm btn-warning"><i class="fas fa-undo-alt"></i> Back</a>
									</div>
								</div>
								<!-- /.card-header -->
								<!-- form start -->

								<?php echo form_open_multipart('', ['role' => 'form']); ?>

								<?php echo form_hidden('book_id', $book->book_id); ?>

								<div class="card-body">

									<div class="form-group">
										<?php echo form_label('Book Title', 'book_title'); ?>
										<?php echo form_input('book_title', $book->book_title, ['class' => 'form-control', 'id' => 'category_id', 'autocomplete' => 'off']); ?>
										<?php echo form_error('book_title', '<p class="text-danger">', '</p>'); ?>
									</div>

									<div class="form-group">
										<?php echo form_label('Book Category', 'book_category'); ?>
										<div id="list_book_category">
											<?php if (count($book->categories) == 0) : ?>
												<?php echo form_button('', '+ New', ['class' => 'btn btn-primary btn-sm mb-1', 'onclick' => 'add_category()']); ?>
												<?php echo form_dropdown('book_category[]', ['' => '- category -'] + $categories, '', ['id' => 'book_category', 'class' => 'form-control']); ?>
											<?php else : ?>
												<?php echo form_button('', '+ New', ['class' => 'btn btn-primary btn-sm mb-1', 'onclick' => 'add_category()']); ?>
												<?php foreach ($book->categories as $k => $category) : ?>
													<?php if ($k == 0) : ?>
														<?php echo form_dropdown('book_category[]', ['' => '- category -'] + $categories, $category->category_id, ['id' => 'book_category', 'class' => 'form-control']); ?>
													<?php else : ?>
														<?php echo form_dropdown('book_category[]', ['' => '- category -'] + $categories, $category->category_id, ['id' => 'book_category', 'class' => 'form-control mt-1']); ?>
													<?php endif; ?>
												<?php endforeach; ?>
											<?php endif; ?>
										</div>
									</div>

									<div class="form-group">
										<?php echo form_label('Book Author', 'book_author'); ?>
										<div id="list_book_author">
											<?php if (count($book->authors) == 0) : ?>
												<?php echo form_button('', '+ New', ['class' => 'btn btn-primary btn-sm mb-1', 'onclick' => 'add_author()']); ?>
												<?php echo form_dropdown('book_author[]', ['' => '- author -'] + $authors, '', ['id' => 'book_author', 'class' => 'form-control']); ?>
											<?php else : ?>
												<?php echo form_button('', '+ New', ['class' => 'btn btn-primary btn-sm mb-1', 'onclick' => 'add_author()']); ?>
												<?php foreach ($book->authors as $k => $author) : ?>
													<?php if ($k == 0) : ?>
														<?php echo form_dropdown('book_author[]', ['' => '- author -'] + $authors, $author->author_id, ['id' => 'book_author', 'class' => 'form-control']); ?>
													<?php else : ?>
														<?php echo form_dropdown('book_author[]', ['' => '- author -'] + $authors, $author->author_id, ['id' => 'book_author', 'class' => 'form-control mt-1']); ?>
													<?php endif; ?>
												<?php endforeach; ?>
											<?php endif; ?>
										</div>
									</div>

									<div class="form-group">
										<?php echo form_label('Book Year', 'book_year'); ?>
										<?php echo form_input('book_year', $book->book_year, ['class' => 'form-control', 'id' => 'category_name', 'autocomplete' => 'off']); ?>
										<?php echo form_error('book_year', '<p class="text-danger">', '</p>'); ?>
									</div>

									<div class="form-group">
										<?php echo form_label('Book Language', 'book_language'); ?>
										<?php echo form_dropdown('book_language', ['' => '- language -'] + $languages, $book->book_language, ['id' => 'book_language', 'class' => 'form-control']); ?>
									</div>

									<div class="form-group">
										<?php echo form_label('Book Description', 'book_description'); ?>
										<?php echo form_textarea('book_description', $book->book_description, ['class' => 'form-control', 'id' => 'book_description']); ?>
									</div>

									<div class="form-group">
										<?php echo form_label('Book Image', 'book_image', ['class' => 'form-label']); ?>
										<div class="custom-file">
											<?php echo form_upload('book_image', '', ['id' => 'book_image', 'class' => 'custom-file-input', 'accept' => '.jpg,.jpeg,.png,.gif,.webp']); ?>
											<?php echo form_label('', 'book_image', ['class' => 'custom-file-label']); ?>
										</div>
										<p><small>Fill this field if want to change file! <a target="_blank" href="<?php echo base_url() . 'file/show/' . $book->book_id . '/' . $book->book_image; ?>">click here</a> to preview current file.</small></p>
									</div>

									<div class="form-group">
										<?php echo form_label('Book File', 'book_file', ['class' => 'form-label']); ?>
										<div class="custom-file">
											<?php echo form_upload('book_file', '', ['id' => 'book_file', 'class' => 'custom-file-input', 'accept' => '.pdf']); ?>
											<?php echo form_label('', 'book_file', ['class' => 'custom-file-label']); ?>
										</div>
										<p><small>Fill this field if want to change file! <a target="_blank" href="<?php echo base_url() . 'file/show/' . $book->book_id . '/' . $book->book_file; ?>">click here</a> to preview current file.</small></p>
									</div>

								</div>

								<div class="card-footer">
									<?php echo form_button(['name' => 'form_submit', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fas fa-save"></i> Save']); ?>
									<?php echo form_button(['name' => 'form_submit', 'type' => 'reset', 'class' => 'btn btn-danger', 'content' => '<i class="fas fa-trash-alt"></i> Reset']); ?>
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

			// make field upload file give name file upload
			bsCustomFileInput.init();

			// make textarea to WYSIWYG editor
			$('textarea#book_description').summernote();

			// give alert if there are message from server.
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

			// function to make a new input category.
			function add_category() {
				return $("#book_category").clone().appendTo("#list_book_category").addClass('mt-1').find(":selected").removeAttr("selected");
			}

			// function to make a new input author.
			function add_author() {
				return $("#book_author").clone().appendTo("#list_book_author").addClass('mt-1').find(":selected").removeAttr("selected");
			}
		});
	</script>

</body>

</html>
