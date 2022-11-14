<div class="container-fluid">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo base_url('uploads\dashboard1.png') ?>" class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item">
                <img src="<?php echo base_url('uploads\dashboard.jpg') ?>" class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item">
                <img src="<?php echo base_url('uploads\dashboard_wedding3.jpg') ?>" class="d-block w-100" alt="...">
            </div>
        </div>


        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="row text-center mt-4">

        <?php

        if ($paket) {
            foreach ($paket as $pk) : ?>

                <div class="card ml-3 mb-3" style="width: 16rem;">
                    <img src="<?php echo base_url() . '/uploads/' . $pk->gambar ?>" class="card-img-top" alt="...">
                    <div class="card-body">

                        <h5 class="card-title mb-1"><?php echo $pk->nama ?></h5>
                        <span class="badge badge-pill badge-success mb-3">Rp. <?php echo number_format($pk->harga, 0, ',', '.') ?></span>

 
                        <!--  <?php echo anchor('Dashboard/tambah_ke_pesan/' . $pk->id, '<div class="btn btn-primary btn-sm">order Paket Wedding</div>') ?> -->

                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?= base_url(); ?>Dashboard/tambah_ke_pesan/<?= $pk->id ?>">
                                    <img src="<?php echo base_url('assets\img\add-to-cart.png') ?> " width="30px">
                                    orderan
                                </a>

                                <?php echo anchor('Dashboard_c/detail_paket/' . $pk->id, '<div class="btn btn-primary btn-sm">Detail</div>')  ?>
                            </div>
                        </div>
                    </div>
                </div>

        <?php endforeach;
        } ?>

    </div>
</div>