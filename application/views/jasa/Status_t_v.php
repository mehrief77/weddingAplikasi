<div class="container-fluid">

    <?php
    // $subtotal = 0;
    // foreach ($tampil as $value) {
    //     $subtotal = $value->jumlah * $value->harga_tkg;
    ?>

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> <div class="btn btn-success btn-sm">No. Invoice : <?php echo $invoice['id_invoice'] ?></div>
    </h1>

    <div class="table-responsive ">

        <table class="table table-bordered table-hover table-striped responsive">

            <tr align="center" class="tag-responsive">
                <th>ID INVOICE</th>
                <th>ID Paket</th>
                <th>ID Wedding</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No telp</th>
                <th>Email</th>
                <th>Harga</th>
                <th>Tanggal Pesan</th>
                <th>Aksi</th>
            </tr>


            <form action="<?php echo base_url() . 'jasa/Wedding/update_status_t/' . $this->uri->segment(3); ?>" method="post">

                <tr align="center">
                    <td data-header="ID INVOICE">
                        <div class="main"><?php echo $invoice['id_invoice'] ?></div>
                    </td>
                    <td data-header="ID Wedding">
                        <div class="main"><?php echo $invoice['id_paket'] ?></div>
                    </td>
                    <td data-header="Nama">
                        <div class="main"><?php echo $invoice['id_wo'] ?></div>
                    </td>
                    <td data-header="Alamat">
                        <div class="main"><?php echo $invoice['nama'] ?></div>
                    </td>
                    <td data-header="No telp">
                        <div class="main"><?php echo $invoice['nama_wo'] ?></div>
                    </td>
                    <td data-header="Email">
                        <div class="main"><?php echo $invoice['no_telp'] ?></div>
                    </td>
                    <td data-header="Email">
                        <div class="main"><?php echo $invoice['email'] ?></div>
                    </td>
                    <td data-header="Email">
                        <div class="main"><?php echo $invoice['harga'] ?></div>
                    </td>
                    <td data-header="Email">
                        <div class="main"><?php echo $invoice['tgl_pesan'] ?></div>
                    </td>

                    <td width="250">
                        <input type="text" name="id_pesan" value="<?= $invoice['id_pesan'] ?>" hidden>

                        <div class="form-group">
                            <select class="form-control" name="status_pesananbywo" placeholder="status wo">
                                <option value="">Penilaian</option>
                                <option value="">Pilih</option>
                                <option value="Persiapan">Persiapan</option>
                                <option value="Berangkat">Berangkat</option>
                                <option value="Bekerja">Bekerja</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary btn-sm mt-1">Simpan</button>
                    </td>
                </tr>
                <?php
                // }
                ?>
            </form>
        </table>
    </div>
</div>