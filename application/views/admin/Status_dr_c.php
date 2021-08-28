<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">


            <h3>Kabar Dari Customer</h3>

            <img src="<?= base_url('assets/img/man.png'); ?> " width="150px">

            <form action="<?php echo base_url() . 'Customer/proses_bayar'; ?>" enctype="multipart/form-data" method="post">

                <!-- <div class="form-group">
                    <label>Status Tukang Saat ini</label>
                    <input type="text" name="status_jasa" placeholder="status" class="form-control" value="<?= $customer['status_jasa']; ?>" readonly>
                </div> -->

                <div class="form-group">
                    <label>Status Tukang Saat ini</label>
                    <input type="text" name="status_jasa" placeholder="status" class="form-control" value="<?= $cstr['status_jasa']; ?>" readonly>
                </div>
            </form>
        </div>

        <div class="col-md-2"></div>
    </div>
</div>