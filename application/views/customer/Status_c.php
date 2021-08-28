<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

			<img src="<?= base_url('assets/img/man.png'); ?> " width="150px">

			<form action="<?php echo base_url() . 'Customer/update_status_c'; ?>" method="post">

				<div class="form-group">
					<label for="status">Pekerjaan Tukang Saat Ini</label>
					<select class="form-control" name="status_jasa" placeholder="status">
						<option value="">Pilih</option>
						<option value="Proses">Proses</option>
						<option value="Selesai">Selesai</option>
						<option value="Komplen">Komplen</option>
					</select>
				</div>

				<button type="submit" class="btn btn-primary btn-sm mt-3">Update</button>
			</form>

		</div>
	</div>

</div> 