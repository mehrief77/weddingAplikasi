<div class="container-fluid">

  <!-- membuat search -->
  <div class="navbar-form navbar-right">
    <?php echo form_open('Dashboard_c/search/') ?>
    <input type="text" name="keyword" placeholder="search">
    <input type="submit" name="submit_search" value="search" class="btn sm btn-success">
    <?php echo form_close() ?>
  </div> <br>

  <!-- membuat slide -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo base_url('uploads\wedding_2.jpg') ?>" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?php echo base_url('uploads\wedding_a.jpg') ?>" class="d-block w-100" alt="...">
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
    <?php foreach ($wedding as $wd) : ?>

      <!-- <div class="card ml-3 mb-3" style="width: 16rem;">
        <img src="<?php echo base_url() . 'uploads/' . $wd->gambar ?>" class="img-thumbnail" alt="...">
        <div class="card-body"> -->

      <div class="card ml-3 mb-3 <?= ($wd->status == "Persiapan" || $wd->status == "Berangkat" || $wd->status == "Bekerja"  ? "disablePointer"  : null) ?>" style="width: 16rem; ">
        <img src="<?php echo base_url() . 'uploads/' . $wd->gambar ?>" class="img-thumbnail" alt="...">
        <div class="card-body">

          <h5 class="card-title mb-1"><?php echo $wd->nama_wo ?></h5>
          <!-- membuat button tambah kekeranjang dengan menggunakan indikator id brg  -->

          <div class="row">
            <div class="col-md-12">
              <?php echo anchor('Dashboard_c/kelas_paket/' . $wd->id, '<div class="btn btn-info btn-sm"> Selengkapnya </div>')  ?>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12">
              <!-- <a href="<?= base_url(); ?>/Dashboard/tambah_ke_pesan/<?= $wd->id ?>">
                <img src="<?php echo base_url('assets\img\add-to-cart.png') ?> " width="30px">
                order
              </a> -->
            </div>
          </div>


        </div>
      </div>

    <?php endforeach; ?>
  </div>

</div>