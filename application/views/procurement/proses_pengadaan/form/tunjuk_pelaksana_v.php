<div class="row">
  <div class="col-lg-12">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5>Pelaksana Pengadaan</h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>
      </div>
      <div class="ibox-content">
        <div class="form-group">
          <label class="col-sm-2 control-label">Nama *</label>
          <div class="col-sm-8">
           <select class="form-control select2" required name="pelaksana">
             <option value=""><?php echo lang('choose') ?></option>
             <?php 

               foreach ($pelaksana as $key => $vv) {
                 $selected = ($vv['employee_id'] == $curval) ? "selected" : ""; 
                  ?>
                  <option <?php echo $selected ?> value="<?php echo $vv['employee_id'] ?>">
                  <?php 
                  echo $vv['fullname']." - ".$vv['pos_name'] ?>
                  </option>
                  
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>