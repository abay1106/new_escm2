<style>
	.btn-action-edit {
		border-radius: 8px 0 0 8px;
		width: 100px;
	}

	.btn-action-delete {
		border-radius: 0 8px 8px 0;
		background-color: rgb(36 36 36 / 22%);
		position: relative;
		left: -4px;
	}

	.btn-tambah {
		border-radius: 8px;
	}

	.save-comment {
		position: absolute;
		right: 20px;
	}

	.table-catatan td {
		padding: 1rem !important;
	}

	.table-catatan th {
		padding: 1rem !important;
	}
</style>

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
			<div class="card <?php echo $bg_color_1; ?>">
				<div class="card-content">
					<div class="card-body">
						<div class="media">
							<div class="media-body text-left pl-2">
								<h3 class="mb-1 <?php echo $color_1; ?> font-medium-2">Pembuatan Kontrak</h3>
								<div><?php echo $status_1; ?></div>
							</div>
							<div class="media-right align-self-center">
								<i class="<?php echo $icon_1 . $color_1; ?> font-large-1 float-right"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="width: 19%; margin-left: 15px;">
			<div class="card <?php echo $bg_color_2; ?>">
				<div class="card-content">
					<div class="card-body">
						<div class="media">
							<div class="media-body text-left pl-2">
								<h3 class="mb-1 <?php echo $color_2; ?> font-medium-2">Approval Kontrak</h3>
								<div><?php echo $status_2; ?></div>
							</div>
							<div class="media-right align-self-center">
								<i class="<?php echo $icon_2 . $color_2; ?> font-large-1 float-right"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="width: 19%; margin-left: 15px;">
			<div class="card <?php echo $bg_color_3; ?>">
				<div class="card-content">
					<div class="card-body">
						<div class="media">
							<div class="media-body text-left pl-2">
								<h3 class="mb-1 <?php echo $color_3; ?> font-medium-2">Finalisasi Kontrak</h3>
								<div><?php echo $status_3; ?></div>
							</div>
							<div class="media-right align-self-center">
								<i class="<?php echo $icon_3 . $color_3; ?> font-large-1 float-right"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="width: 19%; margin-left: 15px;">
			<div class="card <?php echo $bg_color_4; ?>">
				<div class="card-content">
					<div class="card-body">
						<div class="media">
							<div class="media-body text-left pl-2">
								<h3 class="mb-1 <?php echo $color_4; ?> font-medium-2">Kontrak Aktif</h3>
								<div><?php echo $status_4; ?></div>
							</div>
							<div class="media-right align-self-center">
								<i class="<?php echo $icon_4 . $color_4; ?> font-large-1 float-right"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="width: 19%; margin-left: 15px;">
			<div class="card <?php echo $bg_color_5; ?>">
				<div class="card-content">
					<div class="card-body">
						<div class="media">
							<div class="media-body text-left pl-2">
								<h3 class="mb-1 <?php echo $color_5; ?> font-medium-2">Kontrak Selesai</h3>
								<div><?php echo $status_5; ?></div>
							</div>
							<div class="media-right align-self-center">
								<i class="<?php echo $icon_5 . $color_5; ?> font-large-1 float-right"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="form-horizontal">

		<input type="hidden" name="id" value="<?php echo $id ?>">

		<?php

		$loaded = array();

		foreach ($content as $key => $value) {
			$str = "view/" . $value['awc_file'] . ".php";
			if (!in_array($str, $loaded)) {
				include($str);
				$loaded[] = $str;
			}
		}

		?>

		<div class="row" id="form-comment">
			<div class="col-12">
				<div class="card">
					<div class="card-header border-bottom pb-2">
						<h4 class="card-title float-left">Catatan</h4>
						<button onclick="isShowAdd()" class="btn btn-sm btn-info btn-tambah ml-2">
							<i class="ft ft-plus"></i>Tambah
						</button>
						<div class="float-right">
							<i class="fa fa-thumbs-up fa-lg mr-1" style="color: #2aace3"></i> <b><?= $thumbs_up ?></b>
							<i class="fa fa-thumbs-down fa-lg ml-1 mr-1" style="color: #ff7376"></i> <b><?= $thumbs_down ?></b>
							<i class="fa fa-comment fa-lg ml-1 mr-1" style="color: #25353c"></i> <b><?= $com_num ?></b>
							<button class="btn btn-light ml-1">Export <i class=" fa fa-angle-down fa-lg"></i></button>
						</div>
					</div>

					<div class="card-content">
						<div class="card-body">
							<div id="showEdit" style="display: none;">
								<form action="<?php echo site_url($controller_name . '/edit_comment_contract#form-comment'); ?>" method="POST" id="comment">
									<div class="row">
										<?php $ptm_number = (isset($kontrak['ptm_number'])) ? $kontrak['ptm_number'] : ""; ?>
										<?php $contract_id = (isset($kontrak['contract_id'])) ? $kontrak['contract_id'] : ""; ?>
										<div class="col-md-2">
											<label>Objek Penilaian</label>
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control" id="cad_obj_nilai_edit" name="cad_obj_nilai_edit" placeholder="Objek Penilaian" required>
										</div>

										<div class="col-md-2">
											<label for="lampiran">No. Telpon</label>
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control" id="cad_no_telp_edit" name="cad_no_telp_edit" placeholder="Nomor Telpon" required>
										</div>
									</div>
									<br>

									<div class="row form-group">
										<?php $curval = (isset($v['ppd_file_name'])) ? $v['ppd_file_name'] :  set_value("doc_attachment_inp[]"); ?>
										<label class="col-sm-2 control-label"><?php echo lang('attachment') ?></label>
										<div class="col-md-4">
											<div class="input-group align-items-center">
												<span class="input-group-btn">
													<button type="button" data-id="doc_attachment_inp_" data-folder="<?php echo $dir . '/comment' ?>" data-preview="preview_file_" class="btn btn-sm btn-info upload">
														<i class="fa fa-cloud-upload"></i> Upload
													</button>
													<button type="button" data-url="<?php echo site_url('log/download_attachment/contract/comment/' . $curval) ?>" class="btn btn-sm btn-info preview_upload" id="preview_file_">
														<i class="fa fa-share"></i> Preview
													</button>
												</span>
												<input readonly type="text" class="form-control" id="doc_attachment_inp_" name="cad_lampiran_edit" value="<?php echo $curval ?>">
												<span class="input-group-btn">
													<button type="button" data-id="doc_attachment_inp_" data-folder="<?php echo $dir ?>" data-preview="preview_file_" class="btn btn-sm btn-danger removefile">
														<i class="fa fa-trash"></i>
													</button>
												</span>
											</div>
											<div class="col-sm-0" style="font-size: 11px">
												<i>Max file 5 MB
													<br>
													Tipe file : doc, docx, xls, xlsx, ppt, pptx, pdf, jpg, jpeg, PNG, Zip, rar, tgz, 7zip, tar
												</i>
											</div>
										</div>
										<label class="col-md-2">Komentar</label>
										<div class="col-md-4">
											<input type="hidden" name="cad_contract_id_edit" value="<?php echo $contract_id; ?>">
											<input type="hidden" name="cad_ptm_number_edit" value="<?php echo $ptm_number; ?>">
											<input type="hidden" id="cad_id" name="cad_id" value="">
											<textarea rows="4" class="form-control" id="cad_comment_edit" name="cad_comment_edit" placeholder="Isi komentar" required></textarea>
										</div>
									</div>
									<div class="row form-group mr-2 justify-content-end">
										<input type="hiden" value="" style="display: none;" id="cad_respon_edit" name="cad_respon_edit" required>
										<i onclick="responEdit(1)" id="thumbsup_edit" class="fa fa-thumbs-up fa-3x mr-1" style="color: #2aace3"></i>
										<i onclick="responEdit(0)" id="thumbsdown_edit" class="fa fa-thumbs-down fa-3x ml-1" style="color: #ff7376"></i>
									</div>
									<span class="wrapper-action save-comment">
										<input type="submit" class="btn btn-sm btn-info btn-action-edit" onclick="return confirm('Apakah Anda yakin edit komentar ini?')" value="Edit"></input>
										<button type="reset" onclick=" return resetFormEdit('comment')" class="btn btn-sm btn-action-delete">
											<i class="fa fa-trash fa-lg"></i>
										</button>
									</span>
								</form>
							</div>

							<div id="showAdd" style="display: none;">
								<form action="<?php echo site_url($controller_name . '/submit_comment_contract#form-comment'); ?>" method="POST">
									<div class="row">
										<?php $ptm_number = (isset($kontrak['ptm_number'])) ? $kontrak['ptm_number'] : ""; ?>
										<?php $contract_id = (isset($kontrak['contract_id'])) ? $kontrak['contract_id'] : ""; ?>
										<div class="col-md-2">
											<label>Objek Penilaian</label>
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control" name="cad_obj_nilai" placeholder="Objek Penilaian" required>
										</div>

										<div class="col-md-2">
											<label for="lampiran">No. Telpon</label>
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control" id="cad_no_telp" name="cad_no_telp" placeholder="Nomor Telpon" required>
										</div>
									</div>
									<br>

									<div class="row form-group">
										<?php $curval = (isset($v['ppd_file_name'])) ? $v['ppd_file_name'] :  set_value("doc_attachment_inp[]"); ?>
										<label class="col-sm-2 control-label"><?php echo lang('attachment') ?></label>
										<div class="col-md-4">
											<div class="input-group align-items-center">
												<span class="input-group-btn">
													<button type="button" data-id="doc_attachment_inp_" data-folder="<?php echo $dir . '/comment' ?>" data-preview="preview_file_" class="btn btn-sm btn-info upload">
														<i class="fa fa-cloud-upload"></i> Upload
													</button>
													<button type="button" data-url="<?php echo site_url('log/download_attachment/contract/comment/' . $curval) ?>" class="btn btn-sm btn-info preview_upload" id="preview_file_">
														<i class="fa fa-share"></i> Preview
													</button>
												</span>
												<input readonly type="text" class="form-control" id="doc_attachment_inp_" name="cad_lampiran" value="<?php echo $curval ?>">
												<span class="input-group-btn">
													<button type="button" data-id="doc_attachment_inp_" data-folder="<?php echo $dir ?>" data-preview="preview_file_" class="btn btn-sm btn-danger removefile">
														<i class="fa fa-trash"></i>
													</button>
												</span>
											</div>
											<div class="col-sm-0" style="font-size: 11px">
												<i>Max file 5 MB
													<br>
													Tipe file : doc, docx, xls, xlsx, ppt, pptx, pdf, jpg, jpeg, PNG, Zip, rar, tgz, 7zip, tar
												</i>
											</div>
										</div>
										<label class="col-md-2">Komentar</label>
										<div class="col-md-4">
											<input type="hidden" name="cad_contract_id" value="<?php echo $contract_id; ?>">
											<input type="hidden" name="cad_ptm_number" value="<?php echo $ptm_number; ?>">
											<input type="hidden" name="cad_ptm_number" value="<?php echo $ptm_number; ?>">
											<textarea rows="4" class="form-control" name="cad_comment" placeholder="Isi komentar" required></textarea>
										</div>
									</div>
									<div class="row form-group mr-2 justify-content-end">
										<input type="hiden" style="display: none;" value="" id="cad_respon" name="cad_respon">
										<i onclick="respon(1)" id="thumbsup" class="fa fa-thumbs-up fa-3x mr-1" style="color: #2aace3"></i>
										<i onclick="respon(0)" id="thumbsdown" class="fa fa-thumbs-down fa-3x ml-1" style="color: #ff7376"></i>
									</div>
									<span class="wrapper-action save-comment">
										<input type="submit" class="btn btn-sm btn-info btn-action-edit" onclick="return confirm('Apakah Anda yakin simpan komentar ini?')" value="Simpan"></input>
										<button type="reset" onclick=" return resetForm('comment')" class="btn btn-sm btn-action-delete">
											<i class="fa fa-trash fa-lg"></i>
										</button>
									</span>
								</form>
							</div>
						</div>
						<br>
						<div class="overflow-auto px-2">
							<table class="table table-striped table-catatan text-center">
								<thead>
									<?php if ($com_num > 0) { ?>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Respon</th>
											<th scope="col">Objek Penilaian</th>
											<th scope="col">Lampiran</th>
											<th scope="col">Nama</th>
											<th scope="col">Jabatan</th>
											<th scope="col">Devisi</th>
											<th scope="col">No.Telp</th>
											<th scope="col">Tanggal & Waktu</th>
											<th scope="col">Komentar</th>
											<th scope="col" style="min-width: 170px;">Aksi</th>
										</tr>
								</thead>
								<tbody>
									<?php
										foreach ($komentar as $key => $val) {
									?>
										<tr>
											<td><?php echo $key + 1 ?></td>
											<td>

												<?php
												$thumbs_up = '<i class="fa fa-thumbs-up fa-2x mr-1" style="color: #2aace3"></i>';
												$thumbs_down = '<i class="fa fa-thumbs-down fa-2x ml-1 mr-1" style="color: #ff7376"></i>';
												echo $val['cad_respon'] == 't' ?
													$thumbs_up :
													$thumbs_down
												?>
											</td>
											<td><?php echo $val['cad_obj_nilai'] ?></td>
											<td>
												<a href="<?php echo site_url('log/download_attachment/contract/comment/' . $val['cad_lampiran']) ?>"><?= $val['cad_lampiran'] ?></a>
											</td>
											<td><?php echo $val['cad_user_name'] ?></td>
											<td><?php echo $val['cad_position'] ?></td>
											<td><?php echo $val['cad_divisi'] ?></td>
											<td><?php echo $val['cad_no_telp'] ?></td>
											<td><?php echo $val['cad_created_date'] ?></td>
											<td>
												<textarea disabled name="cad_comment">
													<?php echo $val['cad_comment'] ?>
												</textarea>
											</td>
											<td>
												<span class="wrapper-action">
													<button onclick="editData(<?php echo $val['id'] ?>)" class="btn btn-sm btn-info btn-action-edit">Edit</button>
													<a href="<?php echo site_url('contract/submit_delete_comment/' . $val['id']); ?>" onclick="return confirm('Apakah Anda yakin akan hapus data ini?')" class="btn btn-sm btn-action-delete">
														<i class="fa fa-trash"></i>
													</a>
												</span>
											</td>
										</tr>

									<?php } ?>
								<?php } else { ?>
									<div class="alert bg-light-secondary text-center text-bold-700" role="alert">Belum ada komentar.</div>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		$i = 0;
		include(VIEWPATH . "/comment_view_v.php") ?>

		<div class="card">
			<div class="card-content">
				<div class="card-body">
					<?php echo buttonback('contract/monitor/monitor_kontrak', lang('back')) ?>
				</div>
			</div>
		</div>

	</div>
</div>

<script>
	function editData(params) {
		showEdit();
		console.log(params);
		<?php
		$url = site_url($controller_name . '/get_edit_comment_contract');
		?>

		let formData = new FormData();
		formData.append('id', params);

		fetch("<?= $url ?>", {
				body: formData,
				method: "post"
			})
			.then(response => response.json())
			.then(res => {
				var data = res.edits[0]
				let cad_id = document.getElementById('cad_id');
				cad_id.value = data.id;
				let cad_obj_nilai = document.getElementById('cad_obj_nilai_edit');
				cad_obj_nilai.value = data.cad_obj_nilai;
				//no tel
				let cad_no_telp = document.querySelector('input[name="cad_no_telp_edit"]');
				cad_no_telp.value = data.cad_no_telp;
				//lampiran
				let cad_lampiran = document.getElementById('doc_attachment_inp_');
				cad_lampiran.value = data.cad_lampiran;
				//komen
				// let cad_comment = document.querySelector('input[name="cad_comment_edit"]');
				// cad_comment.value = data.cad_comment;
				document.getElementById('cad_comment_edit').value = data.cad_comment;

				//respon
				let cad_respon = document.querySelector('input[name="cad_respon_edit"]');
				data.cad_comment == 't' ? cad_respon.value = 1 : cad_respon.value = 0;
			});

	}

	function isShowAdd() {
		var div = document.getElementById("showAdd");
		if (div.style.display !== "none") {
			div.style.display = "none";
		} else {
			div.style.display = "block";
		}
	}

	function showEdit(params) {
		var div = document.getElementById("showEdit");
		div.style.display = "block";
	}

	function resetForm(params) {
		// params.preventDefault();
		document.getElementById(params).reset();
		isShowAdd();
	}

	function resetFormEdit(params) {
		// params.preventDefault();
		document.getElementById(params).reset();
		isShowAdd();
	}

	function respon(params) {
		var responEl = document.querySelector('input[name="cad_respon"]');
		responEl.value = params;
		if (params == 1) {
			document.getElementById('thumbsup').style = 'font-size: 3.5rem; color: #2aace3;'
			document.getElementById('thumbsdown').style = 'font-size: 3rem; color: #ff7376;'
		} else {
			document.getElementById('thumbsup').style = 'font-size: 3rem; color: #2aace3;'
			document.getElementById('thumbsdown').style = 'font-size: 3.5rem; color: #ff7376;'
		}
	}

	function responEdit(params) {
		var responEl = document.querySelector('input[name="cad_respon_edit"]');
		responEl.value = params;
		if (params == 1) {
			document.getElementById('thumbsup_edit').style = 'font-size: 3.5rem; color: #2aace3;'
			document.getElementById('thumbsdown_edit').style = 'font-size: 3rem; color: #ff7376;'
		} else {
			document.getElementById('thumbsup_edit').style = 'font-size: 3rem; color: #2aace3;'
			document.getElementById('thumbsdown_edit').style = 'font-size: 3.5rem; color: #ff7376;'
		}
	}
</script>