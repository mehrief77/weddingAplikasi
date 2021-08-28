<div class="container-fluid">


    <h5 class="card-header"><?= $title; ?> <div class="btn btn-success btn-sm">No. Invoice : <?php echo $invoice->id_invoice ?></div>
    </h5>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <tr align="center">
                <th>ID PEKERJA</th>
                <th>NAMA PEKERJA</th>
                <th>JUMLAH PESANAN</th>
                <th>HARGA SATUAN</th>
                <th>SUB-TOTAL</th>
                <th>Aksi</th>
            </tr>

            <tbody>
                <?php
                $total = 0;
                foreach ($pesanan_1 as $psn) :
                    $subtotal = $psn->jumlah * $psn->harga_tkg;
                    $total += $subtotal;
                ?>

                    <tr align="center">
                        <td><?php echo $psn->id_tkg ?></td>
                        <td><?php echo $psn->nama_tkg ?></td>
                        <td><?php echo $psn->jumlah ?></td>
                        <td><?php echo number_format($psn->harga_tkg, 0, ',', '.') ?></td>
                        <td><?php echo number_format($subtotal, 0, ',', '.') ?></td>
                        <!-- <td data-header="Aksi"><?php echo anchor(
                                                        'admin/Invoice/status_dr_c_new/' . $psn->id_tkg,
                                                        '<div class="btn btn-primary btn-sm">Status</div>'
                                                    ) ?></td> -->
                        <!-- <td><?php echo $psn->status_jasa ?></td> -->
                        <?php if ($psn->status_jasa == "Komplen") : ?>
                            <td data-header="STATUS PEKERJA">
                                <div class="main"><span class="badge badge-pill badge-danger"><?php echo $psn->status_jasa ?></span></div>
                            </td>

                        <?php elseif ($psn->status_jasa == "Proses") : ?>
                            <td data-header="STATUS PEKERJA">
                                <div class="main"><span class="badge badge-pill badge-warning"><?php echo $psn->status_jasa ?></span></div>
                            </td>

                        <?php elseif ($psn->status_jasa == "Bekerja") : ?>
                            <td data-header="STATUS PEKERJA">
                                <div class="main"><span class="badge badge-pill badge-primary"><?php echo $psn->status_jasa ?></span></div>
                            </td>

                        <?php elseif ($psn->status_jasa == "Selesai") : ?>
                            <td data-header="STATUS PEKERJA">
                                <div class="main"><span class="badge badge-pill badge-success"><?php echo $psn->status_jasa ?></span></div>
                            </td>

                        <?php endif; ?>
                    </tr>

                <?php endforeach ?>
            </tbody>

        </table>
    </div>
    <a href="<?php echo base_url('admin/Invoice/') ?>">
        <div class="btn btn-danger btn-sm"> Kembali </div>
    </a>
</div>