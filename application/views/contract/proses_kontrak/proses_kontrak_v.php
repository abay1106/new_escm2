<div class="wrapper wrapper-content animated fadeInRight">

	<form method="post" action="<?php echo site_url($controller_name."/submit_proses_kontrak");?>"  class="form-horizontal ajaxform">

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
					<?php echo buttonsubmit('contract/daftar_pekerjaan',lang('back'),lang('save')) ?>
				</div>
			</div>
		</div>

	</form>

	<script type="text/javascript">localStorage.setItem('dialogshow', "");</script>

</div>