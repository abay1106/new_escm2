<div class="row">
  <div class="col-12">
    <div class="card">

      <div class="card-header border-bottom pb-2">
        <h4 class="card-title">Header</h4>
      </div>

      <div class="card-content">
        <div class="card-body">
          <?php $curval = (isset($kontrak['ptm_number'])) ? $kontrak['ptm_number'] : "AUTO NUMBER"; ?>
          <?php $curval = $kontrak['ptm_number'];?>

          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Nomor Pengadaan</label>
            <div class="col-sm-10">
              <p class="form-control-static">
                <a href="<?php echo site_url('procurement/procurement_tools/monitor_pengadaan/lihat/'.$curval) ?>" target="_blank">
                  <?php echo $curval ?>
                </a>
              </p>
            </div>
          </div>

          <?php $curval = (isset($kontrak['contract_number'])) ? $kontrak['contract_number'] : "AUTO NUMBER"; ?>

          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Nomor Kontrak</label>
            <div class="col-sm-10">
              <p class="form-control-static">
                <?php echo $curval ?>
              </p>
            </div>
          </div>

          <?php $curval = (isset($tender['ptm_requester_name'])) ? $tender['ptm_requester_name'] : ""; ?>
          <?php $curval2 = (isset($tender['ptm_requester_pos_name'])) ? $tender['ptm_requester_pos_name'] : ""; ?>
          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">User</label>
            <div class="col-sm-10">
              <p class="form-control-static"><?php echo $curval ?> - <?php echo $curval2 ?></p>
            </div>
          </div>

          <?php $curval = (isset($tender['ptm_buyer'])) ? $tender['ptm_buyer'] : ""; ?>
          <?php $curval2 = (isset($tender['ptm_buyer_pos_name'])) ? $tender['ptm_buyer_pos_name'] : ""; ?>
          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Pelaksana Pengadaan</label>
            <div class="col-sm-10">
              <p class="form-control-static"><?php echo $curval ?> - <?php echo $curval2 ?></p>
            </div>
          </div>

          <?php $curval = (isset($kontrak['vendor_name'])) ? $kontrak['vendor_name'] : ""; ?>

          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Vendor</label>
            <div class="col-sm-10">
              <p class="form-control-static"><?php echo $curval ?></p>
            </div>
          </div>

          <?php $curval = (isset($kontrak['contract_type'])) ? $kontrak['contract_type'] : set_value("lokasi_kebutuhan_inp"); ?>

          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Tipe Kontrak</label>
            <div class="col-sm-10">
              <p class="form-control-static"><?php echo $curval ?></p>
            </div>
          </div>

          <?php $curval = (isset($kontrak['currency']) && !empty($kontrak['currency'])) ? $kontrak['currency'] : $tender['ptm_currency']; ?>

          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Mata Uang Kontrak</label>
            <div class="col-sm-10">
              <p class="form-control-static"><?php echo $curval ?></p>
            </div>
          </div>

          <?php $curval = (isset($hps)) ? inttomoney($hps) : 0; ?>

          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Nilai HPS</label>
            <div class="col-sm-10">
              <p class="form-control-static"><?php echo $curval ?></p>
            </div>
          </div>

          <?php $curval = (isset($kontrak['contract_amount'])) ? inttomoney($kontrak['contract_amount']) : 0; ?>

          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Nilai Kontrak</label>
            <div class="col-sm-10">
              <p class="form-control-static"><?php echo $curval ?></p>
            </div>
          </div>

          <?php $curval = (isset($kontrak['subject_work'])) ? $kontrak['subject_work'] : set_value("subject_work_inp"); ?>

          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Judul Pekerjaan *</label>
            <div class="col-sm-8">
              <input class="form-control" required name="subject_work_inp" value="<?php echo $curval ?>">
            </div>
          </div>

          <?php $curval = (isset($kontrak['scope_work'])) ? $kontrak['scope_work'] : set_value("scope_work_inp"); ?>

          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Deskripsi Pekerjaan *</label>
            <div class="col-sm-8">
              <textarea class="form-control" required name="scope_work_inp"><?php echo $curval ?></textarea>
            </div>
          </div>

          <?php $curval = (isset($kontrak['contract_type_2'])) ? $kontrak["contract_type_2"] : set_value("jenis_kontrak_inp"); ?>
          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Jenis Kontrak *</label>
            <div class="col-sm-3">
            <select class="form-control" required name="jenis_kontrak_inp" value="<?php echo $curval ?>">
              <option value="">Pilih Jenis Kontrak</option>
              <?php foreach($contract_type as $key => $val){
                $selected = ($val == $curval) ? "selected" : ""; 
                ?>
                <option <?php echo $selected ?> value="<?php echo $val ?>"><?php echo $val ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <?php $curval = (isset($kontrak['ctr_item_type'])) ? $kontrak["ctr_item_type"] : set_value("item_kontrak_inp"); ?>
          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Item Kontrak *</label>
            <div class="col-sm-3">
            <select class="form-control" required name="item_kontrak_inp" value="<?php echo $curval ?>">
              <option value="">Pilih Item Kontrak</option>
              <?php foreach($contract_item as $key => $val){
                $selected = ($val == $curval) ? "selected" : ""; 
                ?>
                <option <?php echo $selected ?> value="<?php echo $val ?>"><?php echo $val ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <?php $curval = (isset($kontrak['start_date']) && !empty($kontrak['start_date'])) ?  date("Y-m-d",strtotime($kontrak["start_date"])) : set_value("tgl_mulai_inp"); ?>
          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Tanggal Mulai Kontrak *</label>
            <div class="col-sm-4">
              <div class="input-group date">
                <input type="date" name="tgl_mulai_inp" required class="form-control" value="<?php echo $curval ?>">
              </div>
            </div>
          </div>

          <?php $curval = (isset($kontrak['end_date']) && !empty($kontrak['end_date'])) ? date("Y-m-d",strtotime($kontrak["end_date"])) : set_value("tgl_akhir_inp"); ?>
          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Tanggal Berakhir Kontrak *</label>
            <div class="col-sm-4">
              <div class="input-group date">
                <input type="date" name="tgl_akhir_inp" required class="form-control" value="<?php echo $curval ?>">
              </div>
            </div>
          </div>
          <?php if ($activity_id == 2030): ?>
          <?php $curval = (isset($kontrak['sign_date']) && !empty($kontrak['sign_date'])) ? date("Y-m-d",strtotime($kontrak["sign_date"])) : set_value("tgl_sign_inp"); ?>
          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Tanggal Penandatanganan *</label>
            <div class="col-sm-4">
              <div class="input-group date">
                <input type="date" name="tgl_sign_inp" required class="form-control" value="<?php echo $curval ?>">
              </div>
            </div>
          </div>
          <?php endif ?>

        </div>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    if ($('[name="tgl_mulai_inp"]').val() != '') {
        $('[name="tgl_akhir_inp"]').attr('min', $(this).val());
      }

    $('[name="tgl_mulai_inp"]').change(function(event) {
      if ($(this).val() != '') {
        $('[name="tgl_akhir_inp"]').attr('min', $(this).val());
      }
    });    

    $('[name="tgl_akhir_inp"]').rules('add', {
        messages: {
            min: "Tidak boleh kurang dari Tanggal Mulai Kontrak"
        }
    });

    <?php if ($activity_id == 2030): ?>
      if ($('[name="tgl_akhir_inp"]').val() != '') {
          $('[name="tgl_sign_inp"]').attr('max', $(this).val());
        }
      
      $('[name="tgl_akhir_inp"]').change(function(event) {
        if ($(this).val() != '') {
          $('[name="tgl_sign_inp"]').attr('max', $(this).val());
        }
      });

      $('[name="tgl_sign_inp"]').rules('add', {
          messages: {
              max: "Tidak boleh lebih dari Tanggal Akhir Kontrak"
          }
      });
    <?php endif ?>

    
  });
</script>