<style>
  .bg-breadcrumb {
    background-image: linear-gradient(to right, #00306a, #2AACE3);
    color: #fff;
    margin-bottom: 20px;
    border-radius: 10px;
  }
  .content-header {
    color: #fff;
  }
  .text-muted {
    color: #fff !important;
  }

  .btn-info {
    background-color: #2AACE3;
    border-color: #2F8BE6;
    border-radius: 20px;
  }

  .btn-danger {
    background-color: #FF7376;
    border-color: #FF7376;
    border-radius: 20px;
  }

  .btn-primary {
    background-color: #00D9D0;
    border-color: #00D9D0;
    border-radius: 20px;
  }

  .btn-success {
    background-color: #56E9AE;
    border-color: #56E9AE;
    border-radius: 20px;
  }

  .bootstrap-table {
    margin-top: -40px;
  }

  a {
    color: #2AACE3;
    background-color: transparent;
  }
</style>
<div class="main-panel">
  <!-- BEGIN : Main Content-->
  <div class="main-content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">

      <div class="row bg-breadcrumb">
        <div class="col-7">
          <div class="content-header pt-3">
            <strong><?= $mytitle; ?></strong>
          </div>
        </div>
        <div class="col-5">
          <div class="float-right">
            <img src="<?= base_url('assets') ?>/app-assets/img/wika_employee.png" alt="WIKA Logo" / style="width:200px;">
            <!-- <a class="text-muted text-xs block h5" id="servertime"></a> -->
          </div>
        </div>
      </div>

      <?php
      $message = $this->session->userdata("message");
      $validate = validation_errors();

      if(!empty($message)){ ?>

      <div class="alert bg-light-info mb-2 col-12" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $message ?>
      </div>

      <?php } $this->session->unset_userdata("message");

      if(!empty($validate)){ ?>

      <div class="alert bg-danger-info mb-2 col-12" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $validate ?>
      </div>

      <div class="alert alert-danger alert-dismissible" style="margin:10px 10px 0px 10px" role="alert">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $validate ?>
      </div>

      <?php } ?>

      <?php include($body.".php"); ?>

  </div>
</div>
<!-- END : End Main Content-->
