<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <form action="<?php echo base_url() . 'admin/Invoice/proses_bayar_wo'; ?>" enctype="multipart/form-data" method="post">

                <div class="form-group">
                    <label>ID INVOICE</label>
                    <input type="text" name="id_invoice" placeholder="Id Invoice" class="form-control" value="<?php echo $invoice[0]['id_invoice'] ?>" readonly>
                </div>

                <div class="form-group">
                    <label>ID PESAN</label>
                    <input type="text" name="id_pesan" placeholder="Id Customer" class="form-control" value="<?php echo $invoice[0]['id_pesan'] ?>" readonly>
                </div>

                <div class="form-group">
                    <label>ID PEMBAYARAN CUSTOMER</label>
                    <input type="text" name="id_pembayarancs" placeholder="Id Invoice" class="form-control" value="<?php echo $invoice[0]['id_pembayarancs'] ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Tanggal Bayar</label>
                    <input type="date" name="tgl_tf" class="form-control">
                </div>

                <div class="form-group">
                    <label>No Rekening</label>
                    <input type="text" name="id_bankapp" placeholder="Pembayaran" class="form-control" value="<?php echo $invoice[0]['no_rek'] ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Nominal Transfer</label>
                    <input type="text" name="nominal_tf" placeholder="Pembayaran" class="form-control"value="<?php echo $invoice[0]['nominal_tf'] ?>">
                </div>

                <!-- <div class="form-group">
                    <label>Bukti Transaksi </label>
                    <input type="file" class="form-control" id="no_rek" name="no_rek" placeholder="Bukti Transaksi">
                </div> -->

                <button type="submit" class="btn btn-primary btn-sm mt-3">Konfirmasi</button>
            </form>

        </div>

        <div class="col-md-2"></div>
    </div>
</div>