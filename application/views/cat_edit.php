<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Begin page content -->
<main role="main" class="container">
	<section class="jumbotron text-center">
		<div class="container">
			
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					
					<?php    
						$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
					?>
					<?php echo validation_errors(); ?>

					<?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>

					<?php echo form_open( current_url(), array('class' => 'needs-validation', 'novalidate' => '') ); ?>

					<?php foreach ($detailKat as $key) { ?>
					<div class="form-group">
						<label for="cat_name">Nama Kategori</label>
						<input type="text" class="form-control" name="cat_name" value="<?php echo $key['cat_name']?>" required>
					</div>
					<div class="form-group">
						<label for="text">Deskripsi</label>
						<input type="text" class="form-control" name="cat_description" value="<?php echo $key['cat_description'] ?>" required>
					</div>
					<button id="submitBtn" type="submit" class="btn btn-primary">Simpan</button>
				</form>

				<?php } ?>
			</div>
		</div>
	</div>
</section>
</main>