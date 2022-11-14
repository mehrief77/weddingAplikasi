<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">

			<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

			<form action="<?php echo base_url() . 'Customer/proses_bayar'; ?>" enctype="multipart/form-data" method="post">

				<div class="form-group">
					<label>ID CUSTOMER</label>
					<input type="text" name="id_customer" placeholder="Id Customer" class="form-control" value="<?php echo $invoice[0]['id_customer'] ?>" readonly>
				</div>

				<div class="form-group">
					<label>ID INVOICE</label>
					<input type="text" name="id_invoice" placeholder="Id Invoice" class="form-control" value="<?php echo $invoice[0]['invoice_id'] ?>" readonly>
				</div>

				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" placeholder="nama lengkap anda" class="form-control" value="<?php echo $this->session->userdata('nama') ?>">
				</div>


				<div class="form-group">
					<label>Alamat Lengkap</label>
					<input type="text" name="alamat" placeholder="alamat lengkap anda" class="form-control" value="<?php echo $this->session->userdata('alamat') ?>">
				</div>

				<div class="form-group">
					<label>No. Telpon</label>
					<input type="text" name="no_telp" placeholder="nomer telepon anda" class="form-control" value="<?php echo $this->session->userdata('no_telp') ?>">
				</div>

				<div class="form-group">
					<label>Tanggal Bayar</label>
					<input type="date" name="tgl_bayar" class="form-control">
				</div>

				<div class="form-group">
					<label>Nama Bank</label>
					<input type="text" name="id_bankapp" placeholder="Pembayaran" class="form-control" value="<?php echo $invoice[0]['nama_bank'] ?>" readonly>
				</div>

				<div class="form-group">
					<label>No Rekening</label>
					<input type="text" name="id_bankapp" placeholder="Pembayaran" class="form-control" value="<?php echo $invoice[0]['no_rek'] ?>" readonly>
				</div>

				<div class="form-group">
					<label>Nominal Transfer</label>
					<input type="text" name="nominal_tf" placeholder="Nominal Transfer" class="form-control" value="">
				</div>

				<div class="form-group">
					<label>Bukti Transaksi </label>
					<input type="file" class="form-control" id="bkt_transaksi" name="bkt_transaksi" placeholder="Bukti Transaksi">
				</div>

				<button type="submit" class="btn btn-primary btn-sm mt-3">Konfirmasi</button>

				<!-- <a href="<?php echo base_url('welcome') ?>">
					<div class="btn btn-danger btn-sm mt-3"> Batal </div>
				</a> -->
			</form>

		</div>

		<div class="col-md-2"></div>
	</div>
</div>