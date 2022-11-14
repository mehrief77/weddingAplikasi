<div class="container-fluid">
    <!-- <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Data Jasa </button> -->
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_jasa"><i class="fas fa-plus fa-sm"></i> Tambah Data Jasa </button>

    <!--      <div class="navbar-form navbar-right" style="float:right">
        <?php echo form_open('admin/Data_jasa/search/') ?>
            <input type="text" name="keyword" placeholder="search">
            <input type="submit" name="submit_search" value="search" class="btn sm btn-success">
        <?php echo form_close() ?>
    </div> <br><br> -->

    <?= $this->session->flashdata('message'); ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <tr class="text-center">
                <th>NO</th>
                <th>ID WEDDING</th>
                <th>NAMA</th>
                <th>ALAMAT</th>
                <th>TELP</th>
                <th>INSTAGRAM</th>
                <th>LOGO</th>
                <th>KTP</th>
                <th>NO REKENING</th>
                <th>EMAIL</th>
                <th colspan="4">AKSI</th>
            </tr>
            
             <?php
            $no = 1;
            foreach ($wedding as $wd) :
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $wd->id ?></td>
                    <td><?php echo $wd->nama_wo ?></td>
                    <td><?php echo $wd->alamat ?></td>
                    <td><?php echo $wd->no_telp ?></td>
                    <td><?php echo $wd->akun_ig ?></td>
                    <td><?php echo $wd->gambar ?></td>
                    <td><?php echo $wd->no_ktp ?></td>
                    <td><?php echo $wd->no_rek ?></td>
                    <td><?php echo $wd->email ?></td>

                    <!-- tombol button -->
                    <td> <?php echo anchor('admin/Data_jasa/detail_jasa/' . $wd->id, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?> </td>
                    <td> <?php echo anchor('admin/Data_jasa/edit_jasa/' . $wd->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?> </td>
                    <td> <?php echo anchor('admin/Data_jasa/hapus_jasa/' . $wd->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?> </td>
                     <td> <?php echo anchor('admin/Data_jasa/jenis_paket/' . $wd->id, '<div  class="btn btn-info btn-sm"><i class="fas fa-id-badge"></i></div>') ?> </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>

    <a href="<?php echo base_url('admin/Data_jasa/') ?>">
        <div class="btn btn-danger btn-sm"> Kembali </div>
    </a>
</div>

<!-- link button tambah -->
<!-- Modal -->
<div class="modal fade" id="tambah_jasa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?php echo base_url() . 'admin/Data_jasa/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Pekerja</label>
                        <input type="text" name="nama_tkg" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>alamat</label>
                        <input type="hidden" name="id_tkg" class="form-control" value="<?php echo $js->id_tkg ?>">
                        <input type="text" name="alamat" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Umur</label>
                        <input type="text" name="umur" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select class="form-control" name="jk" value="<?php echo $js->jk ?>">
                            <option>Pilih</option>
                            <option>L</option>
                            <option>P</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pendidikan</label>
                        <input type="text" name="pendidikan" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select class="form-control" name="agama">
                            <option>Pilih</option>
                            <option>Islam</option>
                            <option>Katolik</option>
                            <option>Protestan</option>
                            <option>Hindu</option>
                            <option>Budha</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Keahlian</label>
                        <input type="text" name="keahlian" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori" value="<?php echo $js->kategori ?>">
                            <option>Pilih</option>
                            <option>Electrical</option>
                            <option>Elektronik</option>
                            <option>Perkakas</option>
                            <option>Tukang Bangunan</option>
                            <option>Tukang Ledeng</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga_tkg" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>GAMBAR </label>
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