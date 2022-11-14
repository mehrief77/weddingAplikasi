<!-- sidebar customer asli-->

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('Dashboard_c') ?>">
        <div class="sidebar-brand-icon">
          <!-- <i class="fas fa-hands-helping"></i> -->
          <img src="<?= base_url('assets/img/logo_megrashy.png'); ?> " width="80px">
        </div>
        <div class="sidebar-brand-text mx-3">Customer Yang Terhormat</div>

      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('Dashboard_c') ?>">
          <!-- <i class="fas fa-home"></i> -->
          <img src="<?= base_url('assets/img/house.png'); ?> " width="30px">
          <span>Home</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        USER
      </div>

      <!-- Nav Item - Profile -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Customer/profile') ?>">
          <!-- <i class="fas fa-fw fa-user-tie"></i> -->
          <img src="<?= base_url('assets/img/programmer.png'); ?> " width="30px">
          <span>MyProfile</span>
        </a>
      </li>
      <!-- Nav Item - Profile -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Customer/edit') ?>">
          <!-- <i class="fas fa-fw fa-user-edit"></i> -->
          <img src="<?= base_url('assets/img/user.png'); ?> " width="30px">
          <span>Edit Profile</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Customer/transaksi') ?>">
          <!-- <i class="fas fa-fw fa-cash-register"></i> -->
          <img src="<?= base_url('assets/img/icons8-cash-register-240.png'); ?> " width="30px">
          <span>PesananKu</span>
        </a>
      </li>

      <li class="nav-item">
        <!--  <a class="nav-link" href="<?php echo base_url('Customer/berita_t') ?>"> -->
        <a class="nav-link" href="<?php echo base_url('Customer/status_t') ?>">
          <img src="<?= base_url('assets/img/newspaper.png'); ?> " width="30px">
          <span>Status Wedding</span></a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Customer/status_c') ?>">
          <img src="<?= base_url('assets/img/packing-list.png'); ?> " width="30px">
          <span> Status Pesanan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

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