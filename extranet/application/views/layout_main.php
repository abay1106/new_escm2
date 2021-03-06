<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="manifest" href="<?php echo base_url('manifest.json') ?>">
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png') ?>">

	<title>eSCM <?php echo COMPANY_NAME ?></title>

	<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css') ?>" rel="stylesheet">

	<!-- Bootstrap-table -->
	<link rel="stylesheet" href="<?php echo base_url('assets/plugin/bootstrap-table/dist/bootstrap-table.min.css') ?>"/>

	<!-- Data Tables -->
	<link href="<?php echo base_url('assets/css/plugins/dataTables/dataTables.bootstrap.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/plugins/dataTables/dataTables.responsive.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/plugins/dataTables/dataTables.tableTools.min.css') ?>" rel="stylesheet">

	<!-- Date Picker -->
	<link href="<?php echo base_url('assets/css/plugins/datapicker/datepicker3.css') ?>" rel="stylesheet">

	<link href="<?php echo base_url('assets/css/animate.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">

	<!-- Check Box -->
	<link href="<?php echo base_url('assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') ?>" rel="stylesheet">

	<!-- iCheck -->
	<link href="<?php echo base_url('assets/css/plugins/iCheck/custom.css') ?>" rel="stylesheet">

	<!-- Sweet Alert -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/plugins/sweetalert/sweetalert.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/plugins/toastr/toastr.min.css')?>">




	<script type="text/javascript">

			// Current Server Time script (SSI or PHP)- By JavaScriptKit.com (http://www.javascriptkit.com)
			// For this and over 400+ free scripts, visit JavaScript Kit- http://www.javascriptkit.com/
			// This notice must stay intact for use.

			//Depending on whether your page supports SSI (.shtml) or PHP (.php), UNCOMMENT the line below your page supports and COMMENT the one it does not:
			//Default is that SSI method is uncommented, and PHP is commented:

			var currenttime = '<?php echo date("F d, Y H:i:s")?>' //PHP method of getting server date

			///////////Stop editting here/////////////////////////////////

			var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
			var serverdate=new Date(currenttime)

			function padlength(what){
				var output=(what.toString().length==1)? "0"+what : what
				return output
			}

			function displaytime(){
				serverdate.setSeconds(serverdate.getSeconds()+1)
				var datestring=padlength(serverdate.getDate())+" "+montharray[serverdate.getMonth()]+" "+serverdate.getFullYear()+" - "
				var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
				document.getElementById("servertime").innerHTML=datestring+" "+timestring+" WIB";
			}

			window.onload=function(){
				setInterval("displaytime()", 1000)
			}

		</script>

		<!-- Mainly scripts -->
		<script src="<?php echo base_url('assets/js/jquery-2.1.1.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.form.min.js') ?>"></script>

		<!-- Data Tables -->
		<script src="<?php echo base_url('assets/js/plugins/dataTables/jquery.dataTables.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/plugins/dataTables/dataTables.bootstrap.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/plugins/dataTables/dataTables.responsive.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/plugins/dataTables/dataTables.tableTools.min.js') ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.ajaxfileupload.js')?>"></script>
		<script  type="text/javascript" src="<?php echo base_url('assets/js/jquery.form.js')?>"></script>

		<!-- Custom and plugin javascript -->
		<script src="<?php echo base_url('assets/js/inspinia.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js') ?>"></script>

		<!-- AutoNumeric -->
		<script src="<?php echo base_url('assets/plugin/autoNumeric/autoNumeric.js') ?>"></script>

		<!-- jQuery UI -->
		<script src="<?php echo base_url('assets/js/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>

		<!-- Date Picker -->
		<script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.js') ?>"></script>

		<!-- Accounting.js -->
		<script src="<?php echo base_url('assets/js/accounting.min.js') ?>"></script>

		<!-- iCheck -->
		<script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js') ?>"></script>

		<!-- Sweet Alert -->
		<script src="<?php echo base_url('assets/js/plugins/sweetalert/sweetalert.min.js') ?>"></script>

		<!-- Jquery Validate -->
		<script src="<?php echo base_url('assets/js/plugins/validate/jquery.validate.min.js') ?>"></script>

	<script type="text/javascript" src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.12.0.min.js"></script>
	<script src="<?php echo base_url('assets/js/custom-messaging.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/numeral.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugin/toastr/toastr.min.js') ?>"></script>

	<!-- Bootstrap-table -->
	  <script src="<?php echo base_url('assets/plugin/bootstrap-table/dist/bootstrap-table.min.js') ?>"></script>
	  <script src="<?php echo base_url('assets/plugin/bootstrap-table/dist/extensions/cookie/bootstrap-table-cookie.min.js') ?>"></script>
	  <script src="<?php echo base_url('assets/plugin/bootstrap-table/dist/extensions/editable/bootstrap-table-editable.min.js') ?>"></script>
	  <script src="<?php echo base_url('assets/plugin/bootstrap-table/dist/extensions/export/bootstrap-table-export.min.js') ?>"></script>
	  <script src="<?php echo base_url('assets/plugin/bootstrap-table-filter/src/bootstrap-table-filter.js') ?>"></script>
	  <script src="<?php echo base_url('assets/plugin/bootstrap-table/dist/extensions/filter/bootstrap-table-filter.min.js') ?>"></script>
	  <script src="<?php echo base_url('assets/plugin/bootstrap-table/dist/extensions/filter-control/bootstrap-table-filter-control.min.js') ?>"></script>
	  <script src="<?php echo base_url('assets/plugin/bootstrap-table/dist/extensions/flat-json/bootstrap-table-flat-json.min.js') ?>"></script>
	  <script src="<?php echo base_url('assets/plugin/bootstrap-table/dist/extensions/key-events/bootstrap-table-key-events.min.js') ?>"></script>
	  <script src="<?php echo base_url('assets/plugin/bootstrap-table/dist/extensions/multiple-sort/bootstrap-table-multiple-sort.min.js') ?>"></script>
	  <script src="<?php echo base_url('assets/plugin/bootstrap-table/dist/extensions/reorder-columns/bootstrap-table-reorder-columns.min.js') ?>"></script>
	  <script src="<?php echo base_url('assets/plugin/bootstrap-table/dist/extensions/natural-sorting/bootstrap-table-natural-sorting.min.js') ?>"></script>
	  <script src="<?php echo base_url('assets/plugin/bootstrap-table/dist/extensions/reorder-columns/bootstrap-table-reorder-columns.min.js') ?>"></script>
	  <script src="<?php echo base_url('assets/plugin/bootstrap-table/dist/extensions/resizable/bootstrap-table-resizable.min.js') ?>"></script>
	  <script src="<?php echo base_url('assets/plugin/bootstrap-table/dist/extensions/toolbar/bootstrap-table-toolbar.min.js') ?>"></script>
  	 <script type="text/javascript" src="<?php echo base_url('assets/plugin/bootstrap-table/dist/extensions/editable/x-editable.js') ?>"></script>


