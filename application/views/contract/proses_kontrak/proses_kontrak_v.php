<div class="wrapper wrapper-content animated fadeInRight">

	<?php 
		$bg_color_1 = '';
		$bg_color_2 = '';
		$bg_color_3 = '';
		$bg_color_4 = '';
		$bg_color_5 = '';
		$color_1 = '';
		$color_2 = '';
		$color_3 = '';
		$color_4 = '';
		$color_5 = '';
		$icon_1 = 'ft-chevrons-right ';
		$icon_2 = 'ft-chevrons-right ';
		$icon_3 = 'ft-chevrons-right ';
		$icon_4 = 'ft-chevrons-right ';
		$icon_5 = '';
		$status_1 = 'Menunggu proses';
		$status_2 = 'Menunggu proses';
		$status_3 = 'Menunggu proses';
		$status_4 = 'Menunggu proses';
		$status_5 = 'Menunggu proses';
		

		if ($activity_id > 2020 && $activity_id < 2904) {
			$bg_color_1 = 'card-inverse bg-info';
			$color_1 = 'card-text';
			$icon_1 = 'ft-check-circle ';
			$status_1 = $end_date_1["end_date"];
		}
		
		if ($activity_id > 2029 && $activity_id < 2904) {
			$bg_color_2 = 'card-inverse bg-info';
			$color_2 = 'card-text';
			$icon_2 = 'ft-check-circle ';
			$status_2 = $end_date_2["end_date"];
		}

		if ($activity_id > 2900 && $activity_id < 2904) {
			$bg_color_3 = 'card-inverse bg-info';
			$color_3 = 'card-text';
			$icon_3 = 'ft-check-circle ';
			$status_3 = $end_date_3["end_date"];
		}

		if ($activity_id > 2902 && $activity_id < 2904) {
			$bg_color_4 = 'card-inverse bg-info';
			$color_4 = 'card-text';
			$icon_4 = 'ft-check-circle ';
			$status_4 = $end_date_4["end_date"];
		}

		if ($activity_id == 2903) {
			$bg_color_5 = 'card-inverse bg-info';
			$color_5 = 'card-text';
			$icon_5 = 'ft-check-circle ';
			$status_5 = $end_date_5["end_date"];
		}
	?>

	<div class="row">
		<div style="width: 19%;">
			<div class="card <?php echo $bg_color_1;?>">
				<div class="card-content">
					<div class="card-body">
						<div class="media">
							<div class="media-body text-left pl-2">
								<h3 class="mb-1 <?php echo $color_1;?> font-medium-2">Pembuatan Kontrak</h3>
								<div><?php echo $status_1;?></div>
							</div>
							<div class="media-right align-self-center">
								<i class="<?php echo $icon_1 . $color_1;?> font-large-1 float-right"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="width: 19%; margin-left: 15px;">
			<div class="card <?php echo $bg_color_2;?>">
				<div class="card-content">
					<div class="card-body">
						<div class="media">
							<div class="media-body text-left pl-2">
								<h3 class="mb-1 <?php echo $color_2;?> font-medium-2">Approval Kontrak</h3>
								<div><?php echo $status_2;?></div>
							</div>
							<div class="media-right align-self-center">
								<i class="<?php echo $icon_2 . $color_2;?> font-large-1 float-right"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="width: 19%; margin-left: 15px;">
			<div class="card <?php echo $bg_color_3;?>">
				<div class="card-content">
					<div class="card-body">
						<div class="media">
							<div class="media-body text-left pl-2">
								<h3 class="mb-1 <?php echo $color_3;?> font-medium-2">Finalisasi Kontrak</h3>
								<div><?php echo $status_3;?></div>
							</div>
							<div class="media-right align-self-center">
								<i class="<?php echo $icon_3 . $color_3;?> font-large-1 float-right"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="width: 19%; margin-left: 15px;">
			<div class="card <?php echo $bg_color_4;?>">
				<div class="card-content">
					<div class="card-body">
						<div class="media">
							<div class="media-body text-left pl-2">
								<h3 class="mb-1 <?php echo $color_4;?> font-medium-2">Kontrak Aktif</h3>
								<div><?php echo $status_4;?></div>
							</div>
							<div class="media-right align-self-center">
								<i class="<?php echo $icon_4 . $color_4;?> font-large-1 float-right"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="width: 19%; margin-left: 15px;">
			<div class="card <?php echo $bg_color_5;?>">
				<div class="card-content">
					<div class="card-body">
						<div class="media">
							<div class="media-body text-left pl-2">
								<h3 class="mb-1 <?php echo $color_5;?> font-medium-2">Kontrak Selesai</h3>
								<div><?php echo $status_5;?></div>
							</div>
							<div class="media-right align-self-center">
								<i class="<?php echo $icon_5 . $color_5;?> font-large-1 float-right"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

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