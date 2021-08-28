<div class="container-fluid">
    <h4>Keranjang Belanja</h4>

    <table class="table table-bordered table-striped table-hover">
        <tr align="center" class="tag-responsive">
            <th>NO</th>
            <th>Nama Pekerja</th>
            <th>Memesan</th>
            <th>Harga</th>
            <th>Sub-Total</th>
        </tr>

        <?php
        $no = 1;
        foreach ($this->cart->contents() as $items) :
        ?>

            <tr>
                <td data-header="NO">
                    <div class="main"><?php echo $no++ ?></div>
                </td>
                <td data-header="Nama Pekerja">
                    <div class="main"><?php echo $items['name'] ?>
                </td>
                <td data-header="Memesan">
                    <div class="main"><?php echo $items['qty'] ?>
                </td>
                <!-- membuat format rupiah -->
                <td data-header="Harga" align="right">
                    <div class="main">Rp. <?php echo number_format($items['price'], 0, ',', '.') ?>
                </td>

                <td data-header="Sub-Total" align="right">
                    <div class="main">Rp. <?php echo number_format($items['subtotal'], 0, ',', '.') ?>
                </td>
            </tr>

        <?php endforeach; ?>

        <tr>
            <td colspan="4"></td>
            <td align="right">Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?></td>
        </tr>
    </table>

    <div align="right">
        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_pesanan">Hapus Pesanan </button>

        <a href="<?php echo base_url('Dashboard_c') ?>">
            <div class="btn btn-primary btn-sm">Lanjutkan Belanja</div>
        </a>

        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#bayar">Pesan</button>

    </div>
</div>


<!-- link button Hapus pesanan -->
<!-- Modal -->
<div class="modal fade" id="hapus_pesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?php echo base_url() . 'Dashboard/hapus_keranjang'; ?>" method="post" enctype="multipart/form-data">
                    Apakah Anda Yakin Ingin Menghapus Pesanan?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Ya</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- link button Pembayaran -->
<!-- Modal -->
<div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?php echo base_url() . 'Dashboard/pembayaran'; ?>" method="post" enctype="multipart/form-data">
                    Apakah Anda Yakin Ingin Memesan Saat Ini?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Ya</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
            </div>
            </form>
        </div>
    </div>
</div>