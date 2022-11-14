<div class="container-fluid">


	<?php
	// $subtotal = 0;
	// foreach ($tampil as $value) {
	// 	$subtotal = $value->jumlah * $value->harga_tkg;
	?>

	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<?= $this->session->flashdata('message'); ?>

	<div class="table-responsive ">
		<table class="table table-bordered table-hover table-striped responsive">

			<tr align="center" class="tag-responsive">
				<th>ID INVOICE</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>No telp</th>
				<th>Email</th>
				<th>Harga</th>
				<th>Tanggal Acara</th>
				<th>Konfirmasi</th>
				<th>Aksi</th>
			</tr>

			<tr align="center">
				<td data-header="ID INVOICE">
					<div class="main"><?php echo $tampil['id_invoice'] ?></div>
				</td>
				<td data-header="Nama">
					<div class="main"><?php echo $tampil['nama'] ?></div>
				</td>
				<td data-header="Alamat">
					<div class="main"><?php echo $tampil['alamat'] ?></div>
				</td>
				<td data-header="No telp">
					<div class="main"><?php echo $tampil['no_telp'] ?></div>
				</td>
				<td data-header="Email">
					<div class="main"><?php echo $tampil['email'] ?></div>
				</td>

				<td data-header="Harga">
					<div class="main"><?php echo $tampil['harga'] ?>
				</td>

				<td data-header="Tanggal Acara">
					<div class="main"><?php echo $tampil['tgl_acara'] ?></div>
				</td>

				<td data-header="Aksi">
					<a href="<?php echo base_url('jasa/Wedding/konfirmasi/' . $tampil['id_invoice']) ?>">
						<div class="btn btn-success btn-sm"> Konfirmasi </div>
					</a>
				</td>

				<td data-header="Aksi">
					<a href=" <?php echo base_url('jasa/Wedding/tolak_pesanan/' . $tampil['id_invoice']) ?>">
						<div class="btn btn-outline-danger"> Tolak </div>
					</a> <br><br>

					<a href="<?php echo base_url('jasa/Wedding/status_t_d/' . $tampil['id_invoice']) ?>">
						<div class="btn btn-primary btn-sm"> Status </div>
					</a>
				</td>
			</tr>
			<?php
			// }
			?>
		</table>
	</div>
</div>