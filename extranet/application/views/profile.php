<div class="row">
	<div class="col-7">
		<div class="content-header"><strong><?php echo $this->lang->line('Profil Anda'); ?></strong></div>
	</div>
	<div class="col-5">
		<div class="content-header float-right">
			<a class="text-muted text-xs block h5" id="servertime"></a>
		</div>
	</div>
</div>

<div class="wrapper wrapper-content animated fadeIn">
	<div class="row m-t-lg">
		<div class="col-lg-12">
			<div class="tabs-container">

				<div class="tabs-left">
					<ul class="nav nav-tabs">
						<li class="<?= $must_upload  ? "" : "active" ?>"><a class="nav-link active" data-toggle="tab" href="#tab-1"><?php echo $this->lang->line('Data Utama'); ?></a></li>
						<li class=""><a class="nav-link" data-toggle="tab" href="#tab-2"><?php echo $this->lang->line('Data Legal'); ?></a></li>
						<li class=""><a class="nav-link" data-toggle="tab" href="#tab-3"><?php echo $this->lang->line('Pengurus Perusahaan'); ?></a></li>
						<li class=""><a class="nav-link" data-toggle="tab" href="#tab-4"><?php echo $this->lang->line('Data Keuangan'); ?></a></li>
						<li class=""><a class="nav-link" data-toggle="tab" href="#tab-5"><?php echo $this->lang->line('Barang/Jasa'); ?></a></li>
						<li class=""><a class="nav-link" data-toggle="tab" href="#tab-6"><?php echo $this->lang->line('SDM'); ?></a></li>
						<li class=""><a class="nav-link" data-toggle="tab" href="#tab-7"><?php echo $this->lang->line('Sertifikasi'); ?></a></li>
						<li class=""><a class="nav-link" data-toggle="tab" href="#tab-8"><?php echo $this->lang->line('Fasilitas/Peralatan'); ?></a></li>
						<li class=""><a class="nav-link" data-toggle="tab" href="#tab-9"><?php echo $this->lang->line('Pengalaman Proyek'); ?></a></li>
						<li class=""><a class="nav-link" data-toggle="tab" href="#tab-10"><?php echo $this->lang->line('Data Tambahan'); ?></a></li>
						<li class=""><a class="nav-link" data-toggle="tab" href="#tab-11">Data Dokumen</a></li>
						<li class=" <?= $must_upload  ? "active" : "" ?> "><a class="nav-link" data-toggle="tab" href="#tab-12"><?php echo $this->lang->line('Upload Dokumen PQ'); ?></a></li>
					</ul>

					<div class="tab-content ">
						<div id="tab-1" class="tab-pane <?= $must_upload  ? "" : "active" ?>">
							<div class="panel-body">
								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Nama Perusahaan'); ?>
									</div>
									<div style="padding: 15px;">
										<table class="table">

											<tr>
												<th><?php echo $this->lang->line('Prefiks'); ?></th>
												<td><?php echo $header[0]['prefix']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Prefiks Lainnya'); ?></th>
												<td><?php echo $header[0]['prefixOther']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Nama Perusahaan'); ?></th>
												<td><?php echo $header[0]['vendorName']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Sufiks'); ?></th>
												<td><?php echo $header[0]['suffix']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Sufiks Lainnya'); ?></th>
												<td><?php echo $header[0]['suffixOther']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Tipe Perusahaan'); ?></th>
												<td>
													<ol>
														<?php foreach ($tipe as $row) {
															echo "<li>" . $row['id']['companyType'] . "</li>" ?>

														<?php } ?>
													</ol>
												</td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Email Registrasi'); ?></th>
												<td><?php echo $header[0]['emailAddress']; ?></td>
											</tr>
										</table>
									</div>
								</div>

								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Kontak Perusahaan'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th>No</th>
														<th><?php echo $this->lang->line('Jenis'); ?></th>
														<th><?php echo $this->lang->line('Alamat'); ?></th>
														<th><?php echo $this->lang->line('Kota'); ?></th>
														<th><?php echo $this->lang->line('Negara'); ?></th>
														<th><?php echo $this->lang->line('Telp Kantor-1'); ?></th>
														<th><?php echo $this->lang->line('Telp Kantor-2'); ?></th>
														<th><?php echo $this->lang->line('Fax'); ?></th>
														<th><?php echo $this->lang->line('Website'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($alamat as $row) { ?>
														<tr>
															<td><?php echo $i ?></td>
															<td><?php echo $row["type"] ?></td>
															<td><?php echo $row["address"] ?></td>
															<td><?php echo $row["city"] ?></td>
															<td><?php echo $row["country"] ?></td>
															<td><?php echo $row["telephone1No"] ?></td>
															<td><?php echo $row["telephone2No"] ?></td>
															<td><?php echo $row["fax"] ?></td>
															<td><?php echo $row["website"] ?></td>
														</tr>
													<?php
														$i++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Kontak Person'); ?>
									</div>
									<div style="padding: 15px;">
										<table class="table">

											<tr>
												<th><?php echo $this->lang->line('Nama'); ?></th>
												<td><?php echo $header[0]['contactName']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Jabatan'); ?></th>
												<td><?php echo $header[0]['contactPos']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Nomor Telepon'); ?></th>
												<td><?php echo $header[0]['contactPhoneNo']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Alamat Email'); ?></th>
												<td><?php echo $header[0]['contactEmail']; ?></td>
											</tr>
										</table>
									</div>
								</div>

							</div>

						</div>
						<div id="tab-2" class="tab-pane">
							<div class="panel-body">
								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Akta Pendirian'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('No Akta'); ?></th>
														<th><?php echo $this->lang->line('Jenis Akta'); ?></th>
														<th><?php echo $this->lang->line('Tanggal Pembuatan'); ?></th>
														<th><?php echo $this->lang->line('Notaris'); ?></th>
														<th><?php echo $this->lang->line('Alamat'); ?></th>
														<th><?php echo $this->lang->line('Pengesahan Kehakiman'); ?></th>
														<th><?php echo $this->lang->line('Berita Negara'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($akta as $row) { ?>
														<tr>
															<td><?php echo $row["aktaNo"] ?></td>
															<td><?php echo $row["aktaType"] ?></td>
															<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($row["dateCreation"]['time'])); ?></td>
															<td><?php echo $row["notarisName"] ?></td>
															<td><?php echo $row["notarisAddress"] ?></td>
															<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($row["pengesahanHakim"]['time'])); ?></td>
															<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($row["beritaAcaraNgr"]['time'])); ?></td>
														</tr>
													<?php
														$i++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Domisili Perusahaan'); ?>
									</div>
									<div style="padding: 15px;">
										<table class="table">

											<tr>
												<th><?php echo $this->lang->line('Nomor Domisili'); ?></th>
												<td><?php echo $header[0]['addressDomisiliNo']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Tanggal Domisili'); ?></th>
												<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($header[0]['addressDomisiliDate']['time'])); ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Kadaluarsa'); ?></th>
												<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($header[0]['addressDomisiliExpDate']['time'])) ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Alamat Perusahaan'); ?></th>
												<td><?php echo $header[0]['addressStreet']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Kota'); ?></th>
												<td><?php echo $header[0]['addressCity']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Provinsi'); ?></th>
												<td><?php echo $header[0]['addresProp']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Kode Pos'); ?></th>
												<td><?php echo $header[0]['addressPostcode']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Negara'); ?></th>
												<td><?php echo $header[0]['addressCountry']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Nomor Telepon'); ?></th>
												<td><?php echo $header[0]['addressPhoneNo']; ?></td>
											</tr>
										</table>
									</div>
								</div>

								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Nilai Pokok Wajib Pajak (NPWP)'); ?>
									</div>
									<div style="padding: 15px;">
										<table class="table">

											<tr>
												<th><?php echo $this->lang->line('Nomor'); ?></th>
												<td><?php echo $header[0]['npwpNo']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Alamat (Sesuai NPWP)'); ?></th>
												<td><?php echo $header[0]['npwpAddress']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Kota'); ?></th>
												<td><?php echo $header[0]['npwpCity']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Provinsi'); ?></th>
												<td><?php echo $header[0]['npwpProp']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Kode Pos'); ?></th>
												<td><?php echo $header[0]['npwpPostcode']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('PKP'); ?></th>
												<td><?php echo $header[0]['npwpPkp']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Nomor PKP'); ?></th>
												<td><?php echo $header[0]['npwpPkpNo']; ?></td>
											</tr>
										</table>
									</div>
								</div>

								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Jenis Mitra Kerja'); ?>
									</div>
									<div style="padding: 15px;">
										<table class="table">

											<tr>
												<th><?php echo $this->lang->line('Mitra Kerja'); ?></th>
												<td><?php echo $header[0]['vendorType']; ?></td>
											</tr>
										</table>
									</div>
								</div>

								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Surat Izin Usaha Perusahaan (SIUP)'); ?>
									</div>
									<div style="padding: 15px;">
										<table class="table">

											<tr>
												<th><?php echo $this->lang->line('Dikeluarkan Oleh'); ?></th>
												<td><?php echo $header[0]['siupIssuedBy']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Nomor'); ?></th>
												<td><?php echo $header[0]['siupNo']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Jenis SIUP'); ?></th>
												<td><?php echo $header[0]['siupType']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Berlaku Mulai'); ?></th>
												<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($header[0]['siupFrom']['time'])) ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Berlaku Sampai'); ?></th>
												<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($header[0]['siupTo']['time'])) ?></td>
											</tr>
										</table>
									</div>
								</div>

								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Izin Lain Lain'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('No'); ?></th>
														<th><?php echo $this->lang->line('Jenis Izin'); ?></th>
														<th><?php echo $this->lang->line('Dikeluarkan Oleh'); ?></th>
														<th><?php echo $this->lang->line('Nomor'); ?></th>
														<th><?php echo $this->lang->line('Berlaku Mulai'); ?></th>
														<th><?php echo $this->lang->line('Berlaku Sampai'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($izin_lain as $row) { ?>
														<tr>
															<td><?php echo $i; ?></td>
															<td><?php echo $row["type"] ?></td>
															<td><?php echo $row["issuedBy"] ?></td>
															<td><?php echo $row["no"] ?></td>
															<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($row["startDate"]["time"])) ?></td>
															<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($row["endDate"]["time"])) ?></td>
														</tr>
													<?php
														$i++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Tanda Daftar Perusahaan (TDP)'); ?>
									</div>
									<div style="padding: 15px;">
										<table class="table">

											<tr>
												<th><?php echo $this->lang->line('Dikeluarkan Oleh'); ?></th>
												<td><?php echo $header[0]['tdpIssuedBy']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Nomor'); ?></th>
												<td><?php echo $header[0]['tdpNo']; ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Berlaku Mulai'); ?></th>
												<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($header[0]['tdpFrom']['time'])) ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Berlaku Sampai'); ?></th>
												<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($header[0]['tdpTo']['time'])) ?></td>
											</tr>
										</table>
									</div>
								</div>

								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Surat Keagenan/Distributorship'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('No'); ?></th>
														<th><?php echo $this->lang->line('Dikeluarkan Oleh'); ?></th>
														<th><?php echo $this->lang->line('Nomor'); ?></th>
														<th><?php echo $this->lang->line('Berlaku Mulai'); ?></th>
														<th><?php echo $this->lang->line('Berlaku Sampai'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($agent_importir as $row) {
														if ($row["type"] == "AGENT") { ?>
															<tr>
																<td><?php echo $i; ?></td>
																<td><?php echo $row["issuedBy"] ?></td>
																<td><?php echo $row["no"] ?></td>
																<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($row["createdDate"])) ?></td>
																<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($row["expiredDate"])) ?></td>
															</tr>
													<?php
															$i++;
														}
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>


								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Angka Pengenal Importir'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('No'); ?></th>
														<th><?php echo $this->lang->line('Dikeluarkan Oleh'); ?></th>
														<th><?php echo $this->lang->line('Nomor'); ?></th>
														<th><?php echo $this->lang->line('Berlaku Mulai'); ?></th>
														<th><?php echo $this->lang->line('Berlaku Sampai'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($agent_importir as $row) {
														if ($row["type"] == "IMPORTIR") { ?>
															<tr>
																<td><?php echo $i; ?></td>
																<td><?php echo $row["issuedBy"] ?></td>
																<td><?php echo $row["no"] ?></td>
																<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($row["createdDate"])) ?></td>
																<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($row["expiredDate"])) ?></td>
															</tr>
													<?php
															$i++;
														}
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>

							</div>
						</div>

						<div id="tab-3" class="tab-pane">
							<div class="panel-body">
								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Dewan Komisaris'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('No'); ?></th>
														<th><?php echo $this->lang->line('Nama'); ?></th>
														<th><?php echo $this->lang->line('Jabatan'); ?></th>
														<th><?php echo $this->lang->line('Telepon'); ?></th>
														<th><?php echo $this->lang->line('Email'); ?></th>
														<th><?php echo $this->lang->line('KTP'); ?></th>
														<th><?php echo $this->lang->line('NPWP'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($board as $row) {
														if ($row["type"] == "BOC") { ?>
															<tr>
																<td><?php echo $i ?></td>
																<td><?php echo $row["name"] ?></td>
																<td><?php echo $row["pos"]; ?></td>
																<td><?php echo $row["telephoneNo"] ?></td>
																<td><?php echo $row["emailAddress"] ?></td>
																<td><?php echo $row["ktpNo"] ?></td>
																<td><?php echo $row["npwpNo"] ?></td>
															</tr>
													<?php
															$i++;
														}
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Dewan Direksi'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('No'); ?></th>
														<th><?php echo $this->lang->line('Nama'); ?></th>
														<th><?php echo $this->lang->line('Jabatan'); ?></th>
														<th><?php echo $this->lang->line('Telepon'); ?></th>
														<th><?php echo $this->lang->line('Email'); ?></th>
														<th><?php echo $this->lang->line('KTP'); ?></th>
														<th><?php echo $this->lang->line('NPWP'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($board as $row) {
														if ($row["type"] == "BOD") { ?>
															<tr>
																<td><?php echo $i ?></td>
																<td><?php echo $row["name"] ?></td>
																<td><?php echo $row["pos"]; ?></td>
																<td><?php echo $row["telephoneNo"] ?></td>
																<td><?php echo $row["emailAddress"] ?></td>
																<td><?php echo $row["ktpNo"] ?></td>
																<td><?php echo $row["npwpNo"] ?></td>
															</tr>
													<?php
															$i++;
														}
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="tab-4" class="tab-pane">
							<div class="panel-body">
								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Rekening Bank'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('No'); ?></th>
														<th><?php echo $this->lang->line('No.Rekening'); ?></th>
														<th><?php echo $this->lang->line('Pemegang Rekening'); ?></th>
														<th><?php echo $this->lang->line('Nama Bank'); ?></th>
														<th><?php echo $this->lang->line('Cabang Bank'); ?></th>
														<th><?php echo $this->lang->line('Alamat'); ?></th>
														<th><?php echo $this->lang->line('Valuta'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($bank as $row) { ?>
														<tr>
															<td><?php echo $i ?></td>
															<td><?php echo $row["accountNo"] ?></td>
															<td><?php echo $row["accountName"]; ?></td>
															<td><?php echo $row["bankName"] ?></td>
															<td><?php echo $row["bankBranch"] ?></td>
															<td><?php echo $row["address"] ?></td>
															<td><?php echo $row["currency"] ?></td>
														</tr>
													<?php
														$i++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Modal Sesuai Data Terakhir'); ?>
									</div>
									<div style="padding: 15px;">
										<table class="table">

											<tr>
												<th><?php echo $this->lang->line('Modal Dasar'); ?></th>
												<td><?php echo $this->umum->cetakuang($header[0]['finAktaMdlDsr'], $header[0]['finAktaMdlDsrCurr']); ?></td>
											</tr>
											<tr>
												<th><?php echo $this->lang->line('Modal Setor'); ?></th>
												<td><?php echo $this->umum->cetakuang($header[0]['finAktaMdlStr'], $header[0]['finAktaMdlStrCurr']); ?></td>
											</tr>
										</table>
									</div>
								</div>
								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Informasi Laporan Keuangan'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('No'); ?></th>
														<th><?php echo $this->lang->line('Tahun Laporan'); ?></th>
														<th><?php echo $this->lang->line('Jenis Laporan'); ?></th>
														<th><?php echo $this->lang->line('Total Nilai Aset'); ?></th>
														<th><?php echo $this->lang->line('Hutang Perusahaan'); ?></th>
														<th><?php echo $this->lang->line('Pendapatan Kotor'); ?></th>
														<th><?php echo $this->lang->line('Laba Bersih'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($financial as $row) { ?>
														<tr>
															<td><?php echo $i; ?></td>
															<td><?php echo $row["finRptYear"]; ?></td>
															<td><?php echo $row["finRptType"]; ?></td>
															<td><?php echo $this->umum->cetakuang($row["finRptAssetValue"], $row["finRptCurrency"]) ?></td>
															<td><?php echo $this->umum->cetakuang($row["finRptHutang"], $row["finRptCurrency"]) ?></td>
															<td><?php echo $this->umum->cetakuang($row["finRptRevenue"], $row["finRptCurrency"]) ?></td>
															<td><?php echo $this->umum->cetakuang($row["finRptNetincome"], $row["finRptCurrency"]) ?></td>
														</tr>
													<?php
														$i++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Klasifikasi Perusahaan'); ?>
									</div>
									<div style="padding: 15px;">
										<table class="table">

											<tr>
												<th><?php echo $this->lang->line('Klasifikasi Perusahaan'); ?></th>
												<td><?php if ($header[0]['finClass'] == "3") {
														echo "BESAR";
													} else if ($header[0]['finClass'] == "2") {
														echo "MENENGAH";
													} else if ($header[0]['finClass'] == "1") {
														echo "KECIL";
													} ?></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div id="tab-5" class="tab-pane">
							<div class="panel-body">
								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Barang yang Bisa Dipasok'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('No'); ?></th>
														<th><?php echo $this->lang->line('Jenis Komoditas'); ?></th>
														<th><?php echo $this->lang->line('Nama Barang'); ?></th>
														<th><?php echo $this->lang->line('Merk'); ?></th>
														<th><?php echo $this->lang->line('Sumber'); ?></th>
														<th><?php echo $this->lang->line('Tipe'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($barang as $row) {
														if ($row["catalog_type"] == "M") { ?>
															<tr>
																<td><?php echo $i ?></td>
																<td><?php echo $row["product_description"]; ?></td>
																<td><?php echo $row["product_name"] ?></td>
																<td><?php echo $row["brand"] ?></td>
																<td><?php echo $row["source"] ?></td>
																<td><?php echo $row["type"] ?></td>
															</tr>
													<?php
															$i++;
														}
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Jasa yang Bisa Dipasok'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('No'); ?></th>
														<th><?php echo $this->lang->line('Jenis Komoditas'); ?></th>
														<th><?php echo $this->lang->line('Nama Barang'); ?></th>
														<th><?php echo $this->lang->line('Merk'); ?></th>
														<th><?php echo $this->lang->line('Sumber'); ?></th>
														<th><?php echo $this->lang->line('Tipe'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($barang as $row) {
														if ($row["catalog_type"] == "S") { ?>
															<tr>
																<td><?php echo $i ?></td>
																<td><?php echo $row["product_description"]; ?></td>
																<td><?php echo $row["product_name"] ?></td>
																<td><?php echo $row["brand"] ?></td>
																<td><?php echo $row["source"] ?></td>
																<td><?php echo $row["type"] ?></td>
															</tr>
													<?php
															$i++;
														}
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="tab-6" class="tab-pane">
							<div class="panel-body">
								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Tenaga Ahli Utama'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('No'); ?></th>
														<th><?php echo $this->lang->line('Nama'); ?></th>
														<th><?php echo $this->lang->line('Pendidikan Terakhir'); ?></th>
														<th><?php echo $this->lang->line('Pengalaman'); ?></th>
														<th><?php echo $this->lang->line('Status'); ?></th>
														<th><?php echo $this->lang->line('Kewarganegaraan'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($sdm as $row) {
														if ($row["type"] == "PRIMER") { ?>
															<tr>
																<td><?php echo $i ?></td>
																<td><?php echo $row["name"]; ?></td>
																<td><?php echo $row["lastEducation"] ?></td>
																<td><?php echo $row["yearExp"] ?></td>
																<td><?php echo $row["empStatus"] ?></td>
																<td><?php echo $row["empType"] ?></td>
															</tr>
													<?php
															$i++;
														}
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Tenaga Ahli Pendukung'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('No'); ?></th>
														<th><?php echo $this->lang->line('Nama'); ?></th>
														<th><?php echo $this->lang->line('Pendidikan Terakhir'); ?></th>
														<th><?php echo $this->lang->line('Pengalaman'); ?></th>
														<th><?php echo $this->lang->line('Status'); ?></th>
														<th><?php echo $this->lang->line('Kewarganegaraan'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($sdm as $row) {
														if ($row["type"] == "SUPPORT") { ?>
															<tr>
																<td><?php echo $i ?></td>
																<td><?php echo $row["name"]; ?></td>
																<td><?php echo $row["lastEducation"] ?></td>
																<td><?php echo $row["yearExp"] ?></td>
																<td><?php echo $row["empStatus"] ?></td>
																<td><?php echo $row["empType"] ?></td>
															</tr>
													<?php
															$i++;
														}
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="tab-7" class="tab-pane">
							<div class="panel-body">
								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Keterangan Sertifikasi'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('No'); ?></th>
														<th><?php echo $this->lang->line('Jenis'); ?></th>
														<th><?php echo $this->lang->line('Nama Sertifikat'); ?></th>
														<th><?php echo $this->lang->line('Nomor Sertifikat'); ?></th>
														<th><?php echo $this->lang->line('Dikeluarkan Oleh'); ?></th>
														<th><?php echo $this->lang->line('Berlaku Mulai'); ?></th>
														<th><?php echo $this->lang->line('Berlaku Sampai'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($sertifikasi as $row) { ?>
														<tr>
															<td><?php echo $i ?></td>
															<td><?php echo $row["type"]; ?></td>
															<td><?php echo $row["certName"] ?></td>
															<td><?php echo $row["certNo"] ?></td>
															<td><?php echo $row["issuedBy"] ?></td>
															<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($row["validFrom"]["time"])) ?></td>
															<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($row["validTo"]["time"])) ?></td>
														</tr>
													<?php
														$i++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="tab-8" class="tab-pane">
							<div class="panel-body">
								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Keterangan Fasilitas/Peralatan'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('No'); ?></th>
														<th><?php echo $this->lang->line('Kategori'); ?></th>
														<th><?php echo $this->lang->line('Nama Peralatan'); ?></th>
														<th><?php echo $this->lang->line('Spesifikasi'); ?></th>
														<th><?php echo $this->lang->line('Kuantitas'); ?></th>
														<th><?php echo $this->lang->line('Tahun Pembuatan'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($fasilitas as $row) { ?>
														<tr>
															<td><?php echo $i ?></td>
															<td><?php echo $row["category"]; ?></td>
															<td><?php echo $row["equipName"] ?></td>
															<td><?php echo $row["spec"] ?></td>
															<td><?php echo $row["yearMade"] ?></td>
															<td><?php echo $row["quantity"] ?></td>
														</tr>
													<?php
														$i++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="tab-9" class="tab-pane">
							<div class="panel-body">
								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Pengalaman Pekerjaan'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('No'); ?></th>
														<th><?php echo $this->lang->line('Nama Pelanggan'); ?></th>
														<th><?php echo $this->lang->line('Nama Proyek'); ?></th>
														<th><?php echo $this->lang->line('Keterangan Proyek'); ?></th>
														<th><?php echo $this->lang->line('Nilai'); ?></th>
														<th><?php echo $this->lang->line('Nomor Kontrak'); ?></th>
														<th><?php echo $this->lang->line('Tanggal Dimulai'); ?></th>
														<th><?php echo $this->lang->line('Tanggal Selesai'); ?></th>
														<th>Contact Person</th>
														<th><?php echo $this->lang->line('No Kontak'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($pengalaman as $row) { ?>
														<tr>
															<td><?php echo $i ?></td>
															<td><?php echo $row["clientName"]; ?></td>
															<td><?php echo $row["projectName"] ?></td>
															<td><?php echo $row["description"] ?></td>
															<td><?php echo $this->umum->cetakuang($row["amount"], $row["currency"]) ?></td>
															<td><?php echo $row["contractNo"] ?></td>
															<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($row["startDate"]["time"])) ?></td>
															<td><?php echo $this->umum->show_tanggal($this->umum->unixtotime($row["endDate"]["time"])) ?></td>
															<td><?php echo $row["contactPerson"] ?></td>
															<td><?php echo $row["contactNo"] ?></td>
														</tr>
													<?php
														$i++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="tab-10" class="tab-pane">
							<div class="panel-body">
								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Prinsipal'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('No'); ?></th>
														<th><?php echo $this->lang->line('Nama'); ?></th>
														<th><?php echo $this->lang->line('Alamat'); ?></th>
														<th><?php echo $this->lang->line('Kota'); ?></th>
														<th><?php echo $this->lang->line('Negara'); ?></th>
														<th><?php echo $this->lang->line('Kode Pos'); ?></th>
														<th><?php echo $this->lang->line('Kualifikasi'); ?></th>
														<th><?php echo $this->lang->line('Hubungan'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($tambahan as $row) {
														if ($row["type"] == "PRINCIPAL") { ?>
															<tr>
																<td><?php echo $i ?></td>
																<td><?php echo $row["name"]; ?></td>
																<td><?php echo $row["address"] ?></td>
																<td><?php echo $row["city"] ?></td>
																<td><?php echo $row["country"] ?></td>
																<td><?php echo $row["postCode"] ?></td>
																<td><?php echo $row["qualification"] ?></td>
																<td><?php echo $row["relationship"] ?></td>
															</tr>
													<?php
															$i++;
														}
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Afiliasi'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('No'); ?></th>
														<th><?php echo $this->lang->line('Nama'); ?></th>
														<th><?php echo $this->lang->line('Alamat'); ?></th>
														<th><?php echo $this->lang->line('Kota'); ?></th>
														<th><?php echo $this->lang->line('Negara'); ?></th>
														<th><?php echo $this->lang->line('Kode Pos'); ?></th>
														<th><?php echo $this->lang->line('Kualifikasi'); ?></th>
														<th><?php echo $this->lang->line('Hubungan'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($tambahan as $row) {
														if ($row["type"] == "AFFILIATE") { ?>
															<tr>
																<td><?php echo $i ?></td>
																<td><?php echo $row["name"]; ?></td>
																<td><?php echo $row["address"] ?></td>
																<td><?php echo $row["city"] ?></td>
																<td><?php echo $row["country"] ?></td>
																<td><?php echo $row["postCode"] ?></td>
																<td><?php echo $row["qualification"] ?></td>
																<td><?php echo $row["relationship"] ?></td>
															</tr>
													<?php
															$i++;
														}
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="panel panel-info">
									<div class="panel-heading">
										<?php echo $this->lang->line('Subkontraktor'); ?>
									</div>
									<div style="padding: 15px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th><?php echo $this->lang->line('No'); ?></th>
														<th><?php echo $this->lang->line('Nama'); ?></th>
														<th><?php echo $this->lang->line('Alamat'); ?></th>
														<th><?php echo $this->lang->line('Kota'); ?></th>
														<th><?php echo $this->lang->line('Negara'); ?></th>
														<th><?php echo $this->lang->line('Kode Pos'); ?></th>
														<th><?php echo $this->lang->line('Kualifikasi'); ?></th>
														<th><?php echo $this->lang->line('Hubungan'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($tambahan as $row) {
														if ($row["type"] == "SUBCONTRACTOR") { ?>
															<tr>
																<td><?php echo $i ?></td>
																<td><?php echo $row["name"]; ?></td>
																<td><?php echo $row["address"] ?></td>
																<td><?php echo $row["city"] ?></td>
																<td><?php echo $row["country"] ?></td>
																<td><?php echo $row["postCode"] ?></td>
																<td><?php echo $row["qualification"] ?></td>
																<td><?php echo $row["relationship"] ?></td>
															</tr>
													<?php
															$i++;
														}
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div id="tab-11" class="tab-pane">
							<div class="panel-body">
								<div class="panel panel-info">
									<div class="panel-heading">
										Dokumen
									</div>
									<div style="padding: 15px;">

										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover dataTables-example">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama</th>
														<th>File</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$i = 1;
													foreach ($dokumen as $row) { ?>
														<tr>
															<td><?php echo $i ?></td>
															<td><?php echo $row["vndSuppdocDesc"]; ?></td>
															<td><a href="<?php echo $url_doc . "/" . $row["vndSuppdocFilename"] ?>" target="_blank"><?php echo $row["vndSuppdocFilename"] ?></a></td>
														</tr>
													<?php
														$i++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>

							</div>
						</div>
						<div id="tab-12" class="tab-pane <?= $must_upload ? "active" : "" ?> ">
							<div class="panel-body">
								<div class="panel panel-info">
									<div class="panel-heading">
										<?= $this->lang->line('Dokumen PQ') ?>
									</div>
									<div style="padding: 15px;">

										<div class="row">
											<div class="col-lg-12">
												<div class="ibox float-e-margins">
													<div class="ibox-content text-center">
														<form action="" method="POST" enctype='multipart/form-data' id="upload_file_form">

															<?php if ($must_upload) { ?>

																<div class="form-group col-sm-12" id="file_to_upload">

																	<div class="col-lg-12 m-l-n">

																		<?php
																		if (count($template_doc) > 0) {


																			foreach ($template_doc as $key => $value) { ?>


																				<div class="row">
																					<label class="col-sm-3 control-label"> Upload <?= $value['vdd_name'] ?> <?= $value['doc_file'] ? '' : '*' ?></label>
																					<div class="col-lg-5" margin-bottom: 3%>
																						<input name="file_<?= $key ?>" data-no="<?= $key ?>" style="margin-bottom: 1%" type="file" class="file" accept=".doc, .docx, .xls, .xlsx, .ppt, .pptx, .pdf, image/jpg, image/jpeg, image/png, .Zip, .rar, .tgz, .7zip, .tar" <?= $value['doc_file'] ? "" : "required" ?>>
																						<input name="item_id[]" value="<?= $value['vdd_id'] ?>" style="margin-bottom: 1%" type="hidden">
																						<input name="name[]" value="<?= $value['vdd_name'] ?>" style="margin-bottom: 1%" type="hidden">
																						<?php if ($value['vdd_ref_document_pq']) { ?>
																							<a target="_blank" href="<?php echo site_url('welcome/download/vendor/' . $this->umum->forbidden($this->encryption->encrypt($value['vdd_ref_document_pq']), 'enkrip')) ?>" style="border-radius:6px;">
																								Download Referensi <?= $value['vdd_name'] ?> <?= $value['doc_file'] ? '' : '*' ?>
																							</a>
																						<?php } ?>
																						<?php if ($value['doc_file']) { ?>
																							<small data-no="<?= $key ?>" style="margin-right: 64%">
																								<a href="<?php echo site_url('home/download/Dokumen PQ/' . $value['doc_file']) ?>" target="_blank"><?php echo $value['doc_file'] ?></a>
																							</small><br>
																						<?php } ?>
																						<small class="error" data-no="<?= $key ?>" style="margin-right: 64%"></small><br>
																					</div>
																					<?php if ($value['doc_file']) { ?>
																						<label class="control-label col-lg-3" style="margin-left: -40px;">(Periksa kembali)</label>
																					<?php } else { ?>
																						<label class="control-label col-lg-3" style="margin-left: -40px;">(Baru)</label>
																					<?php } ?>
																				</div>

																			<?php }
																			?>

																			<div style="font-size: 11px" class="row">
																				<i>Max file 5 MB
																					<br>
																					File Type : doc, docx, xls, xlsx, ppt, pptx, pdf, jpg, jpeg, PNG, Zip, rar, tgz, 7zip, tar
																				</i>
																			</div>
																	</div>
																</div>
															<?php } else { ?>
																<div class="row">
																	<div class="col-md-12">
																		<div class="error-template" style="padding: 40px 15px;text-align: center">
																			<h1>Oops!</h1>
																			<h2 id="ecat-error-title">Tidak ada template yang ditemukan</h2>
																			<div class="error-details" id="ecat-error-message">
																				Silahkan hubungi tim SCM <?= COMPANY_NAME ?>
																			</div>
																		</div>
																	</div>
																</div>

															<?php }
																	} else { ?>

															<div style="padding: 15px;">

																<div class="table-responsive">
																	<table class="table table-striped table-bordered table-hover dataTables-example">
																		<thead>
																			<tr>
																				<th>No</th>
																				<th>Nama</th>
																				<th>File</th>
																				<th>Referensi</th>
																				<th>SHE</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php
																			$i = 1;
																			foreach ($doc_pq as $key => $value) { ?>
																				<tr>
																					<td><?php echo $i ?></td>
																					<td><?php echo $value["vdd_name"]; ?></td>
																					<td><a href="<?php echo site_url('home/download/Dokumen PQ/' . $value['doc_file']) ?>" target="_blank"><?php echo $value['doc_file'] ?></a>
																					<td>
																						<?php if ($value['vdd_ref_document_pq']) { ?>
																							<a href="<?php echo site_url('welcome/download/vendor/' . $this->umum->forbidden($this->encryption->encrypt($value['vdd_ref_document_pq']), 'enkrip')) ?>" target="_blank">
																								<?php echo $value['vdd_ref_document_pq'] ?>
																							</a>
																						<?php } else { ?>
																							Tidak Memerlukan Referensi
																						<?php } ?>

																					</td>
																					<td><?php echo $value["vdp_she"]; ?></td>

																				</tr>
																			<?php $i++;
																			} ?>
																		</tbody>
																	</table>
																</div>

															<?php } ?>




															<div class="ibox float-e-margins">
																<div class="ibox-title">
																	<h5>Daftar <?php echo $this->lang->line('comment') ?></h5>
																	<div class="ibox-tools">
																		<a class="collapse-link">
																			<i class="fa fa-chevron-up"></i>
																		</a>
																	</div>
																</div>
																<div class="ibox-content">

																	<table class="table table-responsive">
																		<thead>
																			<tr>
																				<th style="text-align: center;width: 15%">Tanggal</th>
																				<th style="text-align: center;width: 20%">Nama</th>
																				<th style="text-align: center;width: 10%">Tanggapan</th>
																				<th style="text-align: center;width: 21%">Komentar</th>
																			</tr>
																		</thead>
																		<tbody>

																			<?php if (isset($comment_list) && !empty($comment_list)) {

																				foreach ($comment_list as $kc => $vc) {

																					$start_date = date(DEFAULT_FORMAT_DATETIME, strtotime($vc['comment_date']));
																					$end_date = (isset($vc['comment_end_date']) && !empty(strtotime($vc['comment_end_date']))) ? date(DEFAULT_FORMAT_DATETIME, strtotime($vc['comment_end_date'])) : "";
																			?>
																					<tr>
																						<td><?php echo $start_date ?></td>
																						<td><?php echo $vc['comment_name'] . " <br/>(" . $vc['position'] . ")" ?></td>
																						<td><?php echo $vc['response'] ?></td>
																						<td><?php echo $vc['comments'] ?></td>
																					</tr>
																			<?php }
																			} ?>

																		</tbody>

																	</table>

																</div>
															</div>

															<div class="form-group " style="<?= (!$must_upload or !count($template_doc)) ? "display:none" : "" ?>">
																<button class="btn btn-info" type="submit">
																	<?php echo $this->lang->line('Kirim'); ?>
																</button>
																<!-- <button class="btn btn-white" onclick="history.go(-1)"><?php echo $this->lang->line('Nanti'); ?></button> -->
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>

					</div>

				</div>

			</div>
		</div>
	</div>
</div>

<!-- Modal loading -->
<div class="modal fade" id="myLoader" tabindex="-1" role="dialog" aria-labelledby="myLoaderLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<center>
					<h3 class="modal-title" id="myLoaderLabel">Loading...</h3>
				</center>
				<br />
				<div class="progress">
					<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
						<span class="sr-only">100% Complete</span>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('.dataTables-example').DataTable({
			"lengthMenu": [
				[5, 10, 25, 50, -1],
				[5, 10, 25, 50, "All"]
			]
		});

		<?php if ($must_upload) { ?>

			swal({
				title: '<?= !empty($this->session->userdata("doc_pq_msg")['title']) ? $this->session->userdata("doc_pq_msg")['title'] : "Pemberitahuan!" ?>',
				text: '<?= !empty($this->session->userdata("doc_pq_msg")['message']) ? "Silahkan perbaiki dan upload kembali dokumen-dokumen yang dibutuhkan!" : "Silahkan Upload Dokumen PQ Terbaru" ?>',
				type: "info"
			});

		<?php } ?>


		$('.file').bind('change', function(e) {
			var no = $(this).attr("data-no")
			$('.error_msg').remove();
			var ext = $(this).val().split('.').pop().toLowerCase();
			var files = e.target.files;
			console.log(files)
			// alert(files[0].size)
			if (files[0].size > 5242880) {
				$(this).val('');
				$('.error[data-no="' + no + '"]').append("<span style='color:red' class='error_msg'>file tidak boleh lebih dari 5MB <br/></span>");
			} else if ($.inArray(ext, ['doc', 'docx', "xls", 'xlsx', 'ppt', 'pptx', 'pdf', 'jpg', 'jpeg', 'png', 'zip', 'rar', 'tgz', '7zip', 'tar']) == -1) {
				$(this).val('');
				$('.error[data-no="' + no + '"]').append("<span style='color:red' class='error_msg'>format file tidak sesuai <br/></span>");
			}
		})



		$('#upload_file_form').on('submit', function(e) {
			e.preventDefault();

			var form_data = new FormData(this);
			$.each($('.file')[0].files, function(i, file) {
				form_data.append(i, file);
			});
			$.ajax({
				url: '<?= site_url('home/submit_doc_pq') ?>',
				type: 'POST',
				data: form_data,
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function() {
					$('#myLoader').modal('show')
					$('[type="submit"]').prop('disabled', true)
				},
				success: function(res) {
					console.log(res)
					res = JSON.parse(res)
					if (res == 'success') {
						swal({
								title: "Berhasil Menyimpan Data",
								type: "success"
							},
							function() {
								window.location.assign('<?php echo site_url(); ?>');
							});
					} else if (res == 'failed') {
						swal({
							title: "Error!",
							text: "Gagal Menyimpan Data",
							type: "error"
						});
					} else {
						swal({
							title: "Error!",
							text: "Terjadi Kesalahan Teknis",
							type: "error"
						});

					}

				},
				error: function() {
					swal({
						title: "Error!",
						text: "Terjadi Kesalahan Teknis",
						type: "error"
					});
				},
				complete: function() {
					$('#myLoader').modal('hide')
					$('[type="submit"]').prop('disabled', false)
				}
			});

		})


	});
</script>