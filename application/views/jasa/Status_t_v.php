<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> <div class="btn btn-success btn-sm">No. Invoice : <?php echo $invoice->id_invoice ?></div>
    </h1>

    <div class="table-responsive ">

        <table class="table table-bordered table-hover table-striped responsive">

            <tr align="center" class="tag-responsive">
                <th>ID INVOICE</th>
                <th>ID Tukang</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No telp</th>
                <th>Email</th>
                <th>Harga</th>
                <th>Tanggal Pesan</th>
                <th>Aksi</th>
            </tr>

            <?php
            $subtotal = 0;
            foreach ($tampil as $value) {
                $subtotal = $value->jumlah * $value->harga_tkg;
            ?>
                <tr align="center">
                    <td data-header="ID INVOICE">
                        <div class="main"><?php echo $value->id_invoice; ?></div>
                    </td>
                    <td data-header="ID Tukang">
                        <div class="main"><?php echo $value->id_tkg; ?></div>
                    </td>
                    <td data-header="Nama">
                        <div class="main"><?php echo $value->nama; ?></div>
                    </td>
                    <td data-header="Alamat">
                        <div class="main"><?php echo $value->alamat; ?></div>
                    </td>
                    <td data-header="No telp">
                        <div class="main"><?php echo $value->no_telp; ?></div>
                    </td>
                    <td data-header="Email">
                        <div class="main"><?php echo $value->email; ?></div>
                    </td>
                    <td data-header="Harga">
                        <div class="main"><?php echo number_format($subtotal, 0, ',', '.'); ?></div>
                    </td>
                    <td data-header="Tanggal Pesan">
                        <div class="main"><?php echo $value->batas_bayar; ?></div>
                    </td>
                    <td data-header="Aksi">
                        <form action="<?php echo base_url() . 'jasa/Tukang/update_status_t'; ?>" method="post">

                            <div class="form-group">
                                <input type="text" class="form-control" id="id_tkg" name="id_tkg" value="<?php echo $value->id_tkg; ?>" hidden>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="id_invoice" name="id_invoice" value="<?php echo $value->id_invoice; ?>" hidden>
                            </div>

                            <div class="form-group">
                                <label for="status">Pilih Status</label>
                                <select class="form-control" name="status" placeholder="status">
                                    <option value="">Pilih</option>
                                    <option value="Persiapan">Persiapan</option>
                                    <option value="Berangkat">Berangkat</option>
                                    <option value="Bekerja">Bekerja</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm mt-3">Update</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>