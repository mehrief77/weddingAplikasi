    <div class="container-fluid">

        <div class="card">
            <h5 class="card-header"><?= $title; ?></h5>
            <div class="card-body">

                <?php foreach ($paket as $pk) : ?>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?php echo base_url() . '/uploads/' . $pk->gambar ?>" class="img-thumbnail"> <!-- class="img-thumbnail utk mengecilkan gambar" -->
                        </div>


                        <div class="col-md-8">
                            <table class="table">
                                <tr>
                                    <td>Nama Paket</td>
                                    <td><strong><?php echo $pk->nama ?></strong></td>
                                </tr>

                                <tr>
                                    <td>Deskripsi</td>
                                    <td><strong><?php echo $pk->deskripsi ?></strong></td>
                                </tr>

                                <tr>
                                    <td>Harga</td>
                                    <td>
                                        <strong>
                                            <div class="btn btn-success btn-sm">Rp. <?php echo number_format($pk->harga, 0, ',', '.') ?>
                                            </div>
                                        </strong>
                                    </td>
                                </tr>

                            </table>

                            <!-- <?php echo anchor('jasa/Wedding/paket', '<div class="btn btn-primary btn-sm">Kembali</div>') ?> -->
                            <?php echo anchor('jasa/Dashboard_jasa/kelas_paket/' . $pk->id_wo, '<div class="btn btn-primary btn-sm">Kembali</div>') ?>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>