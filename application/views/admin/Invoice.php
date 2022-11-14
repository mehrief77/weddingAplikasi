<div class="container-fluid">

	<div class="navbar-form navbar-right" style="float:right">
		<?php echo form_open('admin/Invoice/search/') ?>
		<input type="text" name="keyword" placeholder="search">
		<input type="submit" name="submit_search" value="search" class="btn sm btn-success">
		<?php echo form_close() ?>
	</div> <br><br>

	<div class="btn-group" role="group">
		<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url('assets/img/printer.png'); ?> " width="30px"> Cetak Laporan
		</button>

		<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
			<a class="dropdown-item" href="<?php echo base_url('admin/Invoice/cetak'); ?>" target="_blank" class="btn btn-dark">Cetak pdf
			</a>
		</div>
	</div> <br><br>

	<?= $this->session->flashdata('message'); ?>

	<h4>Invoice Pemesanan Jasa</h4>
	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<tr>
				<!-- <th>Id inv</th> -->
				<!-- <th>Id Paket</th> -->
				<th>Id customer</th>
				<th>Nama Pemesan</th>
				<th>Alamat</th>
				<th>Tanggal</th>
				<th>Batas Pembayaran</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>


			<?php foreach ($invoice as $inv) : ?>
				<tr>
					<!-- <td><?php echo $inv->id ?></td> -->
					<!-- <td><?php echo $inv->id_paket ?></td> -->
					<td><?php echo $inv->id ?></td>
					<td><?php echo $inv->nama_customer ?></td>
					<td><?php echo $inv->alamat ?></td>
					<td><?php echo $inv->tgl_pesan ?></td>
					<td><?php echo $inv->batas_bayar ?></td>
					<td><?php echo $inv->status_pembayaran ?></td>
					<td><?php echo anchor('admin/Invoice/detail/' . $inv->invoice_id, '<div class="btn btn-primary btn-sm">Detail</div>') ?></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</div>