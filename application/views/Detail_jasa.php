<div class="container-fluid">

    <div class="card">
        <h5 class="card-header">Detail Jasa</h5>
        <div class="card-body">

            <?php foreach ($jasa as $js) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo base_url() . '/uploads/' . $js->gambar ?>" class="img-thumbnail">
                    </div>

                    <div class="col-md-4">
                        <img src="<?php echo base_url() . '/uploads/' . $js->sertifikat ?>" class="img-thumbnail">
                    </div>

                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Nama pekerja</td>
                                <td><strong><?php echo $js->nama_tkg ?></strong></td>
                            </tr>

                            <tr>
                                <td>Keahlian</td>
                                <td><strong><?php echo $js->keahlian ?></strong></td>
                            </tr>

                            <tr>
                                <td>Kategori</td>
                                <td><strong><?php echo $js->kategori ?></strong></td>
                            </tr>

                            <tr>
                                <td>Harga</td>
                                <td><strong>
                                        <div class="btn btn-success btn-sm">Rp. <?php echo number_format($js->harga_tkg, 0, ',', '.') ?></div>
                                    </strong></td>
                            </tr>

                        </table>

                        <?php echo anchor('Dashboard/tambah_ke_pesan/' . $js->id_tkg, '<div class="btn btn-primary btn-sm">Pesan Sekarang</div>') ?>
                        <?php echo anchor('Welcome', '<div class="btn btn-danger btn-sm">Kembali</div>') ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>