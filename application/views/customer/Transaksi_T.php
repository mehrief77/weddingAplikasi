<div class="container-fluid">
	<!-- <h4>Detail Pesanan <div class="btn btn-success btn-sm">No. Invoice : <?php echo $invoice->id_invoice ?></div></h4> -->

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped responsive">
			<tr align="center" class="tag-responsive">	
				<th>ID INVOICE</th>
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
						<td data-header="ID INVOICE" ><div class="main"><?php echo $inv->id_invoice ?></div></td>
						<td data-header="TANGGAL PESAN"><div class="main"><?php echo $inv->tgl_pesan ?></div></td>
						<td data-header="BATAS BAYAR"><div class="main"><?php echo $inv->batas_bayar ?></div></td>
						<td data-header="STATUS PEMBAYARAN"><?php echo $inv->status_pembayaran ?></td>
						<td data-header="Aksi"><?php echo anchor('Customer/detail_status/' . $inv->id_invoice, '<div class="btn btn-primary btn-sm">Detail</div>') ?></td>

				<?php endforeach;
			}
				?>
		</table>


	</div>

	<a href="<?php echo base_url('Dashboard_c') ?>">
		<div class="btn btn-primary btn-sm"> Kembali </div>
	</a>
</div>