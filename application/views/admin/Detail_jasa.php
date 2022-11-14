    <div class="container-fluid">

        <div class="card">
            <h5 class="card-header">Detail jasa</h5>
            <div class="card-body">

                <?php foreach ($wedding as $wd) : ?>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?php echo base_url() . '/uploads/' . $wd->gambar ?>" class="img-thumbnail"> <!-- class="img-thumbnail utk mengecilkan gambar" -->
                        </div>

                        <div class="col-md-4">
                            <img src="<?php echo base_url() . '/uploads/' . $wd->no_ktp ?>" class="img-thumbnail">
                        </div>
                        
                        <div class="col-md-8">
                            <table class="table">
                                <tr>
                                    <td>Nama Wedding</td>
                                    <td><strong><?php echo $wd->nama_wo ?></strong></td>
                                </tr>

                                <tr>
                                    <td>Alamat</td>
                                    <td><strong><?php echo $wd->alamat ?></strong></td>
                                </tr>

                                <tr>
                                    <td>No Telp</td>
                                    <td><strong><?php echo $wd->no_telp ?></strong></td>
                                </tr>

                                <tr>
                                    <td>Instagram</td>
                                    <td><strong><?php echo $wd->akun_ig ?></strong></td>
                                </tr>

                                <tr>
                                    <td>Rekening</td>
                                    <td><strong><?php echo $wd->no_rek ?></strong></td>
                                </tr>

                                <tr>
                                    <td>Email</td>
                                    <td><strong><?php echo $wd->email ?></strong></td>
                                </tr>

                               <!--  <tr>
                                    <td>Harga</td>
                                    <td>
                                        <strong>
                                            <div class="btn btn-success btn-sm">Rp. <?php echo number_format($wd->harga, 0, ',', '.') ?>
                                            </div>
                                        </strong>
                                    </td>
                                </tr> -->

                            </table>

                            <?php echo anchor('admin/Data_jasa/index', '<div class="btn btn-primary btn-sm">Kembali</div>') ?>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>