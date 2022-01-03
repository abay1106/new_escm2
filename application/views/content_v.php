<div class="main-panel">
  <!-- BEGIN : Main Content-->
  <div class="main-content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">

      <div class="row">
        <div class="col-7">
          <div class="content-header"><strong><?php echo $mytitle; ?></strong></div>			
        </div>
        <div class="col-5">
          <div class="content-header float-right">
            <a class="text-muted text-xs block h5" id="servertime"></a>
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
