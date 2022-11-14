<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <!-- form ada inputan file, kalo mau uplod gambar atributnya harus ada 3 -->
            <!-- <form action="" method="" enctype="multipart/multipart/form-data"> -->
            <?= form_open_multipart('jasa/Wedding/edit'); ?>

            <!-- <div class="form-group row" hidden> -->
                <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">ID wedding</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $tb_wo['id']; ?>" readonly>
                    <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Full name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_wo" name="nama_wo" value="<?= $tb_wo['nama_wo']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <!-- utk text area, tidak usah menggunakan value -->
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="alamat" name="alamat" autofocus=""><?= $tb_wo['alamat']; ?>
                    </textarea>
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">No Telp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $tb_wo['no_telp']; ?>">
                    <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Akun Instagram</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="akun_ig" name="akun_ig" value="<?= $tb_wo['akun_ig']; ?>">
                    <?= form_error('akun_ig', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2">LOGO</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <!--  thumbnail, supaya gambarnya menjadi kecil -->
                            <!--  <img src="<?= base_url('assets/img/profile/') . $tb_wo['gambar']; ?>" class="img-thumbnail"> -->
                            <img src="<?= base_url('uploads/') . $tb_wo['gambar']; ?>" class="img-thumbnail" width="240px">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label for="gambar" class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="form-group row">
                <div class="col-sm-2">KTP</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('uploads/') . $tb_wo['no_ktp']; ?>" class="img-thumbnail" width="240px">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="no_ktp" name="no_ktp">
                                <label for="no_ktp" class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

              <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nomer Rekening</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_rek" name="no_rek" value="<?= $tb_wo['no_rek']; ?>">
                    <?= form_error('no_rek', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $tb_wo['email']; ?>" readonly>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="password" name="password" value="<?= $tb_user['password']; ?>">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
            </form>

        </div>

    </div>
</div>