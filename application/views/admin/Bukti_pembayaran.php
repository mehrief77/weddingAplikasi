<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">


            <h3>Konfirmasi Pembayaran</h3>

            <form action="<?php echo base_url() . 'admin/Invoice/proses_bayar/' . $tb_pembayaran['id_invoice']; ?>" enctype="multipart/form-data" method="post">
                <!-- <form action="<?php echo base_url() . 'dashboard/histori_pesanan'; ?>" method="post"> -->

                <!-- <input type="text" hidden name="id_customer" value="<?php echo $tb_customer['id_customer'] ?>"> -->
                <input type="text" hidden name="id_invoice" value="<?php echo $this->uri->segment(3); ?>">

                <!--  <div class="form-group">
                    <label for="name">ID Pembayaran</label>
                    <input type="text" class="form-control" id="id_pembayaran" name="id_pembayaran" value="<?= $tb_pembayaran['id_pembayaran']; ?>" readonly>
                    <!-- <?= form_error('id_pembayaran', '<small class="text-danger pl-3">', '</small>'); ?> -->
                <!-- </div> -->

                <div class="form-group">
                    <label for="name">ID Pembayaran</label>
                    <input type="text" class="form-control" id="id" name="id" value="<?= $tb_pembayaran['id_pembayaran']; ?>" readonly>
                    <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="name">Tangal Pembayaran</label>
                    <input type="text" class="form-control" id="tgl_bayar" name="tgl_bayar" value="<?= $tb_pembayaran['tgl_bayar']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Nama Bank</label>
                    <input type="text" name="nama" placeholder="Metode" class="form-control" value="<?= $tb_pembayaran['nama_bank']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label>NO. REK</label>
                    <input type="text" name="no_rekening" placeholder="Metode" class="form-control" value="<?= $tb_pembayaran['no_rekening']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Nilai Nominal</label>
                    <input type="text" name="nominal_tf" placeholder="Metode" class="form-control" value="<?= $tb_pembayaran['nominal_tf']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Bukti Transaksi </label>
                    <div class="col-md-4">
                        <img src="<?= base_url() . './uploads/bkt_transaksi/' . $tb_pembayaran['bkt_transaksi']; ?>" class="card-img">
                    </div>
                </div>

                <div class="form-group">
                    <label for="status_pembayaran">Status</label>
                    <select class="form-control" name="status_pembayaran" class="form-control" value="<?= $tb_invoice['status_pembayaran']; ?>">
                        <option>Pilih</option>
                        <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                        <option value="Lunas">Lunas</option>
                    </select>
                </div>

                <a href="<?php echo base_url('admin/Invoice/') ?>">
                    <div class="btn btn-danger btn-sm mt-3"> KEMBALI </div>
                </a>

                <button type="submit" class="btn btn-primary btn-sm mt-3">SIMPAN</button>
            </form>
            <br>

        </div>

        <div class="col-md-2"></div>

    </div>


</div>