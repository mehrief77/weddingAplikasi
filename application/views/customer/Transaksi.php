<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="btn-group" role="group">
		<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url('assets/img/printer.png'); ?> " width="30px"> Cetak Laporan
		</button>

		<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
			<a class="dropdown-item" href="<?php echo base_url('Customer/cetak'); ?>" target="_blank" class="btn btn-dark">Cetak pdf</a>
		</div>
	</div> <br><br>


	<div class="table-responsive ">
		<table class="table table-bordered table-hover table-striped responsive">
			<tr align="center" class="tag-responsive">
				<th>ID INVOICE</th>
				<th>ID PESAN</th>
				<th>TANGGAL PESAN</th>
				<th>BATAS BAYAR</th>
				<th>STATUS PEMBAYARAN</th>
				<th>Aksi</th>
			</tr>

			<?php
			$total = 0;
			if ($invoice) {	//kodingan ini utk mengakali pesanan yg kosong sehingga link transaksi tidak error
				foreach ($invoice as $inv) :
			?>

					<tr align="center">
						<td data-header="ID INVOICE">
							<div class="main"><?php echo $inv->id_invoice ?></div>
						</td>
						<td data-header="ID PESAN">
							<div class="main"><?php echo $inv->id_pesan ?></div>
						</td>
						<td data-header="TANGGAL PESAN">
							<div class="main"><?php echo $inv->tgl_pesan ?></div>
						</td>
						<td data-header="BATAS BAYAR">
							<div class="main"><?php echo $inv->batas_bayar ?></div>
						</td>
						<td data-header="STATUS PEMBAYARAN"><?php echo $inv->status_pembayaran ?></td>
						<td data-header="Aksi"><?php echo anchor('Customer/detail/' . $inv->id_invoice, '<div class="btn btn-primary btn-sm">Detail</div>') ?></td>

				<?php endforeach;
			}
				?>
		</table>


	</div>

	<a href="<?php echo base_url('Dashboard_c') ?>">
		<div class="btn btn-danger btn-sm"> Kembali </div>
	</a>
</div>