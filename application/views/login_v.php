<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png') ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/page-login/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/page-login/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/page-login/css/bootstrap.min.css">    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/page-login/css/style.css">  
    <title><?php echo COMPANY_NAME ?> | Login</title>
  </head>
  <body>
  
    <div class="d-lg-flex half">
      <div class="bg order-1 order-md-2" style="background-image: url('<?php echo base_url(); ?>assets/page-login/images/bg_1.jpg');"></div>
      <div class="contents order-2 order-md-1">

        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7">
              <div class="text-center py-3">
                <img src="<?php echo base_url('assets/img/logo.png') ?>" class="img-responsive" style="height: 30%; width: 30%">
              </div>              
              <p class="mb-4 text-center">Electronic Supply Chain Management <br/><strong><?php echo COMPANY_NAME ?></strong></p>
              <p class="text-center">
                Tujuan eSCM adalah untuk menciptakan transparansi, efisiensi dan efektifitas serta akuntabilitas dalam pengadaan barang dan jasa melalui media elektronik antara pengguna jasa dan penyedia jasa.
              </p>              

              <?php 
                $pesan = $this->session->userdata('message');
                $pesan = (empty($pesan)) ? "" : $pesan;
                if(!empty($pesan)){ ?>
                <div class="alert alert-info">
                <?php echo $pesan ?>
              </div>
              <?php } $this->session->unset_userdata('message'); ?>

              <h3 class="mb-3 text-center"><strong>eSCM Intranet</strong></h3>

              <form class="m-t" role="form" id="login_form" method="post" action="<?php echo site_url("log/in") ?>">                 
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username_login" placeholder="Username" required="">
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password_login" placeholder="Password" required="">
                </div>
                
                <div class="d-flex mb-3 align-items-center">                  
                  <span class="ml-auto"><a href="#" id="forgot-btn" class="forgot-pass">Forgot Password</a></span> 
                </div>
                <input type="submit" value="Login" class="btn btn-block btn-primary">
              </form>

              <form class="m-t" role="form" id="forgot_form" method="post" style="display:none;" action="<?php echo site_url("log/forgot") ?>" >
                <div class="form-group">
                  <input type="email" class="form-control" name="email_login" placeholder="Email" required="">
                </div>
                
                <div class="d-flex mb-3 align-items-center">                  
                  <span class="ml-auto"><a href="#" id="login-btn" class="login-pass">Back to login</a></span> 
                </div>

                <input type="submit" value="Submit" class="btn btn-block btn-primary">
              </form>
              
              <div class="p-3 text-center"> 
                <p class="text-center">
                  <strong>Informasi eSCM</strong>              
                  <br/>
                  Email : info.scm@wika.co.id
                  <br/>
                  <strong>© <?php echo COMPANY_NAME ?></strong>
                </p>
              </div>

              <div style="display: none" id="crPhone">
                <small>© <?php $made = 2018; echo ($made == DATE('Y')) ? $made : $made .'-'. DATE('Y') ?> All Right Reserved</small>
              </div>

              <div class="col-md-12 text-right" style="background: rgba(255,255,255,1); width: 100%; height: 100%">
              <div class="text-center py-3">
                  <img src="<?php echo base_url(); ?>assets/img/iproc.png" style="width: 28%; height: 13%">
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/page-login/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/page-login/js/bootstrap.min.js"></script>

    <script>
      $(function () {
        $("#forgot-btn").click(function(){
          $("#forgot_form").show();
          $("#login_form").hide();
        });
        $("#login-btn").click(function(){
          $("#forgot_form").hide();
          $("#login_form").show();
        });

        function sesuaikan(){
          var width = parseInt($(window).width());
          console.log(width);
          if(width > 480){
            $( ".slideInRight" ).removeClass("loginColumns");
            $(".slideInRight").addClass("loginColumns-d");
            $('#crPhone').hide();
            $('#crPC').show();
          } else {
            $( ".slideInRight" ).removeClass("loginColumns-d");
            $(".slideInRight").addClass("loginColumns");
            $('#crPhone').show();
            $('#crPC').hide();
          }
        }
        sesuaikan();
        $(window).on('resize', function(){

          sesuaikan();
        });
      });
    </script>
    
  </body>
</html>

