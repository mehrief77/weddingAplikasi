<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> <div class="btn btn-success btn-sm">No. Invoice : <?php echo $invoice->id_invoice ?></div></h1>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <tr align="center" class="tag-responsive">
                <th>ID PEKERJA</th>
                <th>NAMA PEKERJA</th>
                <th>EMAIL</th>
                <th>STATUS PEKERJA</th>
            </tr>

            <?php
            $total = 0;
            foreach ($tukang as $tk) :
            ?>

                <tr align="center">
                    <td data-header="ID PEKERJA"><div class="main"><?php echo $tk->id_tkg ?></div></td>
                    <td data-header="NAMA PEKERJA"><div class="main"><?php echo $tk->nama_tkg ?></td>
                    <td data-header="EMAIL"><div class="main"><?php echo $tk->email ?></td>

                    <?php if ($tk->status == "Persiapan"): ?>
                    <td data-header="STATUS PEKERJA"><div class="main"><span class="badge badge-pill badge-danger"><?php echo $tk->status ?></span></div></td>

                    <?php elseif ($tk->status == "Berangkat"): ?>
                    <td data-header="STATUS PEKERJA"><div class="main"><span class="badge badge-pill badge-warning"><?php echo $tk->status ?></span></div></td>

                     <?php elseif ($tk->status == "Bekerja"): ?>
                    <td data-header="STATUS PEKERJA"><div class="main"><span class="badge badge-pill badge-primary"><?php echo $tk->status ?></span></div></td>

                    <?php elseif ($tk->status == "Selesai"): ?>
                    <td data-header="STATUS PEKERJA"><div class="main"><span class="badge badge-pill badge-success"><?php echo $tk->status ?></span></div></td>  

                    <?php endif; ?>
                </tr>

            <?php endforeach ?> 
        </table>
    </div>

    <a href="<?php echo base_url('Customer/status_t') ?>">
        <div class="btn btn-danger btn-sm"> Kembali </div>
    </a>
</div>


