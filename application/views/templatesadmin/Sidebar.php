<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon">
          <img src="<?= base_url('assets/img/logo_megrashy.png'); ?> " width="80px">
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('admin/Dashboard_admin') ?>">
          <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
          <img src="<?= base_url('assets/img/house.png'); ?> " width="30px">
          <span>Home</span>
        </a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/Data_jasa') ?>">
          <!-- <i class="fas fa-fw fa-database"></i> -->
          <img src="<?= base_url('assets/img/database.png'); ?> " width="30px">
          <span>Data Vendor</span>
        </a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/Data_customer') ?>">
          <!-- <i class="fas fa-fw fa-database"></i> -->
          <img src="<?= base_url('assets/img/database_u.png'); ?> " width="30px">
          <span>Data Customer</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/Invoice') ?>">
          <!-- <i class="fas fa-fw fa-file-invoice"></i> -->
          <img src="<?= base_url('assets/img/invoice.png'); ?> " width="30px">
          <span>Invoice</span>
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
      <div id="">
        <!-- <div id="content"> -->