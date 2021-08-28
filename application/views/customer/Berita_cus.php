<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> <div class="btn btn-success btn-sm">No. Invoice : <?php echo $invoice->id_invoice ?></div>
    </h1>

    <!-- <?= form_open_multipart('Customer/update_status_c/'); ?> -->

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
            foreach ($tukang_2 as $tk) :
            ?>

                <form action="<?php echo base_url() . 'Customer/update_status_c/' . $this->uri->segment(3); ?>" method="post">

                    <tr align="center">
                        <td data-header="ID PEKERJA">
                            <div class="main"><?php echo $tk->id_tkg ?></div>
                        </td>

                        <div class="form-group">
                            <input type="text" name="id_tkg" class="form-control" id="id_tkg" value="<?php echo $tk->id_tkg ?>" hidden>
                        </div>
                        <td data-header="NAMA PEKERJA">
                            <div class="main"><?php echo $tk->nama_tkg ?>
                        </td>
                        <td data-header="EMAIL">
                            <div class="main"><?php echo $tk->email ?>
                        </td>
                        <td width="250">


                            <div class="form-group">
                                <select class="form-control" name="status_jasa" placeholder="status">
                                    <option value="">Penilaian</option>
                                    <!-- <option value="Proses">Proses</option> -->
                                    <option value="Selesai">Selesai</option>
                                    <option value="Komplen">Komplen</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-block btn-primary btn-sm mt-1">Simpan</button>

                        </td>
                    </tr>
                </form>

            <?php endforeach ?>
        </table>
    </div>

    <a href="<?php echo base_url('Customer/status_c') ?>">
        <div class="btn btn-danger btn-sm"> Kembali </div>
    </a>

    <!--     <?php $bayar = $this->db->where('id_invoice', $this->uri->segment(3))->get('tb_pembayaran')->num_rows(); ?>
    <?php if ($bayar != 1) : ?>
<?php endif; ?>  -->
</div>