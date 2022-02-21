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

	<form class="form-horizontal">

		<input type="hidden" name="id" value="<?php echo $id ?>">

		<?php 

		$loaded = array();

		foreach ($content as $key => $value) {
			$str = "view/".$value['awc_file'].".php";
			if(!in_array($str, $loaded)){
				include($str);
				$loaded[] = $str;
			}
		}

		?>

		<div class="row" id="form-comment">
			<div class="col-12">        
				<div class="card">
					<div class="card-header border-bottom pb-2">
						<h4 class="card-title float-left">Daftar Komentar</h4>
						<a href="#" class="btn btn-info btn-sm float-right" data-toggle="modal" data-target="#komentarForm"><i class="ft ft-plus"></i>Tambah</a>
					</div>

					<div class="card-content">
						<div class="card-body">  
							<div class="row">  

								<div class="col-md-12">        
									<?php if ($com_num > 0) { ?>
										<?php foreach ($komentar as $value) { ?>
											<ul class="list-group">
												<li class="list-group-item">
													<span class="badge badge-info mr-2"><?php echo strtoupper($value['cad_user_name'][0]); ?></span> <?php echo $value['cad_user_name']; ?> 
													<span class="ml-2">| <?php echo date("D, d/m/Y - H:i:s", strtotime($value['cad_created_date'])); ?></span>												

													<?php if ($pos["job_title"] == "PIC USER") { ?>
														<a href="<?php echo site_url('contract/submit_delete_comment/' . $value['id']); ?>" onclick="return confirm('Apakah Anda yakin akan hapus data ini?')" class="text-danger"><i class="ft-x-circle"></i></a>													
													<?php } ?>

													<p class="m-2 ml-4"><?php echo $value['cad_comment']; ?></p>
												</li>
											</ul>
										<?php } ?>
									<?php } else { ?>
										<div class="alert bg-light-secondary text-center text-bold-700" role="alert">Belum ada komentar.</div>
									<?php } ?>
								</div>								

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php 
		$i = 0;
		include(VIEWPATH."/comment_view_v.php") ?>

		<div class="card">				
			<div class="card-content">
				<div class="card-body">			            
					<?php echo buttonback('contract/monitor/monitor_kontrak',lang('back')) ?>
				</div>
			</div>
		</div>

	</form>

	<!-- Modal-add-komentar -->
	<div class="modal fade text-left" id="komentarForm" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title modal-judul">Tambah Komentar</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
					</button>
				</div>

				<form action="<?php echo site_url($controller_name . '/submit_comment_contract#form-comment');?>" method="POST">
					<div class="modal-body">

						<?php $ptm_number = (isset($kontrak['ptm_number'])) ? $kontrak['ptm_number'] : ""; ?>
						<?php $contract_id = (isset($kontrak['contract_id'])) ? $kontrak['contract_id'] : ""; ?>
						<label>Isi Komentar</label>
						<div class="form-group">
							<input type="hidden" name="cad_contract_id" value="<?php echo $contract_id; ?>" >
							<input type="hidden" name="cad_ptm_number" value="<?php echo $ptm_number; ?>" >
							<textarea rows="4" class="form-control" name="cad_comment" placeholder="Isi komentar" required></textarea>							
						</div>

					</div>
					<div class="modal-footer">
						<input type="reset" class="btn bg-light-secondary" data-dismiss="modal" value="Tutup">
						<input type="submit" onclick="return confirm('Apakah Anda yakin simpan komentar ini?')" class="btn btn-info" value="Simpan" >
					</div>
				</form>
			</div>
		</div>
	</div>

</div>