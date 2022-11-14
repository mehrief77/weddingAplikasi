<div class="container-fluid">
    <h3><i class="fas fa-edit"></i><?= $title; ?></h3> 
     <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->

    <?php foreach ($paket as $pk) : ?>
        <form method="post" action="<?php echo base_url() . 'jasa/Wedding/update' ?>" enctype="multipart/form-data">

        	<div class="for-group">
                <label>ID Paket</label>
                <input type="text" name="id" class="form-control" value="<?php echo $pk->id ?>" readonly>
            </div>

        	<div class="for-group">
                <label>ID Wedding</label>
                <input type="text" name="id_wo" class="form-control" value="<?php echo $pk->id_wo ?>" readonly>
            </div>

            <div class="for-group">
                <label for="nama">Jenis Paket</label>
                 	<select class="form-control" name="nama" placeholder="nama" value="<?php echo $pk->nama ?>">
                        <option value="">Pilih</option>
                        <option value="elegant">Wedding Elegant</option>
                        <option value="best">Wedding Best</option>
                        <option value="glamour">Wedding Glamour</option>
                        <option value="exclusive">Wedding Exclusive</option>
                	 </select>
            </div>

            <div class="for-group">
                <label>Deskripsi</label>
                 <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi" rows="3" autofocus="" placeholder=""><?= set_value('deskripsi'); ?>
                </textarea>
            </div>

            <div class="for-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" value="<?php echo $pk->harga ?>">
            </div>

            <div class="form-group">
                <label>GAMBAR </label>
                <input type="file" name="gambar" class="form-control">
            </div>


            <button type="submit" class="btn btn-primary btn-sm mt-3">SIMPAN</button>

        </form>
    <?php endforeach; ?>
</div>