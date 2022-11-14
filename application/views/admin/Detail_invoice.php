<div class="container-fluid">
	<h4>Detail Pesanan <div class="btn btn-success btn-sm">No. Invoice : <?php echo $invoice['id_invoice'] ?></div>
	</h4>

	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<tr align="center">
				<th>ID Invoice</th>
				<th>ID Paket</th>
				<th>ID WO</th>
				<th>NAMA paket</th>
				<th>NAMA wo</th>
				<th>NO.REK WO</th>
				<th>JUMLAH Orderan</th>
				<th>HARGA </th>
			</tr>

			<?php
			// $total = 0;
			// foreach ($pesanan as $psn) :
			// 	$subtotal = $psn->total * $psn->harga;
			// 	$total += $subtotal;
			?>

			<tr align="center">
				<td><?php echo $invoice['id_invoice'] ?></td>
				<td><?php echo $invoice['id_paket'] ?></td>
				<td><?php echo $invoice['id_wo'] ?></td>
				<td><?php echo $invoice['nama_paket'] ?></td>
				<td><?php echo $invoice['nama_wo'] ?></td>
				<td><?php echo $invoice['no_rek'] ?></td>
				<td><?php echo $invoice['total'] ?></td>
				<td><?php echo $invoice['harga'] ?></td>

			</tr>



			<tr>
				<!-- <td colspan="4" align="right"><strong>Grand Total</strong></td> -->
				<!-- <td align="right">Rp. <?php echo number_format($total, 0, ',', '.') ?></td> -->
			</tr>

		</table>
	</div>

	<a href="<?php echo base_url('admin/Invoice/index') ?>">
		<div class="btn btn-danger btn-sm"> Kembali </div>
	</a>

	<a href="<?php echo base_url('admin/Invoice/cek_bukti/' .  $invoice['id_invoice']) ?>">
		<div class="btn btn-primary btn-sm"> Cek Bukti </div>
	</a>

	<a href="<?php echo base_url('admin/Invoice/status_dr_c/' .  $invoice['id_invoice'])  ?>">
		<div class="btn btn-success btn-sm"> <img src="<?= base_url('assets/img/status.png'); ?> " width="20px"> Status Customer </div>
	</a>

	<!-- <a href="<?php echo base_url('admin/Invoice/status_c/' .  $invoice['id_invoice'])  ?>">
		<div class="btn btn-success btn-sm"> <img src="<?= base_url('assets/img/status.png'); ?> " width="20px"> Status Customer </div>
	</a> -->
	<!-- <td><?php echo anchor('admin/Invoice/status_c/' .  $invoice['id_invoice'], '<div class="btn btn-success btn-sm">Status Customer</div>') ?></td> -->

</div>