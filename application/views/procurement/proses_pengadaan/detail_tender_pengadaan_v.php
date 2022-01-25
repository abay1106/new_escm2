<div class="wrapper wrapper-content animated fadeInRight">

	<form class="form-horizontal ajaxform">

		<input type="hidden" name="id" value="<?php echo $id ?>">

		<?php 

		$loaded = array();

		foreach ($content as $key => $value) {
			$str = "view/".$value['awc_file'].".php";
			if(!in_array($str, $loaded)){
				include($str);
				$loaded[] = $str;
				//print_r($str);
				
			}
		}
		//exit;
		?>


		<?php 
		$i = 0;
		include(VIEWPATH."/comment_view_attachment_v.php") ?>

		<div class="card">				
			<div class="card-content">
				<div class="card-body">			      
					<?php echo buttonback($redirect_back,lang('back'),lang('save')) ?>
				</div>
			</div>
		</div>

	</form>

</div>

<?php if($is_user){ 
// include(VIEWPATH."/chat_v.php");
} ?>

<?php
  	//haqim
	include VIEWPATH.'procurement/proses_pengadaan/chat_rfq_v.php';
	//end
?>