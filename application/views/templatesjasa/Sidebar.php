<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <i class="fas fa-hands-helping"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Tukang</div>
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
        <a class="nav-link" href="<?php echo base_url('jasa/Tukang/Profile') ?>">
          <!-- <i class="fas fa-user-tie"></i> -->
          <img src="<?= base_url('assets/img/workers.png'); ?> " width="30px">
          <span>Profile Tukang</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('jasa/Tukang/edit') ?>">
          <!-- <i class="fas fa-user-edit"></i> -->
          <img src="<?= base_url('assets/img/user.png'); ?> " width="30px">
          <span>Edit Tukang</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('jasa/Tukang/pesanan_t') ?>">
          <img src="<?= base_url('assets/img/order.png'); ?> " width="30px">
          <!-- <i class="fas fa-user-edit"></i> -->
          <span>Pesanan Masuk</span></a>
      </li>


      <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('jasa/Tukang/status_t') ?>"> -->
      <!-- <i class="fas fa-fw fa-file-invoice"></i> -->
      <!-- <img src="<?= base_url('assets/img/biography.png'); ?> " width="30px">
          <span>Status</span>
        </a>
      </li> -->


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