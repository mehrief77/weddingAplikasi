<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url('assets/img/logo_megrashy.png'); ?> " width="80px">
        </div>
        <div class="sidebar-brand-text mx-3">Vendor Yg Terhormat</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Heading -->
      <div class="sidebar-heading">
        USER
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('jasa/Dashboard_jasa') ?>">
          <!-- <i class="fas fa-home"></i> -->
          <img src="<?= base_url('assets/img/house.png'); ?> " width="30px">
          <span>Home</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('jasa/Wedding/Profile') ?>">
          <!-- <i class="fas fa-user-tie"></i> -->
          <img src="<?= base_url('assets/img/profile.png'); ?> " width="30px">
          <span>My Profile</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('jasa/Wedding/buat_usaha') ?>">
          <!-- <i class="fas fa-user-tie"></i> -->
          <img src="<?= base_url('assets/img/shop-icon.png'); ?> " width="30px">
          <span>Buat Usaha Wedding</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('jasa/Wedding/paket') ?>">
          <img src="<?= base_url('assets/img/data_paket.png'); ?> " width="30px">
          <span>Data Paket Wedding</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('jasa/Wedding/edit') ?>">
          <img src="<?= base_url('assets/img/editor.png'); ?> " width="30px">
          <span>Edit Wedding Org</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('jasa/Wedding/pesanan_t') ?>">
          <img src="<?= base_url('assets/img/notification.png'); ?> " width="30px">
          <span>Orderan Masuk</span></a>
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