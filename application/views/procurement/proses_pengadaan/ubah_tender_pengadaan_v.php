<style>
    .segitiga2 {
        height: 0px;
        width: 0px;
        border-left: 1.2em solid rgb(42 171 226) !important;
        border-top: solid 2.3em transparent;
        border-bottom: solid 2.3em transparent;
    }
    .bg-info {
      background-color: #2AABE2 !important;
    }
    .step {
      font-size: 11px;
      margin:auto;
      box-shadow: 0 0 11px rgba(33,33,33,.2);
      padding-top: 15px;
      padding-bottom: 10px;
      padding-left: 20px !important;
      border-radius: 10px;
    }
    .card {
      border-radius: 1.35rem;
    }
</style>
<div class="container-fluid">
    <div class="row px-0 my-2 step">
        <div class="shadow-none rounded-0 d-flex flex-row mb-1">
            <div class="px-2 py-1" style="background-color: white;border-radius: 10px 0px 0px 10px;">
                <p class="mb-1 font-weight-bold">Mulai Pendaftaran</p>
                <small class="text-muted" id="mulai_pendaftaran"></small>
            </div>
            <div class="segitiga2"></div>
        </div>
        <div class="shadow-none rounded-0 d-flex flex-row mb-1">
            <div class="px-2 py-1" style="background-color: white;border-radius: 10px 0px 0px 10px;">
                <p class="mb-1 font-weight-bold">Aanwijing</p>
                <small class="text-muted" id="ptp_prebid_date_"></small>
            </div>
            <div class="segitiga2"></div>
        </div>
        <div class="shadow-none rounded-0 d-flex flex-row mb-1">
            <div class="px-2 py-1" style="background-color: white;border-radius: 10px 0px 0px 10px;">
                <p class="mb-1 font-weight-bold">Penawaran</p>
                <small class="text-muted" id="ptp_quot_opening_date_"></small>
            </div>
            <div class="segitiga2"></div>
        </div>
        <div class="shadow-none rounded-0 d-flex flex-row mb-1">
            <div class="px-2 py-1" style="background-color: white;border-radius: 10px 0px 0px 10px;">
                <p class="mb-1 font-weight-bold">Evaluasi</p>
                <small class="text-muted" id="ptp_doc_open_date_"></small>
            </div>
            <div class="segitiga2"></div>
        </div>
        <div class="shadow-none rounded-0 d-flex flex-row mb-1">
            <div class="px-2 py-1" style="background-color: white;border-radius: 10px 0px 0px 10px;">
                <p class="mb-1 font-weight-bold">Negosiasi</p>
                <small class="text-muted" id="ptp_negosiation_date_"></small>
            </div>
            <div class="segitiga2"></div>
        </div>
        <div class="shadow-none rounded-0 d-flex flex-row mb-1">
            <div class="px-2 py-1" style="background-color: white;border-radius: 10px 0px 0px 10px;">
                <p class="mb-1 font-weight-bold">USKEP</p>
                <small class="text-muted" id="ptp_uskep_date_"></small>
            </div>
            <div class="segitiga2"></div>
        </div>
        <div class="shadow-none rounded-0 d-flex flex-row mb-1">
            <div class="px-2 py-1" style="background-color: white;border-radius: 10px 0px 0px 10px;">
                <p class="mb-1 font-weight-bold">Pengumuman</p>
                <small class="text-muted" id="ptp_announcement_date_"></small>
            </div>
            <div class="segitiga2"></div>
        </div>
        <div class="shadow-none rounded-0 d-flex flex-row mb-1">
            <div class="px-2 py-1" style="background-color: white;border-radius: 10px 0px 0px 10px;">
                <p class="mb-1 font-weight-bold">Sanggahan</p>
                <small class="text-muted" id="ptp_disclaimer_date_"></small>
            </div>
            <div class="segitiga2"></div>
        </div>
        <div class="shadow-none rounded-0 d-flex flex-row mb-1">
            <div class="px-2 py-1" style="background-color: white;border-radius: 10px 0px 0px 10px;">
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
		<input type="hidden" name="hps" value="<?php echo $permintaan_hide['nilai'] ?>">
		<input type="hidden" name="plan" value="<?php echo $perencanaan['ppm_id'] ?>">
		<input type="hidden" name="remain" value="<?php echo $perencanaan['ppm_sisa_anggaran'] ?>">

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

    const pembukaan = new Date(data["ptp_reg_opening_date"])
    const aawijing = new Date(data["ptp_prebid_date"])
    const penawaran = new Date(data["ptp_quot_opening_date"])
    const evaluasi = new Date(data["ptp_doc_open_date"])
    const negosiasi = new Date(data["ptp_negosiation_date"])
    const uskep = new Date(data["ptp_uskep_date"])
    const pengumuman = new Date(data["ptp_announcement_date"])
    const sanggahan = new Date(data["ptp_disclaimer_date"])
    const penunjukan = new Date(data["ptp_appointment_date"])

    document.getElementById("mulai_pendaftaran").innerHTML = moment(pembukaan).format('LLL')
    document.getElementById("ptp_prebid_date_").innerHTML = moment(aawijing).format('LLL')
    document.getElementById("ptp_quot_opening_date_").innerHTML = moment(penawaran).format('LLL')
    document.getElementById("ptp_doc_open_date_").innerHTML = moment(evaluasi).format('LLL')
    document.getElementById("ptp_negosiation_date_").innerHTML = moment(negosiasi).format('LLL')
    document.getElementById("ptp_uskep_date_").innerHTML = moment(uskep).format('LLL')
    document.getElementById("ptp_announcement_date_").innerHTML = moment(pengumuman).format('LLL')
    document.getElementById("ptp_disclaimer_date_").innerHTML = moment(sanggahan).format('LLL')
    document.getElementById("ptp_appointment_date_").innerHTML = moment(penunjukan).format('LLL')
    if (new Date() >= pembukaan) {
        changeColorArrowBoard("mulai_pendaftaran")
    }
    if (new Date() >= aawijing) {
        changeColorArrowBoard("ptp_prebid_date_")
    }
    if (new Date() >= penawaran) {
        changeColorArrowBoard("ptp_quot_opening_date_")
    }
    if (new Date() >= evaluasi) {
        changeColorArrowBoard("ptp_doc_open_date_")
    }
    if (new Date() >= negosiasi) {
        changeColorArrowBoard("ptp_negosiation_date_")
    }
    if (new Date() >= uskep) {
        changeColorArrowBoard("ptp_uskep_date_")
    }
    if (new Date() >= pengumuman) {
        changeColorArrowBoard("ptp_announcement_date_")
    }
    if (new Date() >= sanggahan) {
        changeColorArrowBoard("ptp_disclaimer_date_")
    }
    if (new Date() >= penunjukan) {
        changeColorArrowBoard("ptp_appointment_date_")
    }
    </script>
</div>

<?php
  	//haqim
	include VIEWPATH.'procurement/proses_pengadaan/chat_rfq_v.php';
	//end
?>
