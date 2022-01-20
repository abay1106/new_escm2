<?php $jadwal_tahap_2 = ($prep['ptp_submission_method'] == 2 && $activity_id >= 1112); ?>
<?= $jadwal_tahap_2 ?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header border-bottom pb-2">
				<h4 class="card-title">Jadwal Pengadaan</h4>
			</div>
			<div class="card-content">
				<div class="card-body col-md-12">
					<?php $is_tgl_pembukaan = (strtotime($prep['ptp_reg_opening_date']) > 0) ? date("Y-m-d H:i", strtotime($prep['ptp_reg_opening_date'])) : ""; ?>

					<div class="row form-group ">
						<label class="col-sm-2 text-right tgl_pembukaan">Tanggal Pembukaan Pendaftaran *</label>
						<div class="col-sm-4">
							<div class="input-group date">
								<?php if (!$jadwal_tahap_2) { ?>
								<?php } ?>
								<input <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> type="datetime-local" name="tgl_pembukaan_pendaftaran_inp" class="form-control tgl_pembukaan_pendaftaran_inp" required id="tgl_pembukaan_pendaftaran_inp" value="">
							</div>
							<div style="color: red; display: none;" id="alert_buka">Tanggal pembukaan pendaftaran harus diisi</div>
						</div>
					</div>

					<div class="row form-group">
						<label class="col-sm-2 text-right">Periode Tender *</label>
						<div class="col-sm-4">
							<div class="input-group date">
								<select class="form-control periode_tender" name="periode_tender" id="periode_tender">
									<option value="0">Pilih</option>
									<?php foreach ($periodes as $key => $value) { ?>
										<option <?php echo $selected ?> value="<?php echo $key ?>"><?php echo $value ?></option>
									<?php } ?>
								</select>
							</div>
							<div style="color: red; display: none;" id="alert_buka">Periode Tender harus diisi</div>
						</div>
					</div>
					<div class="row form-group ">
						<label class="col-sm-2 text-right">Tanggal Penutupan Pendaftaran *</label>
						<div class="col-sm-4">
							<div class="input-group date">
								<input <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> type="datetime-local" name="tgl_penutupan_pendaftaran_inp" id="tgl_penutupan_pendaftaran_inp" required class="form-control  tgl_penutupan_pendaftaran_inp" value="<?= $prep['ptp_reg_closing_date']; ?>">
							</div>
							<div style="color: red; display: none;" id="alert_tutup">Tanggal penuntupan pendaftaran harus diisi</div>
						</div>
						<label class="col-sm-2 text-right toogle_hide d-none">Negosiasi *</label>
						<div class="col-sm-4 toogle_hide d-none">
							<div class="input-group date">
								<input <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> type="datetime-local" name="negosiasi" id="negosiasi" required class="form-control negosiasi" value="<?= $prep['ptp_quot_closing_date']; ?>">
							</div>
							<div style="color: red; display: none;" id="alert_akhir">Tanggal Negosiasi harus diisi</div>
						</div>
					</div>

					<div class="row form-group toogle_hide d-none">
						<label class="col-sm-2 text-right">Tanggal Aanwijzing *</label>
						<div class="col-sm-4">
							<div class="input-group date">
								<?php if (!$jadwal_tahap_2) { ?>
								<?php } ?>
								<input <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> type="datetime-local" name="tgl_aanwijzing_inp" id="tgl_aanwijzing_inp" class="form-control tgl_aanwijzing_inp" required value="<?= $prep['ptp_prebid_date']; ?>">
							</div>
							<div style="color: red; display: none;" id="alert_anwz">Tanggal aanwijzing harus diisi</div>
						</div>
						<label class="col-sm-2 text-right">USKEP *</label>
						<div class="col-sm-4">
							<div class="input-group date">
								<input <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> type="datetime-local" name="uskep" id="uskep" required class="form-control uskep" value="<?= $prep['ptp_quot_closing_date']; ?>">
							</div>
							<div style="color: red; display: none;" id="alert_akhir">Tanggal uskep diisi</div>
						</div>

					</div>

					<div class="row form-group toogle_hide d-none">
						<label class="col-sm-2 text-right">Tanggal Mulai Kirim Penawaran *</label>
						<div class="col-sm-4">
							<div class="input-group date">
								<?php if (!$jadwal_tahap_2) { ?>
								<?php } ?>
								<input <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> type="datetime-local" name="tgl_mulai_penawaran_inp" id="tgl_mulai_penawaran_inp" class="form-control  tgl_mulai_penawaran_inp" required value="">
							</div>
							<div style="color: red; display: none;" id="alert_mulai">Tanggal mulai kirim pendaftaran harus diisi</div>
						</div>

						<label class="col-sm-2 text-right">Pengumuman *</label>
						<div class="col-sm-4">
							<div class="input-group date">
								<input <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> type="datetime-local" name="pengumuman" id="pengumuman" required class="form-control pengumuman" value="<?= $prep['ptp_quot_closing_date']; ?>">
							</div>
							<div style="color: red; display: none;" id="alert_akhir">Tanggal Pengumuman harus diisi</div>
						</div>
					</div>

					<div class="row form-group toogle_hide d-none">
						<label class="col-sm-2 text-right">Tanggal Akhir Kirim Penawaran *</label>
						<div class="col-sm-4">
							<div class="input-group date">
								<input <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> type="datetime-local" name="tgl_akhir_penawaran_inp" id="tgl_akhir_penawaran_inp" required class="form-control tgl_akhir_penawaran_inp" value="<?= $prep['ptp_quot_closing_date']; ?>">
							</div>
							<div style="color: red; display: none;" id="alert_akhir">Tanggal Akhir Kirim Penawaran</div>
						</div>

						<label class="col-sm-2 text-right">Sanggahan *</label>
						<div class="col-sm-4">
							<div class="input-group date">
								<input <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> type="datetime-local" name="sanggahan" id="sanggahan" required class="form-control sanggahan" value="<?= $prep['ptp_quot_closing_date']; ?>">
							</div>
							<div style="color: red; display: none;" id="alert_akhir">Tanggal sanggahan harus diisi</div>
						</div>
					</div>
					<div class="row form-group toogle_hide d-none">


					</div>

					<div class="row form-group toogle_hide d-none">
						<label class="col-sm-2 text-right">Tanggal Pembukaan Dokumen Penawaran *</label>
						<div class="col-sm-4">
							<div class="input-group date">
								<?php if (!$jadwal_tahap_2) { ?>
								<?php } ?>
								<input <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> type="datetime-local" name="tgl_pembukaan_dok_penawaran_inp" required class="form-control tgl_pembukaan_dok_penawaran_inp" id="tgl_pembukaan_dok_penawaran_inp" value="<?= $prep['ptp_doc_open_date']; ?>">
							</div>
							<div style="color: red; display: none;" id="alert_doc">Tanggal pembukaan dokumen penawaran harus diisi</div>
						</div>
						<label class="col-sm-2 text-right"> Penunjukan *</label>
						<div class="col-sm-4">
							<div class="input-group date">
								<input <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> type="datetime-local" name="penunjukan" id="penunjukan" required class="form-control penunjukan" value="<?= $prep['ptp_quot_closing_date']; ?>">

							</div>
							<div style="color: red; display: none;" id="alert_akhir">Tanggal Penunjukan harus diisi</div>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-sm-2 text-right">Lokasi Aanwijzing</label>
						<div class="col-sm-4">
							<textarea <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> class="form-control" id="lokasi_aanwijzing_inp" name="lokasi_aanwijzing_inp"><?= $prep['ptp_prebid_location']; ?></textarea>
						</div>
						<?php $curval = (!empty($prep['ptp_aanwijzing_online'])) ? "checked" : ""; ?>
						<label class="col-sm-2 text-right">Aanwijzing Online</label>
						<div class="col-sm-4 checkbox">
							<input type="checkbox" name="aanwijzing_online_inp" <?php echo $curval ?> value="1">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if ($jadwal_tahap_2) { ?>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header border-bottom pb-2">
					<h4 class="card-title">Jadwal Pengadaan Tahap 2</h4>
				</div>
				<div class="card-content">
					<div class="card-body col-md-12">
						<div class="row form-group">
							<?php $curval = $prep['ptp_tgl_aanwijzing2']; ?>
							<label class="col-sm-2 text-right">Tanggal Aanwijzing Tahap 2 *</label>
							<div class="col-sm-4">
								<div class="input-group date">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" name="tgl_aanwijzing_2_inp" required class="form-control datetimepicker" value="<?php echo $curval ?>">
								</div>
							</div>
							<?php $curval = $prep['ptp_bid_opening2']; ?>
							<label class="col-sm-2 text-right">Tanggal Mulai Kirim Penawaran Tahap 2 *</label>
							<div class="col-sm-4">
								<div class="input-group date">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" name="tgl_mulai_penawaran_2_inp" required class="form-control datetimepicker" value="<?php echo $curval ?>">
								</div>
							</div>
						</div>
						<div class="row form-group">
							<?php $curval = $prep['ptp_lokasi_aanwijzing2']; ?>
							<label class="col-sm-2 text-right">Lokasi Aanwijzing Tahap 2</label>
							<div class="col-sm-4">
								<textarea required class="form-control" id="lokasi_aanwijzing_2_inp" name="lokasi_aanwijzing_2_inp"><?php echo $curval ?></textarea>
							</div>
							<?php $curval = $prep['ptp_bid_closing2']; ?>
							<label class="col-sm-2 text-right">Tanggal Akhir Kirim Penawaran Tahap 2 *</label>
							<div class="col-sm-4">
								<div class="input-group date">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" name="tgl_akhir_penawaran_2_inp" required class="form-control datetimepicker" value="<?php echo $curval ?>">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
<?php } ?>
<script type="text/javascript">
	<?php
	$data_js = json_encode($prep);
	echo "let data = " . $data_js . ";\n";
	?>

	console.log(data);

	function dateFromDb(date) {
		return moment(new Date(date)).format('YYYY-MM-DDThh:mm')
	}

	// init value before
	const tglOpenReg = dateFromDb(data["ptp_reg_opening_date"] ? data["ptp_reg_opening_date"] : new Date())
	$("#tgl_pembukaan_pendaftaran_inp").val(tglOpenReg);
	$("#periode_tender").val(data["tender_priod"] ? data["tender_priod"] : 0)
	$("#tgl_penutupan_pendaftaran_inp").val(dateFromDb(data["ptp_reg_closing_date"]));
	$("#tgl_mulai_penawaran_inp").val(dateFromDb(data["ptp_quot_opening_date"]));
	$("#tgl_akhir_penawaran_inp").val(dateFromDb(data["ptp_quot_closing_date"]));
	$("#tgl_aanwijzing_inp").val(dateFromDb(data["ptp_prebid_date"]));
	$("#tgl_pembukaan_dok_penawaran_inp").val(dateFromDb(data["ptp_doc_open_date"]));
	$("#negosiasi").val(dateFromDb(data["ptp_negosiation_date"]));
	$("#uskep").val(dateFromDb(data["ptp_uskep_date"]));
	$("#pengumuman").val(dateFromDb(data["ptp_announcement_date"]));
	$("#sanggahan").val(dateFromDb(data["ptp_disclaimer_date"]));
	$("#penunjukan").val(dateFromDb(data["ptp_appointment_date"]));


	$(document).ready(function() {
		function prevDate($name) {
			return $("[name=" + $name + "]").val()
		}

	});

	var is_tgl_pembukaan = "<?php echo $is_tgl_pembukaan; ?>";
	if (is_tgl_pembukaan !== undefined || is_tgl_pembukaan != "") {
		$(".toogle_hide").removeClass("d-none");
	}


	$("#tgl_pembukaan_pendaftaran_inp").change(function() {
		changeJadwal($('.periode_tender').val(), $('#tgl_pembukaan_pendaftaran_inp').val())
	})

	const rumusFormTglPembukaan = {
		7: {
			tgl_penutupan_pendaftaran_inp: 0,
			tgl_aanwijzing_inp: 1,
			tgl_mulai_penawaran_inp: 2,
			tgl_akhir_penawaran_inp: 2,
			tgl_pembukaan_dok_penawaran_inp: 2,
			negosiasi: 3,
			uskep: 4,
			pengumuman: 4,
			sanggahan: 6,
			penunjukan: 7,
		},
		14: {
			tgl_penutupan_pendaftaran_inp: 1,
			tgl_aanwijzing_inp: 2,
			tgl_mulai_penawaran_inp: 3,
			tgl_akhir_penawaran_inp: 5,
			tgl_pembukaan_dok_penawaran_inp: 6,
			negosiasi: 7,
			uskep: 9,
			pengumuman: 10,
			sanggahan: 12,
			penunjukan: 13,
		},
		30: {
			tgl_penutupan_pendaftaran_inp: 5,
			tgl_aanwijzing_inp: 6,
			tgl_mulai_penawaran_inp: 7,
			tgl_akhir_penawaran_inp: 14,
			tgl_pembukaan_dok_penawaran_inp: 16,
			negosiasi: 18,
			uskep: 23,
			pengumuman: 24,
			sanggahan: 26,
			penunjukan: 27,
		}
	}

	function handleChangeAllJadwal() {
		const currentValue = new Date($(this).val())
		const name = $(this).attr('id')
		const periode = $('.periode_tender').val()
		const tanggal_pembukaan = currentValue.addDays(-rumusFormTglPembukaan[periode][name])
		$('#tgl_pembukaan_pendaftaran_inp').val(moment(tanggal_pembukaan).format('YYYY-MM-DDThh:mm'))
		changeJadwal(periode, $('#tgl_pembukaan_pendaftaran_inp').val())
	}

	$("#tgl_penutupan_pendaftaran_inp").change(handleChangeAllJadwal)
	$('#tgl_aanwijzing_inp').change(handleChangeAllJadwal)
	$('#tgl_mulai_penawaran_inp').change(handleChangeAllJadwal)
	$('#tgl_akhir_penawaran_inp').change(handleChangeAllJadwal)
	$('#tgl_pembukaan_dok_penawaran_inp').change(handleChangeAllJadwal)
	$('#negosiasi').change(handleChangeAllJadwal)
	$('#uskep').change(handleChangeAllJadwal)
	$('#pengumuman').change(handleChangeAllJadwal)
	$('#sanggahan').change(handleChangeAllJadwal)
	$('#penunjukan').change(handleChangeAllJadwal)

	$('.periode_tender').change(function() {
		changeJadwal($(this).val(), $('#tgl_pembukaan_pendaftaran_inp').val())
	});


	function changeJadwal(period_tender, tanggal_pembukaan) {
		var today = new Date(tanggal_pembukaan)
		var penutup = 0;
		var mulai = 0;
		var akhir = 0;
		var aanwijzing = 0;
		var dok = 0;
		var negosiasi = 0;
		var uskep = 0;
		var pengumuman = 0;
		var sanggahan = 0;
		var penunjukan = 0;

		var ms = 24 * 60 * 60 * 1000 //in milisecond
		var year_month = today.getFullYear() + '-' + today.getMonth();

		//alert($(this).val());
		// var period_tender = $(this).val();
		if (period_tender == 0) {
			$("#tgl_penutupan_pendaftaran_inp").val("");
			$("#tgl_mulai_penawaran_inp").val("");
			$("#tgl_akhir_penawaran_inp").val("");
			$("#tgl_aanwijzing_inp").val("");
			$("#tgl_pembukaan_dok_penawaran_inp").val("");
			$("#negosiasi").val("");
			$("#uskep").val("");
			$("#pengumuman").val("");
			$("#sanggahan").val("");
			$("#penunjukan").val("");
		} else if (period_tender == 7) {
			penutup = 0
			aanwijzing = 1 + penutup;
			mulai = 1 + aanwijzing;
			akhir = 0 + mulai;
			dok = 0 + akhir;
			negosiasi = 1 + dok;
			uskep = 1 + negosiasi;
			pengumuman = 0 + uskep;
			sanggahan = 2 + pengumuman;
			penunjukan = 1 + sanggahan;
		} else if (period_tender == 14) {
			penutup = 1
			aanwijzing = 1 + penutup;
			mulai = 1 + aanwijzing;
			akhir = 2 + mulai;
			dok = 1 + akhir;
			negosiasi = 1 + dok;
			uskep = 2 + negosiasi;
			pengumuman = 1 + uskep;
			sanggahan = 2 + pengumuman;
			penunjukan = 1 + sanggahan;
		} else {
			penutup = 5
			aanwijzing = 1 + penutup;
			mulai = 1 + aanwijzing;
			akhir = 7 + mulai;
			dok = 2 + akhir;
			negosiasi = 2 + dok;
			uskep = 5 + negosiasi;
			pengumuman = 1 + uskep;
			sanggahan = 2 + pengumuman;
			penunjukan = 1 + sanggahan;
		}

		date_penutup = today.addDays(penutup);
		date_mulai = today.addDays(mulai);
		date_akhir = today.addDays(akhir);
		date_aanwijzing = today.addDays(aanwijzing);
		date_dok = today.addDays(dok);
		date_negosiasi = today.addDays(negosiasi)
		date_uskep = today.addDays(uskep)
		date_pegumuman = today.addDays(pengumuman)
		date_sanggahan = today.addDays(sanggahan)
		date_penunjukan = today.addDays(penunjukan)

		var date_penutup = moment(date_penutup).format('YYYY-MM-DDThh:mm');
		var date_mulai = moment(date_mulai).format('YYYY-MM-DDThh:mm');
		var date_akhir = moment(date_akhir).format('YYYY-MM-DDThh:mm');
		var date_aanwijzing = moment(date_aanwijzing).format('YYYY-MM-DDThh:mm');
		var date_dok = moment(date_dok).format('YYYY-MM-DDThh:mm');
		var date_negosiasi = moment(date_negosiasi).format('YYYY-MM-DDThh:mm');
		var date_uskep = moment(date_uskep).format('YYYY-MM-DDThh:mm');
		var date_pegumuman = moment(date_pegumuman).format('YYYY-MM-DDThh:mm');
		var date_sanggahan = moment(date_sanggahan).format('YYYY-MM-DDThh:mm');
		var date_penunjukan = moment(date_penunjukan).format('YYYY-MM-DDThh:mm');

		$(".toogle_hide").removeClass("d-none");

		$("#tgl_penutupan_pendaftaran_inp").val(date_penutup);
		$("#tgl_aanwijzing_inp").val(date_aanwijzing);
		$("#tgl_mulai_penawaran_inp").val(date_mulai);
		$("#tgl_akhir_penawaran_inp").val(date_akhir);
		$("#tgl_pembukaan_dok_penawaran_inp").val(date_dok);
		$("#negosiasi").val(date_negosiasi);
		$("#uskep").val(date_uskep);
		$("#pengumuman").val(date_pegumuman);
		$("#sanggahan").val(date_sanggahan);
		$("#penunjukan").val(date_penunjukan);
	}

	Date.prototype.addDays = function(days) {
		var date = new Date(this.valueOf());
		date.setDate(date.getDate() + days);
		return date;
	}
</script>