<div class="container-fluid">
	<h4>Invoice Pemesanan Wedding</h4>

	<div class="navbar-form navbar-right" style="float:right">
		<?php echo form_open('admin/Invoice/search/') ?>
		<input type="text" name="keyword" placeholder="search">
		<input type="submit" name="submit_search" value="search" class="btn sm btn-success">
		<?php echo form_close() ?>
	</div> <br><br>

	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<tr>
				<th>Id Invoice</th>
				<th>Id Customer</th>
				<th>Nama Pemesan</th>
				<th>Alamat</th>
				<th>Tanggal</th>
				<th>Batas Pembayaran</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>

			<!-- <tbody> -->
			<?php foreach ($invoice as $inv) : ?>
				<tr>
					<td><?php echo $inv->id_invoice ?></td>
					<td><?php echo $inv->id_customer ?></td>
					<td><?php echo $inv->nama ?></td>
					<td><?php echo $inv->alamat ?></td>
					<td><?php echo $inv->tgl_pesan ?></td>
					<td><?php echo $inv->batas_bayar ?></td>
					<td><?php echo $inv->status_pembayaran ?></td>
					<td><?php echo anchor('admin/Invoice/detail/' . $inv->id_invoice, '<div class="btn btn-primary btn-sm">Detail</div>') ?></td>
				</tr>
			<?php endforeach ?>
			<!-- </tbody> -->
		</table>
	</div>

	<a href="<?php echo base_url('admin/Invoice/') ?>">
		<div class="btn btn-danger btn-sm"> Kembali </div>
	</a>
</div>