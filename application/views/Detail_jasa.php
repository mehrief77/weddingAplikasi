<div class="container-fluid">

    <div class="card">
        <h5 class="card-header">Detail Jasa</h5>
        <div class="card-body">

            <?php foreach ($wedding as $wd) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo base_url() . '/uploads/' . $wd->gambar ?>" class="img-thumbnail">
                    </div>

                    <!--                     <div class="col-md-4">
                        <img src="<?php echo base_url() . '/uploads/' . $wd->sertifikat ?>" class="img-thumbnail">
                    </div> -->

                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Jenis Paket</td>
                                <td><strong><?php echo $wd->nama ?></strong></td>
                            </tr>

                            <tr>
                                <td>Deskripsi</td>
                                <td><strong><?php echo $wd->deskripsi ?></strong></td>
                            </tr>

                            <tr>
                                <td>Harga</td>
                                <td><strong>
                                        <div class="btn btn-warning btn-sm">Rp. <?php echo number_format($wd->harga, 0, ',', '.') ?></div>
                                        <!-- <span class="badge badge-pill badge-success mb-3">Rp. <?php echo number_format($wd->harga, 0, ',', '.') ?></span> -->
                                    </strong></td>
                            </tr>

                        </table>

                        <?php echo anchor('Dashboard/tambah_ke_pesan/' . $wd->id, '<div class="btn btn-info btn-sm">Order Sekarang</div>') ?>

                        <?php echo anchor('Dashboard/kelas_paket/' . $wd->id_wo, '<div class="btn btn-danger btn-sm">Kembali</div>') ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>