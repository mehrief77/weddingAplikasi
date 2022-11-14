<div class="container-fluid">
    <!-- Page Heading -->
    <?php
    // $total = 0;
    // foreach ($invoice as $inv) :
    ?>

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> <div class="btn btn-success btn-sm">No. Invoice : <?php echo $invoice['id_invoice'] ?></div>
    </h1>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <tr align="center" class="tag-responsive">
                <th>ID WO</th>
                <th>ID PAKET</th>
                <th>NAMA WO</th>
                <th>NAMA PAKET</th>
                <th>EMAIL</th>
                <th>STATUS WO</th>
            </tr>



            <tr align="center">
                <td data-header="ID PEKERJA">
                    <div class="main"><?php echo $invoice['id_wo'] ?></div>
                </td>
                <td data-header="ID PEKERJA">
                    <div class="main"><?php echo $invoice['id_paket'] ?></div>
                </td>
                <td data-header="NAMA PEKERJA">
                    <div class="main"><?php echo $invoice['nama_wo'] ?>
                </td>
                <td data-header="NAMA PEKERJA">
                    <div class="main"><?php echo $invoice['nama'] ?>
                </td>
                <td data-header="EMAIL">
                    <div class="main"><?php echo $invoice['email'] ?>
                </td>

                <?php if ($invoice['status_pesananbywo'] == "") : ?>
                    <td data-header="STATUS PEKERJA">
                        <div class="main"><span class="badge badge-pill badge-danger"><?php echo $invoice['status_pesananbywo'] ?></span></div>
                    </td>

                <?php elseif ($invoice['status_pesananbywo'] == "Persiapan") : ?>
                    <td data-header="STATUS PEKERJA">
                        <div class="main"><span class="badge badge-pill badge-danger"><?php echo $invoice['status_pesananbywo'] ?></span></div>
                    </td>

                <?php elseif ($invoice['status_pesananbywo'] == "Berangkat") : ?>
                    <td data-header="STATUS PEKERJA">
                        <div class="main"><span class="badge badge-pill badge-warning"><?php echo $invoice['status_pesananbywo'] ?></span></div>
                    </td>

                <?php elseif ($invoice['status_pesananbywo'] == "Bekerja") : ?>
                    <td data-header="STATUS PEKERJA">
                        <div class="main"><span class="badge badge-pill badge-primary"><?php echo $invoice['status_pesananbywo'] ?></span></div>
                    </td>

                <?php elseif ($invoice['status_pesananbywo'] == "Selesai") : ?>
                    <td data-header="STATUS PEKERJA">
                        <div class="main"><span class="badge badge-pill badge-success"><?php echo $invoice['status_pesananbywo'] ?></span></div>
                    </td>

                <?php endif; ?>
            </tr>

        </table>
    </div>

    <a href="<?php echo base_url('Customer/status_t') ?>">
        <div class="btn btn-danger btn-sm"> Kembali </div>
    </a>
</div>