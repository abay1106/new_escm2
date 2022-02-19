<div class="row">
  <div class="col-12">
    <div class="card">

      <div class="card-header border-bottom pb-2">
        <h4 class="card-title float-left"><?php echo $tender['evt_description']?></h4> 
        <span class="text-info float-right text-bold-700"><i class="ft-cpu"></i> Lelang Electronik</span>
      </div>

      <div class="card-content">
        <div class="card-body">      
          
          <div class="row ml-5 mb-3">
            <div class="col-12">
            <?php $curval = (isset($kontrak['contract_amount'])) ? inttomoney($kontrak['contract_amount']) : 0; ?>
              <div class="form-group">
                <label class="control-label text-right text-bold-700">Nilai Kontrak</label>                
                <p class="form-control-static text-bold-700 font-large-1 text-info"><?php echo $curval ?></p>                
              </div>
            </div>
          </div>

          <div class="row">
            
            <!-- left-side -->
            <div class="col">
              
              <?php $curval = (isset($kontrak['ptm_number'])) ? $kontrak['ptm_number'] : "AUTO NUMBER"; ?>
              <?php $curval = $kontrak['ptm_number'];?>

              <div class="form-group">
                <label class="col-sm-4 control-label text-right text-bold-700">Nomor Tender</label>
                <div class="col-sm-8">
                  <p class="form-control-static">
                    <a href="<?php echo site_url('procurement/procurement_tools/monitor_pengadaan/lihat/'.$curval) ?>" target="_blank">
                      <?php echo $curval ?>
                    </a>
                  </p>
                </div>
              </div>

              <?php $curval = (isset($kontrak['contract_number'])) ? $kontrak['contract_number'] : "AUTO NUMBER"; ?>              

              <div class="form-group">
                <label class="col-sm-4 control-label text-right text-bold-700">Nomor Kontrak</label>
                <div class="col-sm-8">
                  <p class="form-control-static">
                    <?php echo $curval ?>
                  </p>
                </div>
              </div>

              <?php $curval = (isset($tender['ptm_buyer'])) ? $tender['ptm_buyer'] : ""; ?>
              <div class="form-group">
                <label class="col-sm-4 control-label text-right text-bold-700">Buyer</label>
                <div class="col-sm-8">
                  <p class="form-control-static"><?php echo $curval ?></p>
                </div>
              </div>     

              <?php $curval = (isset($tender['ptm_dept_name'])) ? $tender['ptm_dept_name'] : ""; ?>
              <div class="form-group">
                <label class="col-sm-4 control-label text-right text-bold-700">Divisi</label>
                <div class="col-sm-8">
                  <p class="form-control-static"><?php echo $curval ?></p>
                </div>
              </div>  
              
              <?php $curval = (isset($tender['ptm_requester_name'])) ? $tender['ptm_requester_name'] : ""; ?>
              <div class="form-group">
                <label class="col-sm-4 control-label text-right text-bold-700">User</label>
                <div class="col-sm-8">
                  <p class="form-control-static"><?php echo $curval ?></p>
                </div>
              </div>     

              <?php $curval = (isset($tender['ptm_project_name'])) ? $tender['ptm_project_name'] : ""; ?>
              <div class="form-group">
                <label class="col-sm-4 control-label text-right text-bold-700">Proyek</label>
                <div class="col-sm-8">
                  <p class="form-control-static"><?php echo $curval ?></p>
                </div>
              </div>    
              
              <?php $curval = (isset($kontrak['contract_type_2'])) ? $kontrak["contract_type_2"] : set_value("jenis_kontrak_inp"); ?>
              <div class="form-group">
                <label class="col-sm-4 control-label text-right text-bold-700">Jenis Kontrak <span class="text-danger text-bold-700">*</span></label>
                <div class="col-sm-6">
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
              <div class="form-group">
                <label class="col-sm-4 control-label mt-2 text-right text-bold-700">Item Kontrak <span class="text-danger text-bold-700">*</span></label>
                <div class="col-sm-6 mt-2">
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

              <div class="form-group">
                <label class="col-sm-4 control-label text-right mt-2 text-bold-700">Download Template</label>
                <div class="col-sm-8">
                  <p class="form-control-static mt-2">
                    <span class="badge badge-info mr-2">SPK</span>
                    <span class="badge badge-info mr-2">SPB</span>
                    <span class="badge badge-info mr-2">PPJ</span>
                    <span class="badge badge-info mr-2">PPB</span>
                  </p>
                </div>
              </div>     
              
              <?php $curval = (isset($kontrak['subject_work'])) ? $kontrak['subject_work'] : set_value("subject_work_inp"); ?>
              <div class="form-group">
                <label class="col-sm-4 control-label text-right text-bold-700">Paket Pengadaan <span class="text-danger text-bold-700">*</span></label>
                <div class="col-sm-8">
                  <input class="form-control" required name="subject_work_inp" value="<?php echo $curval ?>">
                </div>
              </div>

              <?php $curval = (isset($kontrak['scope_work'])) ? $kontrak['scope_work'] : set_value("scope_work_inp"); ?>
              <div class="form-group">
                <label class="col-sm-4 control-label text-right mt-2 text-bold-700">Deskripsi <span class="text-danger text-bold-700">*</span></label>
                <div class="col-sm-8 mt-2">
                  <textarea class="form-control" required name="scope_work_inp"><?php echo $curval ?></textarea>
                </div>
              </div>

            </div>

            <!-- center-side -->
            <div class="col">

              <?php $curval = (isset($kontrak['vendor_name'])) ? $kontrak['vendor_name'] : ""; ?>
              <div class="form-group">
                <label class="col-sm-4 control-label text-right text-bold-700">Vendor/Penyedia</label>
                <div class="col-sm-8">
                  <p class="form-control-static"><?php echo $curval ?></p>
                </div>
              </div>

              <?php $curval = (isset($kontrak['contract_type'])) ? $kontrak['contract_type'] : set_value("lokasi_kebutuhan_inp"); ?>
              <div class="form-group">
                <label class="col-sm-4 control-label text-right text-bold-700">Tipe Kontrak</label>
                <div class="col-sm-8">
                  <p class="form-control-static"><?php echo $curval ?></p>
                </div>
              </div>

              <?php $curval = (isset($kontrak['currency']) && !empty($kontrak['currency'])) ? $kontrak['currency'] : $tender['ptm_currency']; ?>
              <div class="form-group">
                <label class="col-sm-4 control-label text-right text-bold-700">Mata Uang</label>
                <div class="col-sm-8">
                  <p class="form-control-static"><?php echo $curval ?></p>
                </div>
              </div>

              <?php $curval = (isset($hps)) ? inttomoney($hps) : 0; ?>
              <div class="form-group">
                <label class="col-sm-4 control-label text-right text-bold-700">Nilai HPS</label>
                <div class="col-sm-8">
                  <p class="form-control-static"><?php echo $curval ?></p>
                </div>
              </div> 

              <?php $curval = (isset($kontrak['start_date']) && !empty($kontrak['start_date'])) ?  date("Y-m-d",strtotime($kontrak["start_date"])) : set_value("tgl_mulai_inp"); ?>
              <div class="form-group">
                <label class="col-sm-4 control-label text-right text-bold-700">Tanggal Mulai Kontrak <span class="text-danger text-bold-700">*</span></label>
                <div class="col-sm-6">
                  <div class="input-group date">
                    <input type="date" name="tgl_mulai_inp" required class="form-control" value="<?php echo $curval ?>">
                  </div>
                </div>
              </div>

              <?php $curval = (isset($kontrak['end_date']) && !empty($kontrak['end_date'])) ? date("Y-m-d",strtotime($kontrak["end_date"])) : set_value("tgl_akhir_inp"); ?>
              <div class="form-group">
                <label class="col-sm-4 control-label text-right text-bold-700">Tanggal Berakhir Kontrak <span class="text-danger text-bold-700">*</span></label>
                <div class="col-sm-6">
                  <div class="input-group date">
                    <input type="date" name="tgl_akhir_inp" required class="form-control" value="<?php echo $curval ?>">
                  </div>
                </div>
              </div>
              <?php if ($activity_id == 2030): ?>
              <?php $curval = (isset($kontrak['sign_date']) && !empty($kontrak['sign_date'])) ? date("Y-m-d",strtotime($kontrak["sign_date"])) : set_value("tgl_sign_inp"); ?>
              <div class="form-group">
                <label class="col-sm-4 control-label text-right text-bold-700">Tanggal Penandatanganan <span class="text-danger text-bold-700">*</span></label>
                <div class="col-sm-6">
                  <div class="input-group date">
                    <input type="date" name="tgl_sign_inp" required class="form-control" value="<?php echo $curval ?>">
                  </div>
                </div>
              </div>
              <?php endif ?>

              <?php $curval = $specialist_name; ?>
              <div class="form-group">
                <label class="col-sm-4 control-label text-right text-bold-700">Pelaksana Kontrak</label>
                <div class="col-sm-8">
                  <p class="form-control-static"><?php echo $curval ?></p>
                </div>
              </div>

              <div class="form-group">                
                <label class="col-sm-4 control-label text-right text-bold-700 mb-2">e-Signature</label>
                <div class="col-sm-8">
                  <div class="custom-switch custom-switch-info mb-2">
                      <input type="checkbox" class="custom-control-input" id="color-switch-1" checked>
                      <label class="custom-control-label" for="color-switch-1"></label>
                  </div>  
                </div>
              </div>

              <div class="form-group">                
                <label class="col-sm-4 control-label text-right text-bold-700">Kirim Ke PaDi UMKM</label>
                <div class="col-sm-8">
                  <div class="custom-switch custom-switch-info">
                      <input type="checkbox" class="custom-control-input" id="color-switch-2" checked>
                      <label class="custom-control-label" for="color-switch-2"></label>
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