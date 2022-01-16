<?php if($permintaan['pr_type'] == "MATERIAL STRATEGIS"){ 
  include(VIEWPATH."procurement/proses_pengadaan/view/header_pr_matgis_v.php"); 
} else { ?>

  <div class="row">
    <div class="col-12">
      <div class="card">
        
        <div class="card-header border-bottom pb-2">
            <h4 class="card-title">Headline</h4>
        </div>

        <div class="card-content">
          <div class="card-body">
          <?php $curval = $permintaan['pr_number']; ?>
          <div class="row form-group">
            <label class="col-sm-2 control-label text-right">No. Permintaan</label>
            <div class="col-sm-10">
             <p class="form-control-static"><?php echo $curval ?></p>
           </div>
         </div>

         <?php $curval = $permintaan['pr_requester_name']; ?>
         <div class="row form-group">
          <label class="col-sm-2 control-label text-right">User *</label>
          <div class="col-sm-10">
           <p class="form-control-static"><?php echo $curval ?></p>
         </div>
        </div>

        <?php $curval = $permintaan['pr_requester_pos_name']; ?>
        <div class="row form-group">
          <label class="col-sm-2 control-label text-right">Divisi/Departemen *</label>
          <div class="col-sm-10">
            <p class="form-control-static"><?php echo $curval ?></p>
          </div>
        </div>

        <?php $curval = date(DEFAULT_FORMAT_DATETIME,strtotime($permintaan['pr_created_date'])); ?>
        <div class="row form-group">
          <label class="col-sm-2 control-label text-right">Tanggal Pembuatan</label>
          <div class="col-sm-10">
          <p class="form-control-static"><?php echo $curval ?></p>
        </div>
      </div>

      <?php $curval = $permintaan["pr_subject_of_work"]; ?>
      <div class="row form-group">
        <label class="col-sm-2 control-label text-right">Nama Rencana Pengadaan *</label>
        <div class="col-sm-8">
          <p class="form-control-static" id="nama_pekerjaan"><?php echo $curval ?></p>

        </div>
      </div>

      <?php $curval = $permintaan["pr_scope_of_work"]; ?>
      <div class="form-group" hidden="hidden">
        <label class="col-sm-2 control-label text-right">Deskripsi Pekerjaan *</label>
        <div class="col-sm-10">
          <p class="form-control-static" id="deskripsi_pekerjaan"><?php echo $curval ?></p>

        </div>
      </div>

      <!-- haqim -->
      <?php $curval = $permintaan['pr_project_name'];
      if (!empty($curval)) { ?>
        <?php $curval = $permintaan['pr_spk_code'];?>
        <div class="row form-group">
          <label class="col-sm-2 control-label text-right">Kode SPK *</label>
          <div class="col-sm-10">
            <p class="form-control-static" id="kode_spk"><?php echo $curval ?></p>

          </div>
        </div>
        <?php $curval = $permintaan['pr_project_name'];?>
        <div class="row form-group">
          <label class="col-sm-2 control-label text-right">Nama Proyek *</label>
          <div class="col-sm-10">
            <p class="form-control-static" id="deskripsi_pekerjaan"><?php echo $curval ?></p>

          </div>
        </div>
      <?php    }
      ?>
      <!-- end -->

        <?php 
        $code = (isset($permintaan['pr_mata_anggaran']) && !empty($permintaan['pr_mata_anggaran'])) ? $permintaan['pr_mata_anggaran'] : null;
        $label = (isset($permintaan['pr_nama_mata_anggaran']) && !empty($permintaan['pr_nama_mata_anggaran'])) ? $permintaan['pr_nama_mata_anggaran'] : null;
        $curval = (!empty($code) && !empty($label)) ? $code." ".$label : null; 
        ?>
        
          <?php if(!empty($curval)){ ?>
            <div class="row form-group">
              <label class="col-sm-2 control-label text-right">Mata Anggaran *</label>
              <div class="col-sm-10">
                <p class="form-control-static" id="mata_anggaran"><?php echo $curval ?></p>
              </div>
            </div>
          <?php } ?>

          <?php

          $curval = null;
          if (isset($permintaan["pr_sub_mata_anggaran"]) and substr_count($permintaan["pr_sub_mata_anggaran"], " , ") >= 1 ) {
            $code = explode(" , ", $permintaan["pr_sub_mata_anggaran"]);
            $name = explode(" , ", $permintaan["pr_nama_sub_mata_anggaran"]);
            $curval = $permintaan["pr_sub_mata_anggaran"]." - ".$permintaan["pr_nama_sub_mata_anggaran"];
          }
          ?>

              <?php if(!empty($curval)){ ?>
                  <div class="row form-group">
                    <label class="col-sm-2 control-label text-right">Sub Mata Anggaran *</label>
                    <div class="col-sm-10">
                      <p class="form-control-static" id="sub_mata_anggaran">
                        <?php
                        if (isset($code)) {
                          foreach (array_combine($code, $name) as $code => $name ) {
                            echo $code.' - '.$name."<br/>";
                          }
                        }else if ($permintaan["pr_sub_mata_anggaran"] == 0) {
                          foreach ($project_cost as $keypc => $valuepc) {
                            echo $valuepc['coa_code'].' - '.$valuepc['coa_name']."<br/>";
                          }
                        }else{
                        echo $curval;
                      } 

                      ?>
                    </p>
                  </div>
                  </div>
              <?php } ?>

              <?php $curval = $permintaan['pr_currency']; ?>
              <div class="row form-group">
              <label class="col-sm-2 control-label text-right">Mata Uang</label>
              <div class="col-sm-10">
              <p class="form-control-static"><?php echo $curval ?></p>
              </div>
              </div>

              <?php $curval = inttomoney($permintaan["pr_pagu_anggaran"]); ?>
              <div class="row form-group">
              <label class="col-sm-2 control-label text-right">Nilai Anggaran *</label>
              <div class="col-sm-4">
              <p class="form-control-static" id="pagu_anggaran"><?php echo $curval ?></p>
              </div>
              </div>

              <?php $curval = inttomoney($permintaan["pr_sisa_anggaran"]); ?>
              <div class="row form-group">
              <label class="col-sm-2 control-label text-right">Sisa Anggaran *</label>
              <div class="col-sm-4">
              <p class="form-control-static" id="sisa_anggaran"><?php echo $curval ?></p>
              </div>
              </div>

              <?php $curval = $permintaan["pr_packet"]; ?>
              <div class="row form-group">
                <label class="col-sm-2 control-label text-right">Nama Paket Pengadaan*</label>
                <div class="col-sm-10">
                  <p class="form-control-static" id="nama_paket"><?php echo $curval ?></p>
                </div>
              </div>


              <?php $curval = $permintaan["pr_type"]; ?>
              <div class="row form-group">
                <label class="col-sm-2 control-label text-right">Jenis Paket Pengadaan *</label>
                <div class="col-sm-10">
                  <p class="form-control-static" id="jenis_pr"><?php echo $curval ?></p>
                </div>
              </div>

              <?php $curval = $permintaan["isSwakelola"]; ?>
              <div class="row form-group">
                <label class="col-sm-2 control-label text-right">Pembelian Langsung/Swakelola
                *</label>
                <div class="col-sm-10">
                  <?php if($curval==1){
                  echo '<input type="checkbox" class="" name="swakelola_inp" id="swakelola_inp" value="1" checked="" disabled>';
                } else {
                  echo '<input type="checkbox" class="" name="swakelola_inp" id="swakelola_inp" value="0" disabled>';
                } ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>  

<?php } ?>
