
<div class="wrapper wrapper-content animated fadeInRight">
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