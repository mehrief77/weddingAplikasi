<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA Vendor</h3>

    <?php foreach ($wedding as $wd) : ?>
      <form method="post" action="<?php echo base_url() . 'admin/Data_jasa/update' ?>" enctype="multipart/form-data">

             <div class="for-group">
                <label>ID Wedding</label>
                <input type="text" name="id" class="form-control" value="<?php echo $wd->id ?>" readonly>
            </div>

            <div class="for-group">
                <label>Nama Wedding</label>
                <input type="text" name="nama_wo" class="form-control" value="<?php echo $wd->nama_wo ?>">
            </div>

            <div class="for-group">
                <label>alamat</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $wd->id ?>">
                <input type="text" name="alamat" class="form-control" value="<?php echo $wd->alamat ?>">
            </div>

            <div class="for-group">
                <label>No Telp</label>
                <input type="text" name="no_telp" class="form-control" value="<?php echo $wd->no_telp ?>">
            </div>

            <div class="for-group">
                <label>Instagram</label>
                <input type="text" name="akun_ig" class="form-control" value="<?php echo $wd->akun_ig ?>">
            </div>

            <div class="form-group">
                <label>GAMBAR</label>
                <input type="file" name="gambar" class="form-control">
            </div>

            <div class="form-group">
                <label>KTP</label>
                <input type="file" name="no_ktp" class="form-control">
            </div>

           <div class="for-group">
                <label>No Rekening</label>
                <input type="text" name="no_rek" class="form-control" value="<?php echo $wd->no_rek ?>">
            </div>

            <div class="for-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $wd->email ?>">
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3">SIMPAN</button>

        </form>
    <?php endforeach; ?>
</div>