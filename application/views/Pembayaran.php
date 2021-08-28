<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="btn btn-success btn-sm">
				<?php
				$grand_total = 0;
				if ($keranjang = $this->cart->contents()) {
					foreach ($keranjang as $item) {
						$grand_total = $grand_total + $item['subtotal'];
					}

					echo "<h4>Total Belanja Anda : Rp. </ha>" . number_format($grand_total, 0, ',', '.');

				?>
			</div>
			<br><br>

			<?php
					$id_tukang = null;
					foreach ($this->cart->contents() as $key => $value) {
						$id_tukang = $value['id'];
					}
			?>

			<h3 class="h3 mb-4 text-gray-800"><?= $title; ?></h3>

			<form action="<?php echo base_url() . 'Dashboard/proses_pesanan'; ?>" method="post">
				<!-- <form action="<?php echo base_url() . 'Dashboard/histori_pesanan'; ?>" method="post"> -->

				<input type="hidden" name="id_tukang" value="<?php echo $id_tukang; ?>">
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" placeholder="nama lengkap anda" class="form-control" value="<?php echo $this->session->userdata('name') ?>">
				</div>


				<div class="form-group">
					<label>Alamat Lengkap Lengkap</label>
					<input type="text" name="alamat" placeholder="alamat lengkap anda" class="form-control" value="<?php echo $this->session->userdata('alamat') ?>">
				</div>

				<div class="form-group">
					<label>No. Telpon</label>
					<input type="text" name="no_telp" placeholder="nomer telepon anda" class="form-control" value="<?php echo $this->session->userdata('no_telp') ?>">
				</div>

				<div class="form-group">
					<label for="metode">Pembayaran</label>
					<select class="form-control" name="metode">
						<option value="BCA - 5218432721">BCA - 5218432721</option>
						<option value="BNI - 5218432722">BNI - 5218432722</option>
						<option value="BRI - 5218432723">BRI - 5218432723</option>
						<option value="MANDIRI - 5218432724">MANDIRI - 5218432724</option>
					</select>
				</div>

				<button type="submit" class="btn btn-primary btn-sm mt-3">Pesan</button>

			</form>

		<?php
				} else {
					echo "<h4> Keranjang Belanja Anda Masih Kosong!!! </h4>";
				}
		?>
		</div>

		<div class="col-md-2"></div>
	</div>
</div>