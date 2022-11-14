<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <!-- form ada inputan file, kalo mau uplod gambar atributnya harus ada 3 -->
            <!-- <form action="" method="" enctype="multipart/multipart/form-data"> -->
            <?= form_open_multipart('jasa/Wedding/buat_usaha'); ?>
            <!--  <form method="post" action="<?php echo base_url() . 'jasa/Wedding/buat_usaha' ?>" enctype="multipart/form-data"> -->

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">No id</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id">
                    <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">No wedding</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_wo" name="id_wo" value="<?= $tb_wo['id']; ?>" readonly>
                    <?= form_error('id_wo', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>


            <div class="form-group row">
                <label for="paket" class="col-sm-2 col-form-label">Jenis Paket</label>
                <div class="col-sm-10">
                    <select class="form-control" name="nama" placeholder="nama">
                        <option value="">Pilih</option>
                        <option value="elegant">Wedding Elegant</option>
                        <option value="best">Wedding Best</option>
                        <option value="glamour">Wedding Glamour</option>
                        <option value="exclusive">Wedding Exclusive</option>
                    </select>
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>


            <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi" rows="3" autofocus="" placeholder=""><?= set_value('deskripsi'); ?>
                </textarea>
                    <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>


            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= set_value('harga'); ?>">
                    <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>


            <div class="form-group row">
                <!-- <label for="name" class="col-sm-2 col-form-label">Gambar</label> -->
                <div class="col-sm-2">Gambar</div>
                <div class="col-sm-10">

                    <div class="col-sm-9">
                        <div class="custom-file"></div>
                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                        <label for="gambar" class="custom-file-label">Choose file</label>
                        <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>


                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">simpan</button>
                    </div>
                </div>
                </form>

            </div>

        </div>
    </div>