<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){

              //y validasi input type number minimal 0   
              $('input[type="number"]').attr({
                min:"0",
                oninput:"this.value = Math.abs(this.value)"
              });
              //y end :'(

              var is_link = false
              $(document).click(function(e) {
                    var target = $( e.target );
                    if ( target.is( "a" ) || (target.is( "button" ) && target.has("a"))) {
                        //Do what you want to do
                          is_link = true
                          // console.log(is_link)
                          // console.log('is_link true')
                      }
                  })
              window.onbeforeunload=function(){
                if(!is_link){
                  return  "Apakah Anda yakin ingin meninggalkan laman ini?";
                  // console.log('nggak ok')
                  // alert("hahah");
                }
                // else{
                //   console.log('ok')
                // }
              }

            })
		</script>
</head>

<body>


		<div id="wrapper">
			<nav class="navbar-default navbar-static-side" role="navigation">
				<div class="sidebar-collapse">
					<ul class="nav metismenu" id="side-menu">
						
							
						<li class="nav-header" style="background: #2a3642;">
							<div class="dropdown profile-element">
								<div style="margin-bottom:12px;background-color:#f3f3f4;padding:8px;border-radius: 8px;">
									<img alt="image" style="max-width:100%;" class="img-reponsive" src="<?php echo base_url("assets/img/logo.png") ?>" />
								</div>
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">
									<span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata("nama_vendor") ?> - <?php echo $this->session->userdata("userid") ?></strong>
									</span></a>
									<span id="servertime" class="text-muted text-xs block"></span>
								</div>
								<div class="logo-element">
									<?php echo COMPANY_LABEL ?>
								</div>
							</li>
							<?php if ($this->session->userdata('status_aktivasi') == 'Active') { ?>
							<li>
								<a href="<?php echo site_url('home'); ?>"><i class="fa fa-folder-o"></i> <span class="nav-label"><?php echo $this->lang->line('Beranda'); ?></span></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-folder-o"></i> <span class="nav-label"><?php echo $this->lang->line('Pengadaan'); ?></span></a>
								<ul class="nav nav-second-level collapse">
									<li>
										<a href="<?php echo site_url("pengadaan"); ?>"><?php echo $this->lang->line('Daftar Pekerjaan'); ?>
										</a>
									</li>
									<li>
										<a href="<?php echo site_url("pengadaan/monitorpengadaan"); ?>"><?php echo $this->lang->line('Monitor Pengadaan'); ?>
										</a>
									</li>
									<li>
										<a href="<?php echo site_url("pengadaan/buatsanggah"); ?>"><?php echo $this->lang->line('Membuat Sanggahan'); ?>
										</a>
									</li>
									<li>
										<a href="<?php echo site_url("pengadaan/monitorsanggah"); ?>"><?php echo $this->lang->line('Monitor Sanggahan'); ?>
										</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="layouts.html"><i class="fa fa-folder-o"></i> <span class="nav-label"><?php echo $this->lang->line('Kontrak'); ?></span></a>
								<ul class="nav nav-second-level collapse">
									<li>
										<a href="<?php echo site_url("kontrak"); ?>"><?php echo $this->lang->line('Daftar Pekerjaan'); ?>
										</a>
									</li>
									<li>
										<a href="<?php echo site_url("kontrak/addendum"); ?>">
											Addendum
										</a>
									</li>
									<li>
										<a href="<?php echo site_url("kontrak/wo"); ?>">
											Update Progress PO
										</a>
									</li>
									<li>
										<a href="<?php echo site_url("kontrak/milestone"); ?>">
											Update Progress Milestone
										</a>
									</li>
									<li>
										<a href="<?php echo site_url("kontrak/monitor"); ?>">
											<?php echo $this->lang->line('Monitor Kontrak'); ?>
										</a>
									</li>

									<li>
										<a href="<?php echo site_url("kontrak/monitor_wo"); ?>">
											Monitor PO
										</a>
									</li>
									<li>
										<a href="<?php echo site_url("kontrak/monitor_milestone"); ?>">
											Monitor Milestone / Termin
										</a>
									</li>
									<li>
										<a href="<?php echo site_url("kontrak/monitor_bast"); ?>">
											Monitor BAST
										</a>
									</li>
									<li>
										<a href="<?php echo site_url("kontrak/tagihan"); ?>">
											<?php echo $this->lang->line('Monitor Tagihan'); ?>
										</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="<?php echo site_url('vsi'); ?>"><i class="fa fa-folder-o"></i> <span class="nav-label"><?php echo $this->lang->line('VSI'); ?></span></a>
								<ul class="nav nav-second-level collapse">
									<li>
										<a href="<?php echo site_url("vsi/kuesioner"); ?>">Kuesioner</a>
									</li>
									<!-- <li>
										<a href="<?php echo site_url("vsi/survey"); ?>">Data Survey</a>
									</li>
									<li>
										<a href="<?php echo site_url("vsi/presentase"); ?>">Presentase</a>
									</li> -->
									<li>
										<a href="<?php echo site_url("vsi/lihat_kuesioner"); ?>">History Kuesioner</a>
									</li>
								</ul>
							</li>
						<?php } ?>
							<li>
								<a href="<?php echo site_url('home/profile'); ?>"><i class="fa fa-folder-o"></i> <span class="nav-label"><?php echo $this->lang->line('Profil'); ?></span></a>
							</li>
							<li>
								<a href="<?php echo base_url("assets/guide/Manual_Vendor_Site.pdf"); ?>" target="_blank"><i class="fa fa-folder-o"></i> <span class="nav-label"><?php echo $this->lang->line('Bantuan'); ?></span></a>
							</li>
						</ul>

					</div>
				</nav>

				<div id="page-wrapper" class="gray-bg">
					<div class="row border-bottom">
						<nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
							<div class="navbar-header">
								<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i></a>
							</div>
							<ul class="nav navbar-top-links navbar-right">
								<li>
									<span class="m-r-sm text-muted welcome-message"><strong class="font-bold"><?php echo $this->lang->line('Selamat Datang di Aplikasi eSCM '.COMPANY_NAME); ?></strong></span>
								</li>

								<li>
									<a href="<?php echo site_url('welcome/out') ?>">
										<i class="fa fa-sign-out"></i> <?php echo $this->lang->line('Keluar'); ?>
									</a>
								</li>
							</ul>

						</nav>
					</div>


					<div class="wrapper wrapper-content">

						<?php echo $content_for_layout ?>
						<?php include("picker_v.php") ?>
						<?php exit() ?>

					</div>

					<div class="footer">
						<div class="pull-right">
							<?php echo COMPANY_NAME ?> &copy; 2016
						</div>
					</div>

				</div>

			</div>

			<div class="modal fade" id="myLoader" tabindex="-1" role="dialog" aria-labelledby="myLoaderLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-body">
						<center><h3 class="modal-title" id="myLoaderLabel">Loading...</h3></center>
						<br/>
							<div class="progress">
								<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
									<span class="sr-only">100% Complete</span>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</body>
		</html>
