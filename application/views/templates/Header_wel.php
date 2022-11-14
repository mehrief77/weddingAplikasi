<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Megrashy_Wedding</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/dashboard.css" rel="stylesheet">

    <!-- dari web ci -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("bootstrap/css/bootstrap.min.css"); ?>">
    <script type="text/javascript" href="<?php echo base_url("bootstrap/js/jquery.min.js"); ?>"></script>
    <script type="text/javascript" href="<?php echo base_url("bootstrap/js/bootstrap.min.js"); ?>"></script>


    <!-- utk layar menjadi responsif -->
    <style type="text/css">
        @media screen and (max-width: 520px) {
            table {
                width: 100%;
            }

            thead th.column-primary {
                width: 100%;
            }

            thead th:not(.column-primary) {
                display: none;
            }

            th[scope="row"] {
                vertical-align: top;
            }

            td {
                display: block;
                width: auto;
                text-align: right;
            }

            thead th::before {
                text-transform: uppercase;
                font-weight: bold;
                content: attr(data-header);
            }

            thead th:first-child span {
                display: none;
            }

            td::before {
                float: left;
                display: block !important;
                text-transform: uppercase;
                font-weight: bold;
                font-size: 13px;
                /*margin-right: 40px !important;*/
                content: attr(data-header);
            }

            .main {
                display: inline-block !important;
            }



            .tag-responsive {
                display: none !important;
            }



        }
    </style>

</head>


<!-- <!DOCTYPE html>
<html>

<head> -->
<!-- <title>Website Dengan Codeigniter</title> -->

<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url("bootstrap/css/bootstrap.min.css"); ?>">
  <script type="text/javascript" href="<?php echo base_url("bootstrap/js/jquery.min.js"); ?>"></script>
  <script type="text/javascript" href="<?php echo base_url("bootstrap/js/bootstrap.min.js"); ?>"></script> -->
<!-- </head> -->


<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> -->
<!-- <nav class="navbar navbar-dark bg-dark">  -->

<!-- dari sini sampai -->
<nav style="background-color: #eba1a2;" class="navbar navbar-expand-lg">
    <!-- <a style="color: white ;" class="navbar-brand" href="#">Pencari Kerja</a> -->
    <a style="color: white ;" class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('Welcome') ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/img/logo_megrashy.png'); ?> " width="80px">
        </div>
        <div class="sidebar-brand-text mx-3">Pengunjung Yang Terhormat</div>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarText" style="color: red">

        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
                <a style="color: white ;" class="nav-link" href="<?php echo base_url('Welcome') ?>">
                    <!-- <i class="fas fa-home"></i> -->
                    <img src="<?= base_url('assets/img/house.png'); ?> " width="30px">
                    <span>Home</span>
                </a>
            </li>

            <li class="nav-item dropdown no-arrow">
                <a style="color: white ;" class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?= base_url('uploads/category.png'); ?> " width="30px">
                    <span>Kategori</span>
                </a>

                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?php echo base_url('Kategori/elegant') ?>">
                        <img src="<?= base_url('uploads/platinum.png'); ?> " width="30px">
                        <span>Elegant</span>
                    </a>

                    <a class="dropdown-item" href="<?php echo base_url('Kategori/best') ?>">
                        <img src="<?= base_url('uploads/best-seller.png'); ?> " width="30px">
                        <span>Best</span>
                    </a>

                    <a class="dropdown-item" href="<?php echo base_url('Kategori/glamour') ?>">
                        <img src="<?= base_url('uploads/luxury.png'); ?> " width="30px">
                        <span>Glamour</span>
                    </a>

                    <a class="dropdown-item" href="<?php echo base_url('Kategori/exclusive') ?>">
                        <img src="<?= base_url('uploads/exclusive.png'); ?> " width="30px">
                        <span>Exclusive</span>
                    </a>

                    <div class="dropdown-divider"></div>
                </div>
            </li>

            <!-- <li class="nav-item">
                <a style="color: white ;" class="nav-link" href="<?php echo base_url('Kategori/elegant') ?>">
                    <img src="<?= base_url('uploads/platinum.png'); ?> " width="30px">
                    <span>Elegant</span>
                </a>
            </li>

            <li class="nav-item">
                <a style="color: white ;" class="nav-link" href="<?php echo base_url('Kategori/best') ?>">
                    <img src="<?= base_url('uploads/best-seller.png'); ?> " width="30px">
                    <span>Best</span>
                </a>
            </li>

            <li class="nav-item">
                <a style="color: white ;" class="nav-link" href="<?php echo base_url('Kategori/glamour') ?>">
                    <img src="<?= base_url('uploads/luxury.png'); ?> " width="30px">
                    <span>Glamour</span>
                </a>
            </li>

            <li class="nav-item">
                <a style="color: white ;" class="nav-link" href="<?php echo base_url('Kategori/exclusive') ?>">
                    <img src="<?= base_url('uploads/exclusive.png'); ?> " width="30px">
                    <span>Exclusive</span>
                </a>
            </li> -->

            <li class="nav-item">
                <a style="color: white ;" class="nav-link" href="<?php echo base_url('Auth/pilih') ?>">
                    <img src="<?= base_url('uploads/online-registration.png'); ?> " width="30px">
                    <!-- <img src="<?= base_url('uploads/Apps-preferences-system-login-icon.png'); ?> " width="30px"> -->
                    <span>Daftar Membar</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- cara menampilkan jumlah barang yg sudah dimasukan ke dalam keranjang dan memposisikan nama keranjang belanja di sebelah kanan-->

    <div class="navbar">
        <ul class="nav navbar-nav navbar-right">
            <li>
                <!-- <img src="<?= base_url('assets/img/note.png'); ?> " width="30px"> -->
                <img src="<?php echo base_url('assets\img\add-to-cart.png') ?> " width="30px">

                <?php
                $keranjang = 'Orderanku : ' . $this->cart->total_items() . 'item' ?></i>
                <!-- menambah link keranjang belanja -->
                <?php echo anchor('dashboard/detail_pesan', $keranjang) ?>
            </li>
        </ul>
    </div>
    </ul>


    <div class="topbar-divider d-none d-sm-block"></div>
    <!-- button login -->
    <ul class="na navbar-nav navbar-right">
        <?php if ($this->session->userdata('email')) { ?>
            <li>
                <div>Selamat Datang <?php echo $this->session->userdata('email') ?>
                </div>
            </li>

            <li class="ml-2">
                <?php echo anchor('Auth/logout', '<i class="fas fa-sign-out-alt">Logout</i>') ?>
            </li>

        <?php } else { ?>
            <li><?php echo anchor('auth/login', '<i class="fas fa-sign-in-alt"> Login </i>'); ?></li>
        <?php } ?>
    </ul>



</nav>
<!-- </nav> -->

<!-- </html> -->