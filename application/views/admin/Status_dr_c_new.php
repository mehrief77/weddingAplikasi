<div class="container-fluid">

    <?php
    // $total = 0;
    // foreach ($pesanan_1 as $psn) :
    //     $subtotal = $psn->jumlah * $psn->harga_tkg;
    //     $total += $subtotal;
    ?>
    <h5 class="card-header"><?= $title; ?> <div class="btn btn-success btn-sm">No. Invoice : <?php echo $invoice['id_invoice'] ?></div>
    </h5>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <tr align="center">
                <th>ID WO</th>
                <th>ID PAKET</th>
                <th>NAMA WO</th>
                <th>NAMA PAKET</th>
                <th>TANGGAL PESAN</th>
                <th>HARGA</th>
                <th>STATUS WO</th>
                <th>TRANSPER</th>
            </tr>

            <tbody>


                <tr align="center">
                    <td data-header="ID PESAN">
                        <div class="main"><?php echo $invoice['id_pesan'] ?></div>
                    </td>
                    <td data-header="ID PEKERJA">
                        <div class="main"><?php echo $invoice['id_paket'] ?></div>
                    </td>
                    <td data-header="ID PEKERJA">
                        <div class="main"><?php echo $invoice['nama'] ?></div>
                    </td>
                    <td data-header="ID PEKERJA">
                        <div class="main"><?php echo $invoice['nama_wo'] ?></div>
                    </td>
                    <td data-header="TANGGAL PESAN">
                        <div class="main"><?php echo $invoice['tgl_pesan'] ?>
                    </td>

                    <td data-header="TANGGAL PESAN">
                        <div class="main"><?php echo $invoice['harga'] ?>
                    </td>

                    <?php if ($invoice['status_pesanbycs'] == "") : ?>
                        <td data-header="STATUS PEKERJA">
                            <div class="main"><span class="badge badge-pill badge-dark"><?php echo $invoice['status_pesanbycs'] ?></span></div>
                        </td>

                    <?php elseif ($invoice['status_pesanbycs'] == "Belum Bekerja") : ?>
                        <td data-header="STATUS PEKERJA">
                            <div class="main"><span class="badge badge-pill badge-dark"><?php echo $invoice['status_pesanbycs'] ?></span></div>
                        </td>

                    <?php elseif ($invoice['status_pesanbycs'] == "Bekerja") : ?>
                        <td data-header="STATUS PEKERJA">
                            <div class="main"><span class="badge badge-pill badge-warning"><?php echo $invoice['status_pesanbycs'] ?></span></div>
                        </td>

                    <?php elseif ($invoice['status_pesanbycs'] == "Selesai") : ?>
                        <td data-header="STATUS PEKERJA">
                            <div class="main"><span class="badge badge-pill badge-success"><?php echo $invoice['status_pesanbycs'] ?></span></div>
                        </td>

                    <?php elseif ($invoice['status_pesanbycs'] == "Komplen") : ?>
                        <td data-header="STATUS PEKERJA">
                            <div class="main"><span class="badge badge-pill badge-danger"><?php echo $invoice['status_pesanbycs'] ?></span></div>
                        </td>

                    <?php endif; ?>
                    <td><?php echo anchor('admin/Invoice/transper_k_ven/' . $invoice['id_invoice'], '<div class="btn btn-success btn-sm">Bayar</div>') ?></td>
                </tr>


            </tbody>

        </table>
    </div>
    <a href="<?php echo base_url('admin/Invoice/') ?>">
        <div class="btn btn-danger btn-sm"> Kembali </div>
    </a>
</div>