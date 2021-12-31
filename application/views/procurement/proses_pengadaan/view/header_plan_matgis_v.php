<div class="row">
  <div class="col-lg-12">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5>HEADLINE</h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>
      </div>
      <div class="ibox-content">

        <?php $curval = $perencanaan['ppm_planner']; ?>
        <div class="form-group">
          <label class="col-sm-2 control-label">User </label>
          <div class="col-sm-10">
           <p class="form-control-static"><?php echo $curval ?></p>
         </div>
       </div>

       <?php $curval = $perencanaan["ppm_dept_name"]; ?>
       <div class="form-group">
        <label class="col-sm-2 control-label">Divisi/Departemen </label>
        <div class="col-sm-10">
          <p class="form-control-static"><?php echo $curval ?></p>
        </div>
      </div>

      <!-- haqim -->
      <?php $curval = $perencanaan["ppm_type_of_plan"]; ?>
      <div class="form-group">
        <label class="col-sm-2 control-label">Jenis Rencana*</label>
        <div class="col-sm-9">
         <p class="form-control-static" id="kode_proyek">RKP Material Strategis</p>
       </div>
     </div>


     <?php $curval = $perencanaan["ppm_subject_of_work"]; ?>
     <div class="form-group">
      <label class="col-sm-2 control-label">Nama Rencana Matgis</label>
      <div class="col-sm-10">
       <p class="form-control-static"><?php echo $curval ?></p>
     </div>
   </div>

   <?php $curval = $perencanaan["ppm_scope_of_work"]; ?>
   <div class="form-group">
    <label class="col-sm-2 control-label">Deskripsi Rencana Matgis</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo $curval ?></p>
    </div>
  </div>

<?php /*
      <?php $curval = $perencanaan["ppm_currency"]; ?>
      <div class="form-group">
        <label class="col-sm-2 control-label">Mata Uang </label>
        <div class="col-sm-4">
         <select disabled class="form-control" name="mata_uang_inp">
          <option value=""><?php echo lang('choose') ?></option>
          <?php foreach($default_currency as $key => $val){
            $selected = ($key == $curval) ? "selected" : ""; 
            ?>
            <option <?php echo $selected ?> value="<?php echo $key ?>"><?php echo $val ?></option>
            <?php } ?>
          </select>
        </div>
      </div>

      */ ?>

      <?php $curval = $perencanaan["ppm_pagu_anggaran"] ?>
      <div class="form-group">
        <label class="col-sm-2 control-label">Nilai Anggaran </label>
        <div class="col-sm-4">

         <p class="form-control-static"><?php echo inttomoney($curval) ?></p>
       </div>
     </div>

     <?php /*

     <?php $date = strlen($perencanaan["ppm_renc_pelaksanaan"])== 8 ? substr($perencanaan["ppm_renc_pelaksanaan"], 6, 2) : ""  ?>
    <?php $month = getmonthname(substr($perencanaan["ppm_renc_pelaksanaan"], 4, 2)); ?>
    <?php $year = substr($perencanaan["ppm_renc_pelaksanaan"], 0, 4); ?>
    <div class="form-group">
      <label class="col-sm-2 control-label">Rencana Pelaksanaan Pengadaan </label>
      <div class="col-sm-6">

        <p class="form-control-static"><?php echo $date ?> <?php echo $month ?> <?php echo $year ?></p>

      </div>
    </div>

     <?php $date = strlen($perencanaan["ppm_renc_kebutuhan"])== 8 ? substr($perencanaan["ppm_renc_kebutuhan"], 6, 2) : ""  ?>
    <?php $month = getmonthname(substr($perencanaan["ppm_renc_kebutuhan"], 4, 2)); ?>
     <?php $year = substr($perencanaan["ppm_renc_kebutuhan"], 0, 4); ?>
     <div class="form-group">
      <label class="col-sm-2 control-label">Rencana Kebutuhan </label>
      <div class="col-sm-6">

        <p class="form-control-static"><?php echo $date ?> <?php echo $month ?> <?php echo $year ?></p>

      </div>
    </div>

    */ ?>

  </div>
</div>
</div>
</div>
