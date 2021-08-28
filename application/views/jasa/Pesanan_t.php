<div class="container-fluid">

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
				<th>Tanggal Pesan</th>
				<th>Aksi</th>
			</tr>

			<?php
			$subtotal = 0;
			foreach ($tampil as $value) {
				$subtotal = $value->jumlah * $value->harga_tkg;
			?>
				<tr align="center">
					<td data-header="ID INVOICE">
						<div class="main"><?php echo $value->id_invoice; ?></div>
					</td>
					<td data-header="Nama">
						<div class="main"><?php echo $value->nama; ?></div>
					</td>
					<td data-header="Alamat">
						<div class="main"><?php echo $value->alamat; ?></div>
					</td>
					<td data-header="No telp">
						<div class="main"><?php echo $value->no_telp; ?></div>
					</td>
					<td data-header="Email">
						<div class="main"><?php echo $value->email; ?></div>
					</td>
					<td data-header="Harga">
						<div class="main"><?php echo number_format($subtotal, 0, ',', '.'); ?></div>
					</td>
					<td data-header="Tanggal Pesan">
						<div class="main"><?php echo $value->batas_bayar; ?></div>
					</td>
					<td data-header="Aksi">
						<a href=" <?php echo base_url('jasa/Tukang/tolak_pesanan/' . $value->id_invoice) ?>">
							<div class="btn btn-outline-danger"> Tolak </div>
						</a>

						<!-- <a href="<?php echo base_url('jasa/Tukang/status_t/' . $value->id_invoice) ?>">
							<div class="btn btn-primary btn-sm"> Status </div>
						</a> -->

						<a href="<?php echo base_url('jasa/Tukang/status_t_d/' . $value->id_invoice) ?>">
							<div class="btn btn-primary btn-sm"> Status </div>
						</a>
					</td>
				</tr>
			<?php
			}
			?>
		</table>
	</div>
</div>