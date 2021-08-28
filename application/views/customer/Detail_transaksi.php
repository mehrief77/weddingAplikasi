<div class="container-fluid">
		<!-- <h4>Detail Pesanan </h4> -->

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> <div class="btn btn-success btn-sm">No. Invoice : <?php echo $invoice->id_invoice ?></div> </h1>

	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<tr align="center" class="tag-responsive">
				<th>ID PEKERJA</th>
				<th>NAMA PEKERJA</th>
				<th>JUMLAH PESANAN</th>
				<th>HARGA SATUAN</th>
				<th>SUB-TOTAL</th>
			</tr>

			<?php
			$total = 0;
			foreach ($pesanan as $psn) :
				$subtotal = $psn->jumlah * $psn->harga_tkg;
				$total += $subtotal;
			?>

				<tr align="center">
					<td data-header="ID PEKERJA"><div class="main"><?php echo $psn->id_tkg ?></div></td>
					<td data-header="NAMA PEKERJA"><div class="main"><?php echo $psn->nama_tkg ?></td>
					<td data-header="JUMLAH PESANAN"><div class="main"><?php echo $psn->jumlah ?></td>
					<td data-header="HARGA SATUAN"><?php echo number_format($psn->harga_tkg, 0, ',', '.') ?></td>
					<td data-header="SUB-TOTAL"><?php echo number_format($subtotal, 0, ',', '.') ?></td>
				</tr>

			<?php endforeach ?> 

			<tr>
				<td colspan="4" align="right"><strong>Grand Total</strong></td>
				<td align="right">Rp. <?php echo number_format($total, 0, ',', '.') ?></td>
			</tr>

		</table>
	</div>

	<a href="<?php echo base_url('Customer/transaksi') ?>">
		<div class="btn btn-danger btn-sm"> Kembali </div>
	</a>

	<?php $bayar = $this->db->where('id_invoice', $this->uri->segment(3))->get('tb_pembayaran')->num_rows(); ?>
	<?php if ($bayar != 1) : ?>

		<!-- <a href="<?php echo base_url('Customer/bayar/' . $psn->id_invoice) ?>">
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
				<form action="<?php echo base_url('Customer/bayar/' . $psn->id_invoice); ?>" method="post" enctype="multipart/form-data">
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