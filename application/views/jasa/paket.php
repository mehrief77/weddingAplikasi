<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Membuat button tambah-->
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_paket"><i class="fas fa-plus fa-sm"></i>
        Tambah Data Paket
    </button>

    <!-- Membuat button search-->
    <!-- <div class="navbar-form navbar-right" style="float: right">
		<?php echo form_open('jasa/Wedding/search/') ?>
		<input type="text" name="keyword" placeholder="search">
		<input type="submit" name="submit_search" value="search" class="btn sm btn-success">
	</div> <br><br> -->

    <?= $this->session->flashdata('message'); ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <tr class="text-center">
                <th>NO</th>
                <th>ID PAKET</th>
                <th>ID WEDDING</th>
                <th>JENIS PAKET</th>
                <th>DESKRIPSI</th>
                <th>HARGA</th>
                <th>GAMBAR</th>
                <th colspan="3">AKSI</th>
            </tr>

            <?php
            $no = 1;
            if ($paket) { //kodingan ini utk mengakali pesanan yg kosong sehingga link transaksi tidak error
                foreach ($paket as $pk) :
            ?>


                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $pk->id ?></td>
                        <td><?php echo $pk->id_wo ?></td>
                        <td><?php echo $pk->nama ?></td>
                        <td><?php echo $pk->deskripsi ?></td>
                        <td><?php echo $pk->harga ?></td>
                        <td><?php echo $pk->gambar ?></td>

                        <!-- tombol button -->
                        <td><?php echo anchor('jasa/Wedding/detail_paket/' . $pk->id, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?>
                        </td>

                        <td><?php echo anchor('jasa/Wedding/edit_paket/' . $pk->id, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?>
                        </td>

                        <td><?php echo anchor('jasa/Wedding/hapus_paket/' . $pk->id, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?>
                        </td>
                    </tr>

            <?php endforeach;
            } ?>


        </table>
    </div>
</div>


<!-- link button tambah -->
<!-- Modal -->
<div class="modal fade" id="tambah_paket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?php echo base_url() . 'jasa/Wedding/tambah_paket'; ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group" hidden="">
                        <label>No Id Paket </label>
                        <input type="text" class="form-control" id="id" name="id">
                    </div>

                    <div class="form-group">
                        <label>No Id Wo </label>
                        <input type="text" class="form-control" id="id_wo" name="id_wo" value="<?= $tb_wo['id']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>JENIS PAKET</label>
                        <select class="form-control" name="nama" placeholder="nama">
                            <option value="">Pilih</option>
                            <option value="elegant">Wedding Elegant</option>
                            <option value="best">Wedding Best</option>
                            <option value="glamour">Wedding Glamour</option>
                            <option value="exclusive">Wedding Exclusive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>DESKRIPSI</label>
                        <!-- <input type="text" name="deskripsi" class="form-control"> -->
                        <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi" rows="3" placeholder=""></textarea>
                    </div>

                    <div class="form-group">
                        <label>HARGA</label>
                        <input type="text" name="harga" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>GAMBAR</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>