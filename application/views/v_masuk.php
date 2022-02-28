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
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url('assets'); ?>/images/logo/kementan.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper-login d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="wrapper auth-form-light text-center py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?= base_url('assets'); ?>/images/logo/kementan.png" alt="logo">
              </div>
              <h3><b>Balai Penelitian</b></h3>
              <h3><b>Agroklimat dan Hidrologi</b></h3>
              <form class="pt-3" action="<?php echo base_url() ?>masuk" method="post">
              <?php echo $this->session->flashdata('message'); ?>
                <div class="form-field">
                  <input type="email" id='email' class="form-control form-control-lg" placeholder="Email" name='email' value="<?= set_value('email'); ?>" required>
                  <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-field">
                  <input type="password" id='password' class="form-control form-control-lg" placeholder="Kata Sandi" name='password' required>
                  <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                </div></br>
                <?php
                $error = $this->session->flashdata('error');
                if (!empty($error)) {
                  echo '
                     <div class="alert alert-danger" >
                     ' . $error . ' 
                     </div>
                   ';
                }
                ?>
                <!-- <div class="my-2 d-flex text-center">
                  <a href="#" class="auth-link text-black">Lupa Kata Sandi?</a>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<!-- content-wrapper ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?= base_url('assets'); ?>/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?= base_url('assets'); ?>/js/off-canvas.js"></script>
<script src="<?= base_url('assets'); ?>/js/hoverable-collapse.js"></script>
<script src="<?= base_url('assets'); ?>/js/template.js"></script>
<script src="<?= base_url('assets'); ?>/js/settings.js"></script>
<script src="<?= base_url('assets'); ?>/js/todolist.js"></script>
<!-- endinject -->
</body>

</html>