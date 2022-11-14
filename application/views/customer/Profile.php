<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="card">
        <h5 class="card-header">Profile</h5>
        <div class="card-body">

            <div class="row">
                <div class="col-lg-8">
                    <!-- <?= $this->session->flashdata('message'); ?> -->
                </div>
            </div>
            <div class="card  mb-3" style="max-width: 540px;">
                <div class="row">
                    <div class="col-md-4">
                        <!-- <img src="<?= base_url('assets/img/profile/') . $tb_customer['gambar']; ?>" class="img-thumbnail"> -->
                        <img src="<?= base_url('uploads/') . $tb_customer['gambar']; ?>" class="img-thumbnail">
                    </div>
                    <div class="col-md-8">
                        <h5 class="card-title"> <?= $tb_customer['nama']; ?> </h5>
                        <p class="card-text"> <?= $tb_customer['alamat']; ?> </p>
                        <p class="card-text"> <?= $tb_customer['no_telp']; ?> </p>
                        <p class="card-text"> <?= $tb_customer['email']; ?> </p>
                        <p class="card-text"> <small class="text-muted">
                                Member since <?= date('d F Y', $tb_user['date_created']); ?>
                            </small></p>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
</div>
<!-- End of Main Content