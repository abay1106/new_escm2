<div class="wrapper wrapper-content animated fadeInRight">
	<form method="post" action="<?php echo site_url($url);?>" class="form-horizontal">

		<input type="text" style="display: none"  name="id" value="<?php echo $id ?>">
		<input type="text" style="display: none" id="activity_id" name="activity_id" value="<?php echo $activity_id ?>">

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

<script type="text/javascript">
	
$(document).ready(function(){

	$(".form-horizontal").submit(function(event) {
		
		// if($("#doc_attachment_inp").val() == "" && lib == true && $("#activity_id").val() == "6090"){
	 //    	alert("Jika merekomendasi survei wajib mengisi lampiran rekomendasi")
	 //    	$('html, body').animate({
		// 	    scrollTop: $(".wrapper").offset().top
		// 	}, 450);
	 //      	event.preventDefault();
	 //    }


	    if($("#activity_id").val() == "6090"){
	    	if($('.survei').is(':checked')) { 
	    		
	    	}else{
	    		alert("Survey harus dipilih")
		    	$('html, body').animate({
				    scrollTop: $(".wrapper").offset().top
				}, 450);
		      	event.preventDefault();
	    	}
	    }

	    if($("#doc_attachment2_inp").val() == "" && $("#activity_id").val() == "6092"){
	    	alert("Lampiran hasil survei harus diisi")
	    	$('html, body').animate({
			    scrollTop: $(".wrapper").offset().top
			}, 450);
	      	event.preventDefault();
	    }
	});

});

</script>