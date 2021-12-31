<div class="wrapper wrapper-content animated fadeInRight">
	<form method="post" action="<?php echo site_url($controller_name."/submit_edit_aktivasi_vendor");?>" class="form-horizontal">

		<input type="hidden" name="id" value="<?php echo $id ?>">
		<input type="hidden" id="activity_id" name="activity_id" value="<?php echo $activity_id ?>">

		<?php 
		
		foreach ($content as $key => $value) {
			include($value['awc_type']."/".$value['awc_file'].".php");
		}

		?>
		<?php 
		$i = 0;
		include(VIEWPATH."/comment_workflow_attachment_v.php") ?>

		<?php echo buttonsubmit('vendor/daftar_pekerjaan',lang('back'),lang('save')) ?>

		</form>
	</div>
<!-- 
<script type="text/javascript">
	
	$(document).ready(function(){

		$(".form-horizontal").submit(function(event) {
		    if($("#comment_attachment_inp_0").val() == "" && $("#survey_date").val() != "" && $("#activity_id").val() == "6091"){
		    	alert("Jika ada tanggal survey harus melampirkan dokumen lampiran")
		      	event.preventDefault();
		    }
		});

	});

</script> -->