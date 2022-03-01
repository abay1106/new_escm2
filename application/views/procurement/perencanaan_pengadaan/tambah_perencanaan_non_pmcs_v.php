<section class="users-list-wrapper">
    <!-- Table starts -->
    <div class="users-list-table">
	<form id="form_matgis" action="<?= $actionPostMatgis; ?>" method="post" enctype="multipart/form-data">
		<!-- header -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
					<div class="card-header text-muted">
							<h3> HEADER</h3>
							<hr>
							<span class="tags float-right">
								<!-- <a onclick="fshowSettings()" class="btn btn-sm btn-warning"><i class="ft ft-settings"></i> Pengaturan Pertanyaan</a> -->
							</span>
						</div>
                        <div class="card-body">
						<div class="form-group row">
							<label class="col-md-3 label-control" for="striped-form-1">User</label>
							<div class="col-md-9">
							<input type="text" id="striped-form-1" class="form-control" readonly name="fullname" value="<?= $emp['fullname'] ?>">
							</div>
                        </div>

						<div class="form-group row">
							<label class="col-md-3 label-control" for="striped-form-1">Divisi/Departemen</label>
							<div class="col-md-9">
							<input type="text" id="striped-form-1" class="form-control" readonly name="departemen" value="<?= $emp['dept_name'] ?>">
							</div>
                        </div>

						<div class="form-group row">
							<label class="col-md-3 label-control" for="striped-form-1">Jenis Rencana</label>
							<div class="col-md-9">
							<input type="text" id="striped-form-1" class="form-control" name="h_matgis_rencana" value="RKP NON PMCS" readonly>
							</div>
                        </div>

						<div class="form-group row">
							<label class="col-md-3 label-control" for="striped-form-1">Nama Rencana</label>
							<div class="col-md-9">
							<select name="h_matgis" class="form-control select2" id="h_matgis">
								<option value="">--- PILIH RENCANA ---</option>
								<?php foreach ($master_matgis as $key => $value) : ?>
								<option value="<?=$value['id'] ?>"><?=$value['label'] ?></option>
								<?php endforeach; ?>
							</select>
							</div>
                        </div>

						<div class="form-group row">
							<label class="col-md-3 label-control" for="striped-form-1">Mata Uang</label>
							<div class="col-md-9">
							<select name="h_curr_code" class="form-control select2" id="h_curr_code">
								<?php foreach ($curr as $key => $value) : ?>
								<option value="<?=$value['curr_code'] ?>"><?=$value['curr_name'] ?></option>
								<?php endforeach; ?>
							</select>
							</div>
                        </div>

                           <!-- content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<!-- Matgis -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
					<div class="card-header text-muted">
							<h3>Pemilihan Item</h3>
							<hr>
							<span class="tags float-right">
								<!-- <a onclick="fshowSettings()" class="btn btn-sm btn-warning"><i class="ft ft-settings"></i> Pengaturan Pertanyaan</a> -->
							</span>
						</div>
                        <div class="card-body">
						<div class="form-group row">
							<label class="col-md-3 label-control" for="striped-form-1">Kode</label>
							<div class="col-md-9">
								<input type="hidden" id="i_kode">
							<!-- <button type="button" id="btnItemMatgis" data-bs-toggle="modal" data-bs-target="#modalItemMatgis" class="btn btn-info">Pilih Matgis</button> -->
							<select name="i_matgis" class="form-control select2" id="i_matgis">
								<option value="">--- PILIH ---</option>
								<?php foreach ($item_matgis as $key => $value) : ?>
								<option value="<?=$value['smbd_code'] ?>_<?=$value['group_smbd_code'] ?>"><?=$value['smbd_code'] ?> - <?=$value['smbd_name'] ?></option>
								<?php endforeach; ?>
							</select>
							</div>
                        </div>

						<div class="form-group row">
							<label class="col-md-3 label-control" for="striped-form-1">Tipe</label>
							<div class="col-md-9">
							<input type="text"  class="form-control" name="i_tipe" readonly id="i_tipe">
							</div>
                        </div>

						<div class="form-group row">
							<label class="col-md-3 label-control" for="striped-form-1">Deskripsi</label>
							<div class="col-md-9">
							<input type="text"  class="form-control" name="i_deskripsi" readonly id="i_deskripsi">
							</div>
                        </div>

						<div class="form-group row">
							<label class="col-md-3 label-control" for="striped-form-1">Volume</label>
							<div class="col-md-9">
							<input type="text"  class="form-control input-number" name="i_volume" id="i_volume" data-inputmask="'alias': 'decimal', 'groupSeparator': '.', 'autoGroup': true,  'radixPoint':','" >
							</div>
                        </div>

						<div class="form-group row">
							<label class="col-md-3 label-control" for="striped-form-1">Satuan</label>
							<div class="col-md-9">
							<input type="text"  class="form-control" name="i_satuan" readonly id="i_satuan">
							</div>
                        </div>

						<div class="form-group row">
							<label class="col-md-3 label-control" for="striped-form-1">Harga Satuan</label>
							<div class="col-md-9">
							<input type="text"  class="form-control input-number" name="i_harga_satuan" id="i_harga_satuan_view" data-inputmask="'alias': 'decimal', 'groupSeparator': '.', 'autoGroup': true,  'radixPoint':','" >
							<input type="hidden"  class="form-control" name="i_harga_satuan" id="i_harga_satuan">

							</div>
                        </div>

						<div class="form-group row">
							<label class="col-md-3 label-control" for="striped-form-1"> </label>
							<div class="col-md-9">
							<button class="btn btn-info" id="btnTambahMatgis">Tambah item</button>
							</div>
                        </div>

						<div class="form-group row">
							<div class="col-md-12">
							<table class="table table-bordered" id="item_table">
							<thead>
								<tr>
								<th>#</th>
								<th>Kode</th>
								<th>Item</th>
								<th>Volume</th>
								<th>Satuan</th>
								<th>Harga Satuan<br/><!-- (Sebelum Pajak) --></th>
								<th style="display: none">Pajak</th>
								<th>Subtotal<br/><!-- (Sebelum Pajak) --></th>
								</tr>
							</thead>
							<tbody id="i_body_item">

							</tbody>
							</table>
							</div>
						</div>



                           <!-- content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
					<div class="card-header text-muted">
							<h3>Lampiran</h3>
							<hr>
							<span class="tags float-right">
								<!-- <a onclick="fshowSettings()" class="btn btn-sm btn-warning"><i class="ft ft-settings"></i> Pengaturan Pertanyaan</a> -->
							</span>
						</div>
                        <div class="card-body" id="body_lampiran">

						<div class="form-group row lampiran_matgis">
							<label class="col-md-3 label-control" for="striped-form-1">Lampiran</label>
							<div class="col-md-9">
							<input type="file" class="form-control" multiple id="file_" name="files[]">

							</div>
                        </div>

						<!-- <div class="form-group row">
							<label class="col-md-3 label-control" for="striped-form-1"> </label>
							<div class="col-md-9">
							<button class="btn btn-info" id="btnTambahLampiran">Tambah lampiran</button>
							</div>
                        </div> -->


                           <!-- content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
					<div class="card-header text-muted">
							<h3>Komentar</h3>
							<hr>
							<span class="tags float-right">
								<!-- <a onclick="fshowSettings()" class="btn btn-sm btn-warning"><i class="ft ft-settings"></i> Pengaturan Pertanyaan</a> -->
							</span>
						</div>
                        <div class="card-body">

						<div class="form-group row lampiran_matgis">
							<label class="col-md-3 label-control" for="striped-form-1">Komentar</label>
							<div class="col-md-9">
							<input type="text" class="form-control" id="file_" name="komentar" required>

							</div>
                        </div>


                           <!-- content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

							<span class="tags float-left">
							<span class="float-left"><a href="#" id="btnSimpanMatgis" class="btn btn-info"><i class="ft ft-plus"></i>SIMPAN</a></span>
							</span>

    </div>
    <!-- Table ends -->
</section>
