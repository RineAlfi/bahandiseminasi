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
                <a class="navbar-brand brand-logo mr-5" href="<?php echo base_url(); ?>dashboard"><img src="<?= base_url('assets'); ?>/images/logodiseminasi.png" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav navbar-nav-right">
                    <!-- <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group ">
                            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                <span class="input-group-text" id="search">
                                    <i class="icon-search"></i>
                                </span>
                            </div>
                        </div>
                    </li> -->
                    <li class="nav-item dropdown">
                        <!-- <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="icon-bell mx-0"></i>
                            <span class="count"></span>
                        </a> -->
                        <!-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="ti-info-alt mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Application Error</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        Just now
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="ti-settings mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Settings</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        Private message
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="ti-user mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">New user registration</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        2 days ago
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li> -->
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="<?= base_url('assets'); ?>/images/logo/kementan.png" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <!-- <a class="dropdown-item">
                                <i class="ti ti-settings"></i>
                                Settings
                            </a> -->
                            <a class="dropdown-item" href="<?php echo base_url(); ?>masuk/keluar">
                                <i class="ti ti-logout"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                    <!-- <li class="nav-item nav-settings d-none d-lg-flex">
                        <a class="nav-link" href="#">
                            <i class="icon-menu"></i>
                        </a>
                    </li>
                </ul> -->
                <!-- <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button> -->
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div id="right-sidebar" class="settings-panel">
                <!-- <i class="settings-close ti-close"></i> -->
                <!-- <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                    </li>
                </ul> -->
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                        <!-- <div class="add-items d-flex px-3 mb-0"> -->
                            <!-- <form class="form w-100"> -->
                                <!-- <div class="form-group d-flex">
                                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                    <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                                </div> -->
                            <!-- </form> -->
                        <!-- </div> -->
                        <!-- <div class="list-wrapper px-3"> -->
                            <!-- <ul class="d-flex flex-column-reverse todo-list"> -->
                                <!-- <li> -->
                                    <!-- <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Team review meeting at 3.00 PM
                                        </label>
                                    </div> -->
                                    <!-- <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Prepare for presentation
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li> -->
                                <!-- <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Resolve all the low priority tickets due today
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i> -->
                                <!-- </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Schedule meeting for next week
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li> -->
                                <!-- <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Project review
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i> -->
                                <!-- </li>
                            </ul>
                        </div>
                        <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary mr-2"></i>
                                <span>Feb 11 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                            <p class="text-gray mb-0">The total number of sessions</p>
                        </div> --> 
                        <!-- <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary mr-2"></i>
                                <span>Feb 7 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                            <p class="text-gray mb-0 ">Call Sarah Graves</p>
                        </div> -->
                    </div>
                    <!-- To do section tab ends -->
                    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                            <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
                        </div>
                        <ul class="chat-list">
                            <li class="list active">
                                <div class="profile"><img src="<?= base_url('assets'); ?>/images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Thomas Douglas</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">19 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="<?= base_url('assets'); ?>/images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                                <div class="info">
                                    <div class="wrapper d-flex">
                                        <p>Catherine</p>
                                    </div>
                                    <p>Away</p>
                                </div>
                                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                                <small class="text-muted my-auto">23 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="<?= base_url('assets'); ?>/images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Daniel Russell</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">14 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="<?= base_url('assets'); ?>/images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                                <div class="info">
                                    <p>James Richardson</p>
                                    <p>Away</p>
                                </div>
                                <small class="text-muted my-auto">2 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="<?= base_url('assets'); ?>/images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Madeline Kennedy</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">5 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="<?= base_url('assets'); ?>/images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Sarah Graves</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">47 min</small>
                            </li>
                        </ul>
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