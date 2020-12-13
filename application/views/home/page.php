<div class="row">
	<?php foreach ($books as $book) : ?>
		<div class="card card-costumize col-lg-2 col-md-3 col-sm-4 col-6">
			<img class="card-img-top card-image-top-costumize" 
                             src="<?php echo base_url() . 'directory/' . $book->book_id . '/' . $book->book_thumb_image; ?>" 
                             alt="<?php echo $book->book_thumb_image; ?>">
			<div class="card-body">
				<h5 class="card-title card-title-costumize text-center"><?php echo $book->book_title; ?></h5>
			</div>
			<div class="card-footer">
				<div class="d-flex align-items-center justify-content-between">
					<a target="_blank" 
                                           href="<?php echo base_url().'pdf/web/viewer.html?file='. base_url().'file/show/' . $book->book_id . '/' . $book->book_file; ?>" 
                                           class="btn btn-primary">
                                            <i class="fas fa-book"></i>
                                        </a>
					<a href="<?php echo base_url() . 'file/download/' . $book->book_id; ?>" 
                                           class="btn btn-primary">
                                            <i class="fas fa-download"></i>
                                        </a>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<div>
	<?php echo $this->pagination->create_links(); ?>
</div>
