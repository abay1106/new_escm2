<?php if ($permintaan['ptm_type_of_plan'] == "rkp") { ?>
    
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>MPPP dan MDIV</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">

          <?php $curval = (isset($permintaan['mppp_pos_code'])) ? $permintaan['mppp_pos_code'] : set_value("mppp_inp") ;?>
          <div class="form-group">
            <label class="col-sm-2 control-label">MPPP *</label>
            <div class="col-sm-6">
             <select class="form-control select" required name="mppp_inp">
               <option value=""><?php echo lang('choose') ?></option>
               <?php foreach($mppp as $key => $val){
                $selected = ($val['pos_id'] == $curval) ? "selected" : ""; 
                ?>
                <option <?php echo $selected ?> value="<?php echo $val['pos_id'] ?>">
                <?php echo $val['pos_name']; ?>
                </option>
                <?php } ?>
              </select>
            </div>
          </div>
        
          <?php $curval = (isset($permintaan['amm_id'])) ? $permintaan['amm_id'] : set_value("mdiv_inp") ;?>
          <div class="form-group">
            <label class="col-sm-2 control-label">MDIV *</label>
            <div class="col-sm-6">
             <select class="form-control select" required name="mdiv_inp" id="mdiv_inp">
               <option value=""><?php echo lang('choose') ?></option>
               <?php foreach($mdiv as $key => $val){
                $selected = ($val['amm_id'] == $curval) ? "selected" : ""; 
                ?>
                <option <?php echo $selected ?> value="<?php echo $val['amm_id'] ?>">
                <?php echo $val['pos_name']." - ". $val['region_name']; ?>
                </option>
                <?php } ?>
              </select>
            </div>
          </div>
<!-- 
          <?php $curval = (isset($permintaan['ptm_project_loc'])) ? $permintaan['ptm_project_loc'] : set_value("lokasi_proyek_inp") ; ?>
          <div class="form-group">
            <label class="col-sm-2 control-label">Lokasi Proyek *</label>
            <div class="col-sm-10">
              <p id="lokasi_proyek_inp" class="form-control-static"><?php echo $curval ?></p>
              <input type="hidden" name="lokasi_proyek_inp" value="<?php echo $curval ?>">
            </div>
          </div>
 -->
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    

    var lokasi = [];
    <?php foreach($mdiv as $key => $val){ ?>
      lokasi.push({lbl:"<?php echo $val['pos_code']['key'] ?>",region_name:"<?php echo $val['region_name']['key'] ?>"});
    <?php } ?>

    console.log(lokasi);

    $("#mdiv_inp").change(function(){

      var val = $(this).val();

      for (var i = 0; i < lokasi.length; i++) {
        if(val == lokasi[i].lbl){
          $("#lokasi_proyek_inp").text(lokasi[i].region_name);
          $("input[name='lokasi_proyek_inp']").val(lokasi[i].region_name);
        }

      }

    });

  </script>

<?php } ?>