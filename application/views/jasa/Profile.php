<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card">
        <h5 class="card-header">Profile</h5>
        <div class="card-body">


            <div class="row">
                <div class="col-lg-8">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>

            <div class="card  mb-3" style="max-width: 540px;">
                <div class="row ">
                    <div class="col-md-4">
                        <img src="<?= base_url('uploads/') . $tb_wo['gambar']; ?>" class="img-thumbnail">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <h5 class="card-title"> <?= $tb_wo['nama_wo']; ?> </h5>
                            <p class="card-text"> <?= $tb_wo['alamat']; ?> </p>
                             <p class="card-text"> <?= $tb_wo['no_telp']; ?> </p>
                            <p class="card-text"> <?= $tb_wo['email']; ?> </p>
                            <p class="card-text"> <small class="text-muted">
                                    Bergabung pada <?= date('d F Y', $tb_user['date_created']); ?>
                                </small></p>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content-->
</div>