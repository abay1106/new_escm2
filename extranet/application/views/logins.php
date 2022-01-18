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
    <title>eSCM <?php echo COMPANY_NAME ?></title>
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
              <div class="my-4 text-center text-bold-700">Electronic Supply Chain Management <br/><strong><?php echo COMPANY_NAME ?></strong></div> <hr/>
              <!-- <p class="text-center">
                Tujuan eSCM adalah untuk menciptakan transparansi, efisiensi dan efektifitas serta akuntabilitas dalam pengadaan barang dan jasa melalui media elektronik antara pengguna jasa dan penyedia jasa.
              </p>     -->
              
              <?php
                $pesan = $this->session->userdata('message');
                $pesan = (empty(trim($pesan))) ? "" : $pesan;
                if(!empty($pesan)){ ?>
                <div class="alert alert-danger">
                <?php echo $pesan ?>
              </div>
              <?php } else { ?>

              <div class="alert alert-success" id="alert-alert">
                <?php echo $this->lang->line("Gunakan e-mail dan password dari Pendaftaran Rekanan"); ?>
              </div>
              <?php }$this->session->unset_userdata('message'); ?>
              <form class="m-t" role="form" id="login_form" method="post" action="<?php echo site_url("welcome/in") ?>">

                <div class="form-group" style="display: none">
                  <btn class="btn btn-success" id="helpleh">?</btn>
                  <select class="form-control m-b" name="bahasa" style="width: 85%;float: right; padding-left: 0%">
                    <option value="indonesia">Bahasa Indonesia</option>
                    <option value="english">English</option>
                  </select>
                </div>

                <div class="form-group first">
                  <label for="username">Email</label>
                  <input type="text" name="username_login" class="form-control" placeholder="Email" id="username_login" required>
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" name="password_login" class="form-control" placeholder="Password" id="password_login" required>
                </div>                
                
                <div class="form-group text-center" id="form_captcha" style="display: none">
                  <img src="<?php echo site_url('welcome/gambar') ?>" style="width: 40%;" alt="CAPTCHA"><br /><br />
                  <input type="text" name="captcha" class="form-control form-control-sm" placeholder="Type Text Above" required>
                </div>

                <button id="logins" type="submit" class="btn btn-info block mb-3"><?php echo $this->lang->line('Login'); ?></button>
                <btn class="btn btn-info tombolButtons" id="arrowDown" style="float: right; width: 15%;"> &#x2193; </btn>
                <btn class="btn btn-info tombolButtons" id="arrowUp" style="display: none;float: right; width: 15%;"> &#x2191; </btn>

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

              <div class="text-center" style="display: none" id="crPhone">
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

    <script type="text/javascript">
        $(document).ready(function(){
          $(function () {
            var width = parseInt($(window).width());
            if(width > 480){
              $(".slideInRight").addClass("loginColumns-d");
              $("#azzaz").addClass("loginPengadaan-d");
              $('#logins').css('width', '100%');
              $('.tombolButtons').hide();
              $('#crPC').show();
              $('#crPhone').hide();
            } else {
              $(".slideInRight").addClass("loginColumns");
              $("#azzaz").hide();
              $('#arrowDown').show();
              $('#logins').css('width', '80%');
              $(".isiButtonSpesial").addClass("wordWrap")
              $('#crPC').hide();
              $('#crPhone').show();
            }
          });

          $("#logins").click(function(){
            if($("#login_form").validate().form()){
              $("#logins").prop("disabled", true);
              $("#logins").text("Please Wait...");
            }
          });

          $('.tombolButtons').click(function(){
            if ($('#arrowDown').is(':visible')) {
              $('#arrowUp').show();
              $('#arrowDown').hide();
                }else {
              $('#arrowDown').show();
              $('#arrowUp').hide();
            }
            $('#btnButtons').toggle("slow");
          })
        });

        $('#password_login').bind("change keyup input", function(){
        if($('#username_login').val()) {

            $('#form_captcha').show("slow");
          }})
      $('#username_login').bind("change keyup input", function(){
        if($('#password_login').val()) {

        $('#form_captcha').show("slow");
      }})
    </script>

    
  </body>
</html>

