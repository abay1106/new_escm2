<style>
    .segitiga2 {
        height: 0px;
        width: 0px;
        border-left: solid 1.2em white;
        border-top: solid 2.3em transparent;
        border-bottom: solid 2.3em transparent;
    }
</style>
<div class="container-fluid">
    <div class="row px-0 my-2" style="font-size: 10px">
        <div class="shadow-none rounded-0 d-flex flex-row mb-1">
            <div class="px-2 py-1" style="background-color: white;">
                <p class="mb-1 font-weight-bold">Mulai Pendaftaran</p>
                <small class="text-muted" id="mulai_pendaftaran"></small>
            </div>
            <div class="segitiga2"></div>
        </div>
        <div class="shadow-none rounded-0 d-flex flex-row mb-1">
            <div class="px-2 py-1" style="background-color: white;">
                <p class="mb-1 font-weight-bold">Aanwijing</p>
                <small class="text-muted" id="ptp_prebid_date_"></small>
            </div>
            <div class="segitiga2"></div>
        </div>
        <div class="shadow-none rounded-0 d-flex flex-row mb-1">
            <div class="px-2 py-1" style="background-color: white;">
                <p class="mb-1 font-weight-bold">Penawaran</p>
                <small class="text-muted" id="ptp_quot_opening_date_"></small>
            </div>
            <div class="segitiga2"></div>
        </div>
        <div class="shadow-none rounded-0 d-flex flex-row mb-1">
            <div class="px-2 py-1" style="background-color: white;">
                <p class="mb-1 font-weight-bold">Evaluasi</p>
                <small class="text-muted" id="ptp_doc_open_date_"></small>
            </div>
            <div class="segitiga2"></div>
        </div>
        <div class="shadow-none rounded-0 d-flex flex-row mb-1">
            <div class="px-2 py-1" style="background-color: white;">
                <p class="mb-1 font-weight-bold">Negosiasi</p>
                <small class="text-muted" id="ptp_negosiation_date_"></small>
            </div>
            <div class="segitiga2"></div>
        </div>
        <div class="shadow-none rounded-0 d-flex flex-row mb-1">
            <div class="px-2 py-1" style="background-color: white;">
                <p class="mb-1 font-weight-bold">USKEP</p>
                <small class="text-muted" id="ptp_uskep_date_"></small>
            </div>
            <div class="segitiga2"></div>
        </div>
        <div class="shadow-none rounded-0 d-flex flex-row mb-1">
            <div class="px-2 py-1" style="background-color: white;">
                <p class="mb-1 font-weight-bold">Pengumuman</p>
                <small class="text-muted" id="ptp_announcement_date_"></small>
            </div>
            <div class="segitiga2"></div>
        </div>
        <div class="shadow-none rounded-0 d-flex flex-row mb-1">
            <div class="px-2 py-1" style="background-color: white;">
                <p class="mb-1 font-weight-bold">Sanggahan</p>
                <small class="text-muted" id="ptp_disclaimer_date_"></small>
            </div>
            <div class="segitiga2"></div>
        </div>
        <div class="shadow-none rounded-0 d-flex flex-row mb-1">
            <div class="px-2 py-1" style="background-color: white;">
                <p class="mb-1 font-weight-bold">Penunjukan</p>
                <small class="text-muted" id="ptp_appointment_date_"></small>
            </div>
            <div class="segitiga2"></div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

	<form id="formtender" method="post" action="<?php echo site_url($controller_name."/submit_ubah_tender_pengadaan");?>"  class="form-horizontal ajaxform">

		<input type="hidden" name="id" value="<?php echo $id ?>">

		<?php 

		foreach ($content as $key => $value) {
			include($value['awc_type']."/".$value['awc_file'].".php");
		}

		?>

		<?php 
		$i = 0;
		include(VIEWPATH."/comment_workflow_attachment_v.php") ?>

		<div class="card">				
			<div class="card-content">
				<div class="card-body">					
					<?php echo buttonsubmit('procurement/daftar_pekerjaan',lang('back'),lang('save')) ?>
				</div>
			</div>

		</div>

	</form>

	<script type="text/javascript">localStorage.setItem('dialogshow', "");</script>

	<script>
    function changeColorArrowBoard(className) {
        document.getElementById(className).parentNode.classList.add("bg-info")
        document.getElementById(className).parentNode.classList.add("text-white")
        document.getElementById(className).classList.remove("text-muted")
        document.getElementById(className).parentNode.parentNode.lastElementChild.style.borderLeft = "solid 1.2em #2F8BE6"
    }
</script> 
</div>

<?php
  	//haqim
	include VIEWPATH.'procurement/proses_pengadaan/chat_rfq_v.php';
	//end
?>