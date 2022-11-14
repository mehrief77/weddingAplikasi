<div class="container-fluid">
	<!-- <h4>Detail Pesanan </h4> -->

	<!-- Page Heading -->
	<?php
	// $total = 0;
	// foreach ($invoice as $psn) :
	// $subtotal = $psn['total'] * $psn['harga'];
	// $total += $subtotal;
	?>
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> <div class="btn btn-success btn-sm">No. Invoice : <?php echo $invoice['id_invoice'] ?></div>
	</h1>

	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<tr align="center" class="tag-responsive">
				<th>ID PESAN</th>
				<th>ID PAKET</th>
				<th>NAMA PAKET</th>
				<th>NAMA WO</th>
				<th>TANGGAL PESAN</th>
				<th>HARGA</th>
				<!-- <th>SUB-TOTAL</th> -->
			</tr>



			<tr align="center">
				<td data-header="ID PESAN">
					<div class="main"><?php echo $invoice['id_pesan'] ?></div>
				</td>
				<td data-header="ID PEKERJA">
					<div class="main"><?php echo $invoice['id_paket'] ?></div>
				</td>
				<td data-header="ID PEKERJA">
					<div class="main"><?php echo $invoice['nama'] ?></div>
				</td>
				<td data-header="ID PEKERJA">
					<div class="main"><?php echo $invoice['nama_wo'] ?></div>
				</td>
				<td data-header="TANGGAL PESAN">
					<div class="main"><?php echo $invoice['tgl_pesan'] ?>
				</td>
				<td data-header="TANGGAL PESAN">
					<div class="main"><?php echo $invoice['harga'] ?>
				</td>
			</tr>

		</table>
	</div>

	<a href="<?php echo base_url('Customer/transaksi') ?>">
		<div class="btn btn-danger btn-sm"> Kembali </div>
	</a>

	<?php $bayar = $this->db->where('id_invoice', $this->uri->segment(3))->get('tb_pembayaran')->num_rows(); ?>
	<?php if ($bayar != 1) : ?>

		<!-- <a href="<?php echo base_url('Customer/bayar/' . $invoice['id_invoice']) ?>">
			<div class="btn btn-success btn-sm"> Bayar </div> -->

		<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#bayar">Bayar</button>
	<?php endif; ?>
	<!-- </a> -->
</div>


<!-- link button Pembayaran -->
<!-- Modal -->
<div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="<?php echo base_url('Customer/bayar/' . $invoice['id_invoice']); ?>" method="post" enctype="multipart/form-data">
					Apakah Anda Yakin Ingin Membayar?
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Ya</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
			</div>
			</form>
		</div>
	</div>
</div>