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
					$id_paket = null;
					foreach ($this->cart->contents() as $key => $value) {
						$id_paket = $value['id'];
					}
			?>

			<h3 class="h3 mb-4 text-gray-800"><?= $title; ?></h3>

			<form action="<?php echo base_url() . 'Dashboard/proses_pesanan'; ?>" method="post">

				<!-- <input type="hidden" name="id_tukang" value="<?php echo $id_tukang; ?>"> -->
				<input type="hidden" name="id_paket" value="<?php echo $id_paket; ?>">

				<div class="form-group">
					<label>ID Customer</label>
					<input type="text" name="id_customer" placeholder="Id Customer" class="form-control" value="<?= $tb_customer['id']; ?>" readonly>
				</div>

				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" placeholder="nama lengkap anda" class="form-control" value="<?php echo $this->session->userdata('nama') ?>">
				</div>


				<div class="form-group">
					<label>Alamat Lengkap</label>
					<!-- <input type="text" name="alamat" placeholder="alamat lengkap anda" class="form-control" value="<?php echo $this->session->userdata('alamat') ?>"> -->
					<input type="text" name="lokasi_acara" placeholder="alamat lengkap anda" class="form-control" value="">
				</div>

				<div class="form-group">
					<label>Waktu Acara</label>
					<input type="date" name="tgl_acara" placeholder="" class="form-control" value="">
				</div>

				<div class="form-group">
					<label>No. Telpon</label>
					<input type="text" name="no_telp" placeholder="nomer telepon anda" class="form-control" value="<?php echo $this->session->userdata('no_telp') ?>">
				</div>

				<div class="form-group">
					<label for="id_bankapp">Pembayaran</label>
					<select class="form-control" name="id_bankapp">
						<?php foreach ($getBank as $data) { ?>
							<option value="<?= $data->id ?>"><?= $data->nama . " - " . $data->no_rekening ?></option>
						<?php
						} ?>
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