<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <form action="<?php echo base_url() . 'jasa/Wedding/proses_approve/' . $invoice['id_invoice']; ?>" enctype="multipart/form-data" method="post">

                <div class="form-group">
                    <label>ID INVOICE</label>
                    <input type="text" name="id_invoice" placeholder="Id Invoice" class="form-control" value="<?php echo $invoice['id_invoice'] ?>" readonly>
                </div>

                <div class="form-group">
                    <label>ID PESAN</label>
                    <input type="text" name="id_pesan" placeholder="Id pesan" class="form-control" value="<?php echo $invoice['id_pesan'] ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Nama Customer</label>
                    <input type="text" name="nama" placeholder="nama lengkap anda" class="form-control" value="<?php echo $invoice['nama'] ?>">
                </div>


                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" placeholder="alamat lengkap anda" class="form-control" value="<?php echo $invoice['alamat'] ?>">
                </div>

                <div class="form-group">
                    <label>No. Telpon</label>
                    <input type="text" name="no_telp" placeholder="nomer telepon anda" class="form-control" value="<?php echo $invoice['no_telp'] ?>">
                </div>


                <div class="form-group">
                    <label>Nominal Transfer</label>
                    <input type="text" name="nominal_tf" placeholder="Nominal Transfer" class="form-control" value="<?php echo $invoice['nominal_tf'] ?>">
                </div>

                <div class="form-group">
                    <label>Bukti Transaksi </label>
                    <div class="col-md-4">
                        <img src="<?= base_url() . './uploads/bkt_transaksi/' . $invoice['bkt_transaksi']; ?>" class="card-img">
                    </div>
                </div>

                <div class="form-group">
                    <label>Tanggal Transaksi</label>
                    <input type="date" name="tgl_approve" placeholder="tgl_approve" class="form-control" value="">
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