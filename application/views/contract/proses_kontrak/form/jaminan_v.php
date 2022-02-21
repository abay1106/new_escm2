<div class="row">
  <div class="col-12">
    <div class="card">

      <div class="card-header border-bottom pb-2">
        <h4 class="card-title">Jaminan</h4>
      </div>

      <div class="card-content">
        <div class="card-body">
          <?php $curval = (isset($kontrak['pf_bank'])) ? $kontrak['pf_bank'] : ""; ?>

          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Institusi Keuangan</label>
            <div class="col-sm-7">
              <input class="form-control" id="in_inst" name="nama_bank_inp" value="<?php echo $curval ?>">
            <div class="col-sm-8" style="color: red; display: none;" id="alert_inst">Institusi Keuangan wajib diisi</div>
            </div>
          </div>

          <?php $curval = (isset($kontrak['pf_number'])) ? $kontrak['pf_number'] : ""; ?>
          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Nomor Jaminan</label>
            <div class="col-sm-4">
              <input class="form-control" id="in_nom" name="no_jaminan_inp" value="<?php echo $curval ?>">
            <div class="col-sm-8" style="color: red; display: none;" id="alert_nomor">Nomor Jaminan wajib diisi</div>
            </div>
          </div>

          <?php $curval = (isset($kontrak['pf_start_date']) && !empty($kontrak['pf_start_date'])) ? date("Y-m-d",strtotime($kontrak['pf_start_date'])) : ""; ?>
          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Mulai Berlaku</label>
            <div class="col-sm-4">
              <div class="input-group date">
                <input type="date" name="mulai_berlaku_inp" id="in_mul" class="form-control" value="<?php echo $curval ?>">
              </div>
                <div class="col-sm-9" style="color: red; display: none;" id="alert_mulai">Tanggal Mulai Berlaku wajib diisi</div>
            </div>
          </div>

          <?php $curval = (isset($kontrak['pf_end_date']) && !empty($kontrak['pf_end_date'])) ? date("Y-m-d",strtotime($kontrak['pf_end_date'])) : ""; ?>
          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Berlaku Hingga</label>
            <div class="col-sm-4">
              <div class="input-group date">
                <input type="date" name="berlaku_hingga_inp" class="form-control" id="in_hing" value="<?php echo $curval ?>">
              </div>
                <div class="col-sm-9" style="color: red; display: none;" id="alert_hingga">Tanggal Berlaku Hingga wajib diisi</div>
            </div>
          </div>

          <?php $curval = (isset($kontrak['ctr_currency'])) ? $kontrak['ctr_currency'] : set_value("ctr_currency_inp"); ?>
          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Mata Uang Jaminan</label>
            <div class="col-sm-4">
            <select class="form-control" name="currency_inp" value="<?php echo $curval ?>">
              <option value="">--Pilih--</option>
              <?php 

              foreach($currency as $key => $val){
                $selected = ($val['curr_code'] == $curval) ? "selected" : ""; 
                ?>
                <option <?php echo $selected ?> value="<?php echo $val['curr_code'] ?>"><?php echo $val['curr_code']." - ".$val['curr_name']?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <?php $curval = (isset($kontrak['pf_amount'])) ? $kontrak['pf_amount'] : ""; ?>
          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Nilai Jaminan</label>
            <div class="col-sm-4">
              <input class="form-control money" name="nilai_jaminan_inp" id="in_nil" value="<?php echo $curval ?>">
              <div class="col-sm-8" style="color: red; display: none;" id="alert_nilai">Nilai jaminan wajib diisi</div>
            </div>
          </div>

          <?php $curval = (isset($kontrak['pf_attachment'])) ? $kontrak['pf_attachment'] : ""; ?>
          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">Lampiran Jaminan</label>
            <div class="col-sm-5">
              <div class="input-group">
                <span class="input-group-btn">
                <button type="button" data-id="jaminan_file_inp" data-folder="<?php echo "contract/jaminan" ?>" data-preview="preview_file" class="btn btn-info upload">...</button> 
                </span> 
                <input readonly type="text" class="form-control" id="jaminan_file_inp" name="jaminan_file_inp" value="<?php echo $curval ?>">
                <span class="input-group-btn">
                <button type="button" data-url="<?php echo site_url("log/download_attachment/contract/jaminan/".$curval) ?>" class="btn btn-info preview_upload" id="preview_file"><i class="fa fa-share"></i></button> 
                </span> 
              </div>
                <div class="col-sm-8" style="color: red; display: none;" id="alert_file">Lampiran jaminan wajib diisi</div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
  $(document).ready(function(){

    $("form").submit(function(){

    });

      $("#in_inst").keyup(function(){
          inst = $("this").val();
          if(inst !== ""){
            $("#in_inst").removeAttr("style");
            $("#alert_inst").css("display", "none");
          }
      });

      $("#in_nom").keyup(function(){
          nom = $("this").val();
          if(nom !== ""){
            $("#in_nom").removeAttr("style");
            $("#alert_nomor").css("display", "none");
          }
      });
      
      $("#in_mul").keyup(function(){
          mul = $("this").val();
          if(mul !== ""){
            $("#in_mul").removeAttr("style");
            $("#alert_mulai").css("display", "none");
          }
      });
      
      $("#in_hing").keyup(function(){
          hing = $("this").val();
          if(hing !== ""){
            $("#in_hing").removeAttr("style");
            $("#alert_hingga").css("display", "none");
          }
      });
      
      $("#in_nil").keyup(function(){
          nil = $("this").val();
          if(nil !== ""){
            $("#in_nil").removeAttr("style");
            $("#alert_nilai").css("display", "none");
          }
      });

      $('#in_mul').change(function(event) {
        if ($(this).val() != '') {
          $('#in_hing').attr('min', $(this).val());
        }
      });

      $('#in_hing').rules('add', {
          messages: {
              min: "Tidak boleh kurang dari Tanggal Mulai Berlaku"
          }
      });
      
  });
</script>