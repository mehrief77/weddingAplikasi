<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('Welcome') ?>">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url('assets/img/logo_megrashy.png'); ?> " width="80px">
        </div>
        <div class="sidebar-brand-text mx-3">Pengunjung Yang Terhormat</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('Welcome') ?>">
          <!-- <i class="fas fa-home"></i> -->
          <img src="<?= base_url('assets/img/house.png'); ?> " width="30px">
          <span>Home</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->

      <!-- Heading -->
      <div class="sidebar-heading">
        KATEGORI
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Kategori/electrical') ?>">
          <!--  <i class="fas fa-fw fa-bolt"></i> -->
          <img src="<?= base_url('assets/img/flash.png'); ?> " width="30px">
          <span>Electrical</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Kategori/elektronik') ?>">
          <!-- <i class="fas fa-fw fa-tv"></i> -->
          <img src="<?= base_url('assets/img/computer.png'); ?> " width="30px">
          <span>Elektronik</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Kategori/perkakas') ?>">
          <!-- <i class="fas fa-fw fa-tools"></i> -->
          <img src="<?= base_url('assets/img/settings.png'); ?> " width="30px">
          <span>Perkakas</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Kategori/tukang_bangunan') ?>">
          <!-- <i class="fas fa-fw fa-home"></i> -->
          <img src="<?= base_url('assets/img/brick.png'); ?> " width="30px">
          <span>Tukang Bangunan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Kategori/tukang_ledeng') ?>">
          <!--  <i class="fas fa-shower"></i> -->
          <img src="<?= base_url('assets/img/water-pipe.png'); ?> " width="30px">
          <span>Tukang Ledeng</span>
        </a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>


            <!-- cara menampilkan jumlah barang yg sudah dimasukan ke dalam keranjang dan memposisikan nama keranjang belanja di sebelah kanan-->

            <!-- <div class="navbar">
              <ul class="nav navbar-nav navbar-right">
                <li> -->
            <!-- <img src="<?= base_url('assets/img/note.png'); ?> " width="30px"> -->
            <!-- <img src="<?php echo base_url('assets\img\add-to-cart.png') ?> " width="30px"> -->

            <!-- <?php
                  $keranjang = 'Orderanku : ' . $this->cart->total_items() . 'item' ?></i> -->
            <!-- menambah link keranjang belanja -->
            <!-- <?php echo anchor('dashboard/detail_pesan', $keranjang) ?>
                      </li>
                    </ul>
                  </div>
                </ul> -->


            <!-- <div class="topbar-divider d-none d-sm-block"></div> -->
            <!-- button login -->
            <!-- <ul class="na navbar-nav navbar-right">
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
                </ul> -->

        </nav>
        <!-- End of Topbar -->