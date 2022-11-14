<!DOCTYPE html>

<!-- <body class="bg-gradient-primary"> -->

<body class="bodi">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/stile.css'); ?>">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Silahkan Pilih !</h1>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <img src="<?= base_url('assets/img/icons8-temple-60.png'); ?> " width="50px"><br>
                      <a href="<?php echo base_url('Auth/registration') ?>" class="btn btn-info">
                        Daftar Usaha WO</a>
                    </div>
                    <div class="col-lg-6">
                      <img src="<?= base_url('assets/img/icons8-wedding-64.png'); ?> " width="50px"><br>
                      <a href="<?php echo base_url('Auth/registration_pelanggan') ?>" class="btn btn-success">Daftar Customer</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  </html>