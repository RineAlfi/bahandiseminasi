<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets'); ?>/js/select.dataTables.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="</?= base_url('assets'); ?>/js/DataTables/datatables.css"> -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url('assets'); ?>/images/logo/kementan.png" />
    <!-- icon -->
    <link rel="stylesheet" href="https://unpkg.com/@tabler/icons@latest/iconfont/tabler-icons.min.css">
    <!-- MDBootstrap Datatables  -->
    <link href="<?= base_url('assets'); ?>/css/addons/datatables.min.css" rel="stylesheet">
    <!-- SweetAlert -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/sweet-alert/sweetalert2.min.css">
    <style>
        .swal2-popup {
            font-size: 1.0rem !important;
            height: 80%;
    }</style>
    <!-- Datepicker -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/daterangepicker/daterangepicker.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/datatables/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/datatables/buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/datatables/responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendors/gijgo/css/gijgo.min.css">

    <style>
        #accordionSidebar,
        .topbar {
            z-index: 1;
        }
    </style>

    
</head>

<body>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="padding: 0 0 0 5px;">
                <a class="navbar-brand brand-logo mr-5" href="<?php echo base_url(); ?>satuan"><img src="<?= base_url('assets'); ?>/images/logodiseminasi.png" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="<?= base_url('assets'); ?>/images/logo/kementan.png" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="<?php echo base_url(); ?>masuk/keluar">
                                <i class="ti ti-logout"></i>
                                Logout
                            </a>
                        </div>
                    </li>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div id="right-sidebar" class="settings-panel">
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                    </div>
                    <!-- chat tab ends -->
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>dashboard">
                    <i class="ti ti-home-2" style="font-size: 22px; margin-right: 8px;"></i>
                    <span class="menu-title">Dashboard</span>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <i class="ti ti-clipboard-list" style="font-size: 22px; margin-right: 8px;"></i>
                    <span class="menu-title">Data Master</span>
                    <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?=base_url()?>satuan">Satuan Barang</a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?=base_url()?>jenis">Jenis Barang</a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?=base_url()?>databarang">Data Barang</a></li>
                    </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                    <i class="ti ti-wallet" style="font-size: 22px; margin-right: 8px;"></i>
                    <span class="menu-title">Transaksi</span>
                    <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>barangmasuk">Barang Masuk</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>barangkeluar">Barang Keluar</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>barangkembali">Barang Kembali</a></li>
                    </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>laporan">
                    <i class="ti ti-files" style="font-size: 22px; margin-right: 8px;"></i>
                    <span class="menu-title">Laporan</span>
                    </a>
                </li>
                </ul>
         </nav>
</body>

</html>